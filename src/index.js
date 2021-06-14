import { GeoJsonDataProvider, VectorTileDataSource } from "@here/harp-vectortile-datasource";
import { FeaturesDataSource, MapViewPointFeature } from "@here/harp-features-datasource";
import { Theme } from "@here/harp-datasource-protocol";
import { GeoBox, GeoCoordinates, GeoPointLike } from "@here/harp-geoutils";

import { View } from "./View";

import { rateLimitHandler } from "fetch-rate-limit-util";

import * as radius from "../public/resources/radius.json"


import {
    ContextualArabicConverter,
    FontCatalog,
    FontStyle,
    FontUnit,
    FontVariant,
    TextCanvas,
    TextRenderStyle
} from "@here/harp-text-canvas";
import { GUI } from "dat.gui";
import * as THREE from "three";

// import * as jsonColors from "../resources/colors.json"

import axios from 'axios';
import rateLimit from 'axios-rate-limit';
import { feature } from "caniuse-lite";

const app = new View({
    canvas: document.getElementById("map")
});

const mapView = app.mapView;
const bboxCalc = require('geojson-bbox')
const http = rateLimit(axios.create(), { maxRequests: 1, perMilliseconds: 1000, maxRPS: 1 })

const addPromises = [];


let lastCanvasPosition

const element = document.getElementById("mouse-picked-result");
let current;

let askedName = '';
let discardPick = false;
let REGION_LIST;
let polygon_district;
const dateDelay = 2500;
const dataSourceCache = [];
const dataSources = [];
const cache = [];
let ct = 0;

// getRegions();

// Promise.all(addPromises).then(() => {
//     // intervalID = setInterval(setData, dateDelay);
//     dataSources.forEach(ds => map.removeDataSource(ds));
// });


async function getRegions(checked) {
    if (cache.includes('regions')) {
        const datasource = dataSources[cache.indexOf('regions')];
        if (!checked) {
            mapView.removeDataSource(datasource)
        } else {
            mapView.addDataSource(datasource);
            mapView.update()
        }
        return;
    }
    const res = await fetch("/polygon_district.json");
    const geojson = await res.json();

    polygon_district = geojson.features

    REGION_LIST = geojson.features.filter(feature => {
        return feature.properties !== undefined && feature.properties.name !== undefined;
    })
    .map(feature => feature.properties.name);

    const geoJsonDataSource = new VectorTileDataSource({
        dataProvider: new GeoJsonDataProvider("moscow", geojson),
        name: "geojson",
        styleSetName: "geojson",
        gatherFeatureAttributes: true,
        addGroundPlane: false
    });

    await mapView.addDataSource(geoJsonDataSource);

    setStyleSet();
    // askName();
    mapView.canvas.addEventListener("click", displayAnswer);

    // let geojsonStyles = [];

    /*  jsonColors.forEach(obj => geojsonStyles.push({
        when: [
            "all",
            ["==", ["geometry-type"], "Polygon"],
            ["==", ["get","name"], Object.keys(obj)[0]],
        ],
        technique: "extruded-polygon",
        color: obj[Object.keys(obj)[0]],
        // layer: Object.keys(obj)[0],
        opacity: 0.5,
        renderOrder: 10000,

        boundaryWalls: false,
        constantHeight: true,
        // lineWidth: 1,
        emissiveIntensity: 0.45
    })) */
    // console.log(geojsonStyles)

    const theme = {
        styles: {
            geojson: [{
                description: "GeoJson polygon",
                when: ["==", ["geometry-type"], "Polygon"],
                renderOrder: 1000,
                technique: "fill",
                attr: {
                    color: "#79573B",
                    lineColor: "#A5642D",
                    lineWidth: 1
                }
            },{
                description: "GeoJson polygons selection",
                when: ["==", ["geometry-type"], "Polygon"],
                renderOrder: 1010,
                technique: "fill",
                attr: {
                    // enable geometries created by this technique only when
                    // the feature's name is equal to the value stored
                    // in the dynamic property named `selected`
                    enabled: [
                        "==",
                        ["get", "name"],
                        ["get", "selected", ["dynamic-properties"]]
                    ],

                    // select the color based on the the value of the dynamic property `correct`.
                    color: [
                        "case",
                        ["get", "correct", ["dynamic-properties"]],
                        "#009900",
                        "#C05100"
                    ],
                    lineColor: "#A5642D",
                    lineWidth: 2,
                    opacity: 0.1,

                    // avoid picking
                    transient: true
                }
            }]
        },
    };
    geoJsonDataSource.setTheme(theme);

    dataSources.push(geoJsonDataSource)
    cache.push('regions')

    await mapView.setTheme('resources/berlin_tilezen_effects_streets.json');
    mapView.loadPostEffects('../resources/effects_streets_custom.json');

    mapView.update();
}
async function getWirelessHotspots(checked) {

    if (cache.includes('wireless-hotspots')) {
        const datasource = dataSources[cache.indexOf('wireless-hotspots')];
        if (!checked) {
            mapView.removeDataSource(datasource)
        } else {
            mapView.addDataSource(datasource);
            mapView.update()
        }
        return;
    }

    const res = await fetch("/wireless-hotspots.geojson");
    const data = await res.json();
    const dataProvider = new GeoJsonDataProvider("wireless-hotspots", data);
    const geoJsonDataSource = new VectorTileDataSource({
        dataProvider,
        name: "wireless-hotspots",
        styleSetName: "geojson",
    });

    await mapView.addDataSource(geoJsonDataSource);
    const theme = {
        styles: {
        geojson: [
            {
            when: ["==", ["geometry-type"], "Point"],
            technique: "circles",
            renderOrder: 15000,
            color: "#F0ff00",
            size: 9, 
            },
        ],
        },
    };
    // geoJsonDataSource.setTheme(theme);
    geoJsonDataSource.setTheme(theme);

    // setData();
    dataSources.push(geoJsonDataSource)
    cache.push('wireless-hotspots')

    mapView.update();
}

async function generateDataSources_(checked) {

    // if (cache.includes('rosstat')) {
    //     const datasource = dataSources[cache.indexOf('rosstat')];
    //     if (!checked) {
    //         mapView.removeDataSource(datasource)
    //     } else {
    //         mapView.addDataSource(datasource);
    //         mapView.update()
    //     }
    //     return;
    // }

    // max 55.68427,37.48929,55.79258,37.7673
    let bbox = [37.48929,55.68427,37.7673,55.79258]//bboxCalc(f)
    
    let stepx =  (bbox[2]-bbox[0]) / 6; //0.02677
    let stepy =  (bbox[3]-bbox[1]) / 6; //0.00960
    let prec = 100000
    
    let features = []
    // console.log('src:'+bbox)
    for(let y=bbox[1];y<bbox[3];y+=stepy) {
        let y2 = y + stepy;
        if (y2 > bbox[3]) y2  = bbox[3];
        for(let x=bbox[0];x<bbox[2];x+=stepx) {
            let x2 = x + stepx;
            if (x2 > bbox[2]) x2  = bbox[2];
            let box = [
                Math.round((x + Number.EPSILON) * prec) / prec,
                Math.round((y + Number.EPSILON) * prec) / prec,
                Math.round((x2 + Number.EPSILON) * prec) / prec,
                Math.round((y2 + Number.EPSILON) * prec) / prec,
            ]
            
            // 3304 (Бытовая химия)- пустая
            // 1904 (Бытовые услуги) и 1903 (Общественное питание) ошибки
            let url = "https://apidata.mos.ru/v1/datasets/619/features?api_key=1fc7eb57a96dfe59d9dc4feaae65a757&bbox="+box.join()
    // let url = "/resources/streets.json"
    const res = await rateLimitHandler( () => fetch(url), 100 );
    const data = await res.json();
    
    features = features.concat(data.features)
    ct++
    const dataProvider = new GeoJsonDataProvider(`rosstat${ct}`, data);
    const geoJsonDataSource = new VectorTileDataSource({
        dataProvider,
        name: `rosstat${ct}`,
        styleSetName: "geojson",
    });

    await mapView.addDataSource(geoJsonDataSource);

    
    const theme = {
        styles: {
            geojson: [
                {
                    when: ["==", ["geometry-type"], "Polygon"],
                    renderOrder: 200000,
                    technique: "fill",
                    attr: {
                        color: "#af00fa",
                        lineColor: "#f67874",
                        lineWidth: 1
                    }
                },
            ],
        },
    };

    geoJsonDataSource.setTheme(theme);

    // dataSources.push(geoJsonDataSource)
    // cache.push(id)

    mapView.update(); 

        }
    }

    console.log('{"type": "FeatureCollection","features":'+JSON.stringify(features)+'}');
    
}

async function generateDataSources(checked) {

    if (cache.includes('rosstat')) {
        const datasource = dataSources[cache.indexOf('rosstat')];
        if (!checked) {
            mapView.removeDataSource(datasource)
        } else {
            mapView.addDataSource(datasource);
            mapView.update()
        }
        return;
    }

    //max 55.68427,37.48929,55.79258,37.7673
    let bbox = [37.48929,55.68427,37.7673,55.79258]//bboxCalc(f)
    
    // let stepx =  (bbox[2]-bbox[0]) / 6; //0.02677
    // let stepy =  (bbox[3]-bbox[1]) / 6; //0.00960
    // let prec = 100000
    
    // let features = []
    // // console.log('src:'+bbox)
    // for(let y=bbox[1];y<bbox[3];y+=stepy) {
    //     let y2 = y + stepy;
    //     if (y2 > bbox[3]) y2  = bbox[3];
    //     for(let x=bbox[0];x<bbox[2];x+=stepx) {
    //         let x2 = x + stepx;
    //         if (x2 > bbox[2]) x2  = bbox[2];
    //         let box = [
    //             Math.round((x + Number.EPSILON) * prec) / prec,
    //             Math.round((y + Number.EPSILON) * prec) / prec,
    //             Math.round((x2 + Number.EPSILON) * prec) / prec,
    //             Math.round((y2 + Number.EPSILON) * prec) / prec,
    //         ]
            
    //         let url = "https://apidata.mos.ru/v1/datasets/60562/features?api_key=1fc7eb57a96dfe59d9dc4feaae65a757&bbox="+box.join()
    let url = "/resources/streets.json"
    const res = await rateLimitHandler( () => fetch(url), 100 );
    const data = await res.json();
    
    // features = features.concat(data.features)
    // ct++
    const dataProvider = new GeoJsonDataProvider(`rosstat`, data);
    const geoJsonDataSource = new VectorTileDataSource({
        dataProvider,
        name: `rosstat`,
        styleSetName: "geojson",
    });

    await mapView.addDataSource(geoJsonDataSource);

    
    const theme = {
        styles: {
            geojson: [
                {
                    when: ["==", ["geometry-type"], "Polygon"],
                    renderOrder: 200000,
                    technique: "fill",
                    attr: {
                        color: "#af00fa",
                        lineColor: "#f67874",
                        lineWidth: 1
                    }
                },
            ],
        },
    };

    geoJsonDataSource.setTheme(theme);

    dataSources.push(geoJsonDataSource)
    cache.push('rosstat')

    mapView.update(); 

    //     }
    // }

    // console.log(JSON.stringify(features));
    
}


// getRoss();
// getWirelessHotspots();

// generateDataSources();



function handlePick(mapViewUsed, x, y) {
    // get an array of intersection results from MapView
// console.log(mapViewUsed.intersectMapObjects(x, y))

    let usableIntersections = mapViewUsed
        .intersectMapObjects(x, y)
        .filter(item => item.userData !== undefined);
    if (usableIntersections.length > 1) {
        usableIntersections = usableIntersections.filter(item => item !== current);
    }

    // console.log(usableIntersections)

    if (usableIntersections.length === 0) {
        // Hide helper box
        element.style.visibility = "hidden";

        discardPick = false;
        setStyleSet();
        askName();
        return;
    }

    // Get userData from the first result;
    current = usableIntersections[0];

    if (current.userData?.$geometryType !== 'point') {
        element.style.visibility = "hidden";
        discardPick = false;
        return;
    }

    if (current.userData?.name !== undefined) {
        mapViewUsed.setDynamicProperty("selection", [current.userData.name]);
    }

    // console.log(current)

    // Show helper box
    element.style.visibility = "visible";

    // Display userData inside of helper box
    element.innerText = JSON.stringify(current.userData.Attributes, undefined, 2);

    // generateDataSources(current.userData.name)

}
mapView.canvas.addEventListener("mousedown", event => {
    lastCanvasPosition = getCanvasPosition(event, mapView.canvas);
});
mapView.canvas.addEventListener("touchstart", event => {
    if (event.touches.length !== 1) {
        return;
    }
    lastCanvasPosition = getCanvasPosition(event.touches[0], mapView.canvas);
});
mapView.canvas.addEventListener("mouseup", event => {
    const canvasPos = getCanvasPosition(event, mapView.canvas);
    if (isPick(canvasPos)) {
        handlePick(mapView, canvasPos.x, canvasPos.y);
    }
});
mapView.canvas.addEventListener("touchend", event => {
    if (event.changedTouches.length !== 1) {
        return;
    }
    const canvasPos = getCanvasPosition(event.changedTouches[0], mapView.canvas);
    if (isPick(canvasPos)) {
        handlePick(mapView, canvasPos.x, canvasPos.y);
    }
});
function getCanvasPosition(event, canvas) {
    const { left, top } = canvas.getBoundingClientRect();
    return { x: event.clientX - Math.floor(left), y: event.clientY - Math.floor(top) };
}
function isPick(eventPosition) {
    const MAX_MOVE = 5;
    return (
        lastCanvasPosition &&
        Math.abs(lastCanvasPosition.x - eventPosition.x) <= MAX_MOVE &&
        Math.abs(lastCanvasPosition.y - eventPosition.y) <= MAX_MOVE
    );
}
function displayAnswer(e) {
    const canvasPos = getCanvasPosition(e, mapView.canvas);
    if (!isPick(canvasPos)) {
        return;
    }
    // if (discardPick) {
        // return;
    // }

    const intersectionResults = mapView.intersectMapObjects(e.pageX, e.pageY);

    const usableResults = intersectionResults.filter(
        result => result.userData?.$layer === "moscow"
    );

    if (usableResults.length === 0) {
        return;
    }

    const name = usableResults[0].userData.name;
    const correct = false; // name === askedName;
    askName(name);

    setStyleSet({ name, correct });

    // Discard the picking when the StyleSet is changed so that the new tiles have the time
    // to be generated before changing them all over again.
    discardPick = true;
    // setTimeout(
    //     () => {
    //         if (correct) {
    //             askName();
    //         }
    //         setStyleSet();
    //         discardPick = false;
    //     },
    //     // If the answer is correct, wait a longer time so that the user has time to see the
    //     // correct result in case he was clicking fast and randomly.
    //     correct ? 1000 : 300
    // );
}
function setStyleSet(status = null) {
    mapView.setDynamicProperty("selected", status?.name ?? null);
    mapView.setDynamicProperty("correct", status?.correct ?? false);
}
function askName(askedName = '') {
    // if(!askedName) {
    //     const nameIndex = Math.floor(Math.random() * REGION_LIST.length);
    //     askedName = REGION_LIST[nameIndex];
    // }
    
    document.getElementById("asked-name").innerHTML = askedName;
}

let textRenderStyle;
const gui = new GUI({ hideable: false });
const guiOptions = {
    // input: "Type to start...",
    // fontName: "",
    petdoctor: false,
    shops: false,
    icecream: false,
    dentistry: false,
    clinics: false,
    salons: false,
    press: false,
    catering: false,
    routers: false,
    rosstat: false,
    regions: false,
    // boundsEnabled: true,
    color: {
        r: 0.0,
        g: 0.0,
        b: 0.0
    },
    backgroundColor: {
        r: 0.0,
        g: 0.0,
        b: 0.0
    }
};
let textSample = guiOptions.input;

textRenderStyle = new TextRenderStyle({
    fontSize: { unit: FontUnit.Pixel, size: 64.0, backgroundSize: 8.0 },
    color: new THREE.Color(0xff0000),
    backgroundColor: new THREE.Color(0x000000),
    backgroundOpacity: 1.0
});

// const icons = [
//     {name: "redIcon", url: "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzOCIgaGVpZ2h0PSI0NyIgdmlld0JveD0iMCAwIDM4IDQ3Ij48ZyBmaWxsPSJub25lIj48cGF0aCBmaWxsPSIjMEYxNjIxIiBmaWxsLW9wYWNpdHk9Ii40IiBkPSJNMTUgNDZjMCAuMzE3IDEuNzkuNTc0IDQgLjU3NHM0LS4yNTcgNC0uNTc0YzAtLjMxNy0xLjc5LS41NzQtNC0uNTc0cy00IC4yNTctNCAuNTc0eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNiNjAxMDEiIGQ9Ik0zMy4yNSAzMS42NTJBMTkuMDE1IDE5LjAxNSAwIDAgMCAzOCAxOS4wNkMzOCA4LjU0OSAyOS40NzggMCAxOSAwUzAgOC41NSAwIDE5LjA1OWMwIDQuODIzIDEuNzk1IDkuMjMzIDQuNzUgMTIuNTkzTDE4Ljk3NSA0NiAzMy4yNSAzMS42NTJ6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzZBNkQ3NCIgZmlsbC1vcGFjaXR5PSIuNSIgZD0iTTI2Ljg2MiAzNy41bDQuNzE0LTQuNzdjMy44MjItMy41NzYgNS45MjQtOC40MTEgNS45MjQtMTMuNjJDMzcuNSA4Ljg0NyAyOS4yLjUgMTkgLjVTLjUgOC44NDguNSAxOS4xMWMwIDUuMjA5IDIuMTAyIDEwLjA0NCA1LjkxOSAxMy42MTRsNC43MTkgNC43NzZoMTUuNzI0ek0xOSAwYzEwLjQ5MyAwIDE5IDguNTI1IDE5IDE5LjA0MSAwIDUuNTA3LTIuMzQ4IDEwLjQ1NC02LjA3OSAxMy45MzJMMTkgNDYgNi4wNzkgMzIuOTczQzIuMzQ4IDI5LjQ5NSAwIDI0LjU0OCAwIDE5LjA0IDAgOC41MjUgOC41MDcgMCAxOSAweiI+PC9wYXRoPjwvZz48L3N2Zz4K"},
//     {name: "greenIcon", url: "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzOCIgaGVpZ2h0PSI0NyIgdmlld0JveD0iMCAwIDM4IDQ3Ij48ZyBmaWxsPSJub25lIj48cGF0aCBmaWxsPSIjMEYxNjIxIiBmaWxsLW9wYWNpdHk9Ii40IiBkPSJNMTUgNDZjMCAuMzE3IDEuNzkuNTc0IDQgLjU3NHM0LS4yNTcgNC0uNTc0YzAtLjMxNy0xLjc5LS41NzQtNC0uNTc0cy00IC4yNTctNCAuNTc0eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiMwNGI2MDEiIGQ9Ik0zMy4yNSAzMS42NTJBMTkuMDE1IDE5LjAxNSAwIDAgMCAzOCAxOS4wNkMzOCA4LjU0OSAyOS40NzggMCAxOSAwUzAgOC41NSAwIDE5LjA1OWMwIDQuODIzIDEuNzk1IDkuMjMzIDQuNzUgMTIuNTkzTDE4Ljk3NSA0NiAzMy4yNSAzMS42NTJ6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzZBNkQ3NCIgZmlsbC1vcGFjaXR5PSIuNSIgZD0iTTI2Ljg2MiAzNy41bDQuNzE0LTQuNzdjMy44MjItMy41NzYgNS45MjQtOC40MTEgNS45MjQtMTMuNjJDMzcuNSA4Ljg0NyAyOS4yLjUgMTkgLjVTLjUgOC44NDguNSAxOS4xMWMwIDUuMjA5IDIuMTAyIDEwLjA0NCA1LjkxOSAxMy42MTRsNC43MTkgNC43NzZoMTUuNzI0ek0xOSAwYzEwLjQ5MyAwIDE5IDguNTI1IDE5IDE5LjA0MSAwIDUuNTA3LTIuMzQ4IDEwLjQ1NC02LjA3OSAxMy45MzJMMTkgNDYgNi4wNzkgMzIuOTczQzIuMzQ4IDI5LjQ5NSAwIDI0LjU0OCAwIDE5LjA0IDAgOC41MjUgOC41MDcgMCAxOSAweiI+PC9wYXRoPjwvZz48L3N2Zz4K"},
//     {name: "blueIcon", url: "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzOCIgaGVpZ2h0PSI0NyIgdmlld0JveD0iMCAwIDM4IDQ3Ij48ZyBmaWxsPSJub25lIj48cGF0aCBmaWxsPSIjMEYxNjIxIiBmaWxsLW9wYWNpdHk9Ii40IiBkPSJNMTUgNDZjMCAuMzE3IDEuNzkuNTc0IDQgLjU3NHM0LS4yNTcgNC0uNTc0YzAtLjMxNy0xLjc5LS41NzQtNC0uNTc0cy00IC4yNTctNCAuNTc0eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiMwMTgwYjYiIGQ9Ik0zMy4yNSAzMS42NTJBMTkuMDE1IDE5LjAxNSAwIDAgMCAzOCAxOS4wNkMzOCA4LjU0OSAyOS40NzggMCAxOSAwUzAgOC41NSAwIDE5LjA1OWMwIDQuODIzIDEuNzk1IDkuMjMzIDQuNzUgMTIuNTkzTDE4Ljk3NSA0NiAzMy4yNSAzMS42NTJ6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzZBNkQ3NCIgZmlsbC1vcGFjaXR5PSIuNSIgZD0iTTI2Ljg2MiAzNy41bDQuNzE0LTQuNzdjMy44MjItMy41NzYgNS45MjQtOC40MTEgNS45MjQtMTMuNjJDMzcuNSA4Ljg0NyAyOS4yLjUgMTkgLjVTLjUgOC44NDguNSAxOS4xMWMwIDUuMjA5IDIuMTAyIDEwLjA0NCA1LjkxOSAxMy42MTRsNC43MTkgNC43NzZoMTUuNzI0ek0xOSAwYzEwLjQ5MyAwIDE5IDguNTI1IDE5IDE5LjA0MSAwIDUuNTA3LTIuMzQ4IDEwLjQ1NC02LjA3OSAxMy45MzJMMTkgNDYgNi4wNzkgMzIuOTczQzIuMzQ4IDI5LjQ5NSAwIDI0LjU0OCAwIDE5LjA0IDAgOC41MjUgOC41MDcgMCAxOSAweiI+PC9wYXRoPjwvZz48L3N2Zz4K"},
// ];
// for (const { name, url } of icons) {
//     mapView.userImageCache.addImage(name, url);
// }
const imageString = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzOCIgaGVpZ2h0PSI0NyIgdmlld0JveD0iMCAwIDM4IDQ3Ij48ZyBmaWxsPSJub25lIj48cGF0aCBmaWxsPSIjMEYxNjIxIiBmaWxsLW9wYWNpdHk9Ii40IiBkPSJNMTUgNDZjMCAuMzE3IDEuNzkuNTc0IDQgLjU3NHM0LS4yNTcgNC0uNTc0YzAtLjMxNy0xLjc5LS41NzQtNC0uNTc0cy00IC4yNTctNCAuNTc0eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNiNjAxMDEiIGQ9Ik0zMy4yNSAzMS42NTJBMTkuMDE1IDE5LjAxNSAwIDAgMCAzOCAxOS4wNkMzOCA4LjU0OSAyOS40NzggMCAxOSAwUzAgOC41NSAwIDE5LjA1OWMwIDQuODIzIDEuNzk1IDkuMjMzIDQuNzUgMTIuNTkzTDE4Ljk3NSA0NiAzMy4yNSAzMS42NTJ6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzZBNkQ3NCIgZmlsbC1vcGFjaXR5PSIuNSIgZD0iTTI2Ljg2MiAzNy41bDQuNzE0LTQuNzdjMy44MjItMy41NzYgNS45MjQtOC40MTEgNS45MjQtMTMuNjJDMzcuNSA4Ljg0NyAyOS4yLjUgMTkgLjVTLjUgOC44NDguNSAxOS4xMWMwIDUuMjA5IDIuMTAyIDEwLjA0NCA1LjkxOSAxMy42MTRsNC43MTkgNC43NzZoMTUuNzI0ek0xOSAwYzEwLjQ5MyAwIDE5IDguNTI1IDE5IDE5LjA0MSAwIDUuNTA3LTIuMzQ4IDEwLjQ1NC02LjA3OSAxMy45MzJMMTkgNDYgNi4wNzkgMzIuOTczQzIuMzQ4IDI5LjQ5NSAwIDI0LjU0OCAwIDE5LjA0IDAgOC41MjUgOC41MDcgMCAxOSAweiI+PC9wYXRoPjwvZz48L3N2Zz4K";
const imageTexture = "custom-icon";
mapView.userImageCache.addImage(imageTexture, imageString);
mapView.update()

addGUIControls();

// {
//     1193: "Ветеринарные учреждения",
//     3304: "Стационарные торговые объекты",
//     619: "Нестационарные торговые объекты",
//     518: "Стоматологические поликлиники взрослые",
//     1256: "Центры здоровья",
//     1904: "Бытовые услуги на территории Москвы",
//     2781: "Нестационарные торговые объекты по реализации печатной продукции",
//     1903: "Общественное питание в Москве",
// }

function addGUIControls() {
    guiOptions.color.r = textRenderStyle.color.r * 255.0;
    guiOptions.color.g = textRenderStyle.color.g * 255.0;
    guiOptions.color.b = textRenderStyle.color.b * 255.0;
    guiOptions.backgroundColor.r = textRenderStyle.backgroundColor.r * 255.0;
    guiOptions.backgroundColor.g = textRenderStyle.backgroundColor.g * 255.0;
    guiOptions.backgroundColor.b = textRenderStyle.backgroundColor.b * 255.0;

    let petdoctor   = gui.add(guiOptions, "petdoctor").onChange((value) => { gui_load(1193,value,"#00ff00") }).name("Ветеринарные учреждения");
    let shops       = gui.add(guiOptions, "shops").onChange((value) => { gui_load(3304,value,"#d1ff00") }).name("Бытовая химия, магазины косметики и т.п.");
    let icecream    = gui.add(guiOptions, "icecream").onChange((value) => { gui_load(619,value,"#d5ffd0") }).name("Нестационарные торговые объекты");
    let dentistry   = gui.add(guiOptions, "dentistry").onChange((value) => { gui_load(518,value,"#0dffd0") }).name("Стоматология");
    let clinics     = gui.add(guiOptions, "clinics").onChange((value) => { gui_load(1256,value,"#dd0fd0") }).name("Центры здоровья");
    let salons      = gui.add(guiOptions, "salons").onChange((value) => { gui_load(1904,value,"#d00f00") }).name("Бытовые услуги");
    let press       = gui.add(guiOptions, "press").onChange((value) => { gui_load(2781,value,"#304f30") }).name("Пресса");
    let catering    = gui.add(guiOptions, "catering").onChange((value) => { gui_load(1903,value,"#453ff0") }).name("Общественное питание");
    let routers     = gui.add(guiOptions, "routers").onChange((value) => { getWirelessHotspots(value) }).name("Роутеры");
    let rosstat     = gui.add(guiOptions, "rosstat").onChange((value) => { generateDataSources(value) }).name("Дома");
    let regions     = gui.add(guiOptions, "regions").onChange((value) => { getRegions(value) }).name("Районы");

    petdoctor.domElement.parentNode.parentNode.setAttribute("style", "border-left: 8px solid #00ff00;")
    shops.domElement.parentNode.parentNode.setAttribute("style", "border-left: 8px solid #d1ff00;")
    icecream.domElement.parentNode.parentNode.setAttribute("style", "border-left: 8px solid #d5ffd0;")
    dentistry.domElement.parentNode.parentNode.setAttribute("style", "border-left: 8px solid #0dffd0;")
    clinics.domElement.parentNode.parentNode.setAttribute("style", "border-left: 8px solid #dd0fd0;")
    salons.domElement.parentNode.parentNode.setAttribute("style", "border-left: 8px solid #d00f00;")
    press.domElement.parentNode.parentNode.setAttribute("style", "border-left: 8px solid #304f30;")
    catering.domElement.parentNode.parentNode.setAttribute("style", "border-left: 8px solid #453ff0;")

    routers.domElement.parentNode.parentNode.setAttribute("style", "border-left: 8px solid #F0ff00;")
    rosstat.domElement.parentNode.parentNode.setAttribute("style", "border-left: 8px solid #af00fa;")
    regions.domElement.parentNode.parentNode.setAttribute("style", "border-left: 8px solid #79573B;")

    gui.add(
        {
            clear: clearMarkers
        },
        "clear"
    ).name("Calc")
}



const options = {
    1193:"petdoctor",
    3304:"shops",
    619:"icecream",
    518:"dentistry",
    1256:"clinics",
    1904:"salons",
    2781:"press",
    1903:"catering",
}

async function gui_load(id,checked,color = '#000')
{
    if (cache.includes(id)) {
        const datasource = dataSources[cache.indexOf(id)];
        if (!checked) {
            mapView.removeDataSource(datasource)
        } else {
            mapView.addDataSource(datasource);
            mapView.update()
        }
        return;
    }

    
    // let url = [518,619,1193,1256,2781].includes(id) ? `/resources/${id}.json`
        // :`https://apidata.mos.ru/v1/datasets/${id}/features?api_key=1fc7eb57a96dfe59d9dc4feaae65a757`
    let url = `/resources/${id}.json`
    const res = await rateLimitHandler( () => fetch(url), 100 );
    const data = await res.json();

    const geoJsonDataSource = new VectorTileDataSource({
        dataProvider: new GeoJsonDataProvider(`ds-${id}`, data),
        name: `ds-${id}`,
        styleSetName: "geojson",
        gatherFeatureAttributes: true,
        addGroundPlane: false
    });

    let alias = options[id];
    let coef = radius[alias] !== undefined ? radius[alias] : 1;

    let base = Math.ceil(10 * coef)
    let sizes = [];
    let zoomLevels = [7, 8, 9, 10, 11, 12, 13, 14, 15, 20]
    zoomLevels.forEach(v => {
        sizes.push(base + v/4 )
    })
    
    await mapView.addDataSource(geoJsonDataSource);
    geoJsonDataSource.setTheme({
        styles: {
            geojson: [
                {
                    when: ["==", ["geometry-type"], "Point"],
                    technique: "squares",
                    renderOrder: 35000,
                    color,
                    size: Math.ceil(1000 * coef), 
                   
                    opacity: 0.4,
                    attr: {
                        // size: {
                        //     interpolation: "Linear",
                        //     zoomLevels,
                        //     values: sizes
                        // },
                        // color: {
                        //     interpolation: "Linear",
                        //     zoomLevels: [10, 11, 12, 14, 15],
                        //     values: ["#337579", "#6e5cd4", "#5adeff", "#5adeff", "#000000"]
                        // },
                    }
                },
            ],
        }  
    });

    dataSources.push(geoJsonDataSource)
    cache.push(id)

    mapView.update(); 
}

let markerId = 0;
// const markersDataSource = new FeaturesDataSource({
//     name: "cluster",
//     styleSetName: "geojson",
//     gatherFeatureAttributes: true
// });
const icons = [
    {
        name: "redIcon",
        url:
            "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzOCIgaGVpZ2h0PSI0NyIgdmlld0JveD0iMCAwIDM4IDQ3Ij48ZyBmaWxsPSJub25lIj48cGF0aCBmaWxsPSIjMEYxNjIxIiBmaWxsLW9wYWNpdHk9Ii40IiBkPSJNMTUgNDZjMCAuMzE3IDEuNzkuNTc0IDQgLjU3NHM0LS4yNTcgNC0uNTc0YzAtLjMxNy0xLjc5LS41NzQtNC0uNTc0cy00IC4yNTctNCAuNTc0eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNiNjAxMDEiIGQ9Ik0zMy4yNSAzMS42NTJBMTkuMDE1IDE5LjAxNSAwIDAgMCAzOCAxOS4wNkMzOCA4LjU0OSAyOS40NzggMCAxOSAwUzAgOC41NSAwIDE5LjA1OWMwIDQuODIzIDEuNzk1IDkuMjMzIDQuNzUgMTIuNTkzTDE4Ljk3NSA0NiAzMy4yNSAzMS42NTJ6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzZBNkQ3NCIgZmlsbC1vcGFjaXR5PSIuNSIgZD0iTTI2Ljg2MiAzNy41bDQuNzE0LTQuNzdjMy44MjItMy41NzYgNS45MjQtOC40MTEgNS45MjQtMTMuNjJDMzcuNSA4Ljg0NyAyOS4yLjUgMTkgLjVTLjUgOC44NDguNSAxOS4xMWMwIDUuMjA5IDIuMTAyIDEwLjA0NCA1LjkxOSAxMy42MTRsNC43MTkgNC43NzZoMTUuNzI0ek0xOSAwYzEwLjQ5MyAwIDE5IDguNTI1IDE5IDE5LjA0MSAwIDUuNTA3LTIuMzQ4IDEwLjQ1NC02LjA3OSAxMy45MzJMMTkgNDYgNi4wNzkgMzIuOTczQzIuMzQ4IDI5LjQ5NSAwIDI0LjU0OCAwIDE5LjA0IDAgOC41MjUgOC41MDcgMCAxOSAweiI+PC9wYXRoPjwvZz48L3N2Zz4K"
    },
    {
        name: "greenIcon",
        url:
            "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzOCIgaGVpZ2h0PSI0NyIgdmlld0JveD0iMCAwIDM4IDQ3Ij48ZyBmaWxsPSJub25lIj48cGF0aCBmaWxsPSIjMEYxNjIxIiBmaWxsLW9wYWNpdHk9Ii40IiBkPSJNMTUgNDZjMCAuMzE3IDEuNzkuNTc0IDQgLjU3NHM0LS4yNTcgNC0uNTc0YzAtLjMxNy0xLjc5LS41NzQtNC0uNTc0cy00IC4yNTctNCAuNTc0eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiMwNGI2MDEiIGQ9Ik0zMy4yNSAzMS42NTJBMTkuMDE1IDE5LjAxNSAwIDAgMCAzOCAxOS4wNkMzOCA4LjU0OSAyOS40NzggMCAxOSAwUzAgOC41NSAwIDE5LjA1OWMwIDQuODIzIDEuNzk1IDkuMjMzIDQuNzUgMTIuNTkzTDE4Ljk3NSA0NiAzMy4yNSAzMS42NTJ6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzZBNkQ3NCIgZmlsbC1vcGFjaXR5PSIuNSIgZD0iTTI2Ljg2MiAzNy41bDQuNzE0LTQuNzdjMy44MjItMy41NzYgNS45MjQtOC40MTEgNS45MjQtMTMuNjJDMzcuNSA4Ljg0NyAyOS4yLjUgMTkgLjVTLjUgOC44NDguNSAxOS4xMWMwIDUuMjA5IDIuMTAyIDEwLjA0NCA1LjkxOSAxMy42MTRsNC43MTkgNC43NzZoMTUuNzI0ek0xOSAwYzEwLjQ5MyAwIDE5IDguNTI1IDE5IDE5LjA0MSAwIDUuNTA3LTIuMzQ4IDEwLjQ1NC02LjA3OSAxMy45MzJMMTkgNDYgNi4wNzkgMzIuOTczQzIuMzQ4IDI5LjQ5NSAwIDI0LjU0OCAwIDE5LjA0IDAgOC41MjUgOC41MDcgMCAxOSAweiI+PC9wYXRoPjwvZz48L3N2Zz4K"
    },
    {
        name: "blueIcon",
        url:
            "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzOCIgaGVpZ2h0PSI0NyIgdmlld0JveD0iMCAwIDM4IDQ3Ij48ZyBmaWxsPSJub25lIj48cGF0aCBmaWxsPSIjMEYxNjIxIiBmaWxsLW9wYWNpdHk9Ii40IiBkPSJNMTUgNDZjMCAuMzE3IDEuNzkuNTc0IDQgLjU3NHM0LS4yNTcgNC0uNTc0YzAtLjMxNy0xLjc5LS41NzQtNC0uNTc0cy00IC4yNTctNCAuNTc0eiI+PC9wYXRoPjxwYXRoIGZpbGw9IiMwMTgwYjYiIGQ9Ik0zMy4yNSAzMS42NTJBMTkuMDE1IDE5LjAxNSAwIDAgMCAzOCAxOS4wNkMzOCA4LjU0OSAyOS40NzggMCAxOSAwUzAgOC41NSAwIDE5LjA1OWMwIDQuODIzIDEuNzk1IDkuMjMzIDQuNzUgMTIuNTkzTDE4Ljk3NSA0NiAzMy4yNSAzMS42NTJ6Ij48L3BhdGg+PHBhdGggZmlsbD0iIzZBNkQ3NCIgZmlsbC1vcGFjaXR5PSIuNSIgZD0iTTI2Ljg2MiAzNy41bDQuNzE0LTQuNzdjMy44MjItMy41NzYgNS45MjQtOC40MTEgNS45MjQtMTMuNjJDMzcuNSA4Ljg0NyAyOS4yLjUgMTkgLjVTLjUgOC44NDguNSAxOS4xMWMwIDUuMjA5IDIuMTAyIDEwLjA0NCA1LjkxOSAxMy42MTRsNC43MTkgNC43NzZoMTUuNzI0ek0xOSAwYzEwLjQ5MyAwIDE5IDguNTI1IDE5IDE5LjA0MSAwIDUuNTA3LTIuMzQ4IDEwLjQ1NC02LjA3OSAxMy45MzJMMTkgNDYgNi4wNzkgMzIuOTczQzIuMzQ4IDI5LjQ5NSAwIDI0LjU0OCAwIDE5LjA0IDAgOC41MjUgOC41MDcgMCAxOSAweiI+PC9wYXRoPjwvZz48L3N2Zz4K"
    }
];

const theme = {
    styles: {
        geojson: [
            {
                when: ["==", ["geometry-type"], "Point"],
                technique: "circles",
                renderOrder: 45000,
                color: "#0000ff",
                size: 50, 
                
            },
            // {
            //     when: ["==", ["geometry-type"], "Point"],
            //     technique: "labeled-icon",
            //     color: "#000000",
            //     backgroundColor: "#FFFFFF",
            //     size: 48,
            //     text: ["get", "text"],
            //     renderOrder: 1000,
            // },
        ],
    },
};


async function clearMarkers() {

    let geo = [];
    dataSources.forEach(ds => {
        ds.m_params.dataProvider.input.features.forEach(feature => {
            if (feature.geometry.type == 'Point')
            geo.push({x: feature.geometry.coordinates[0], y: feature.geometry.coordinates[1]})
        })
    })
    
    const result = await cluster(geo);
    // result.then(res => console.log(res))
    console.log(geo, result)

    let data = {
        "type": "FeatureCollection",
        "features": []
    };
    // if (calculated) {
        for (let i = 0; i < result.dataset.length; i++) {
            let centroid = result.dataset[i].centroid;
            let datapointx = result.dataset[i][0];
            let datapointy = result.dataset[i][1];

            data.features.push({
                "type": "Feature",
                "properties": {
                    "name": centroid + 1,
                    "text": centroid + 1
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [datapointx, datapointy, 0.0]
                }
            })
            // const g = mapView.getGeoCoordinatesAt(datapointx, datapointy);
            // markersDataSource.add(
            //     new MapViewPointFeature(g.toGeoPoint(), {
            //         text: centroid + 1,
            //         id: markerId,
            //         // icon: icons[markerId % icons.length].name,
            //         // renderOrder: markerId
            //     })
            // );
            markerId++;

            // //We are using the HSB colorMode here
            // fill(centroid * 36, 100,100);
            // ellipse(datapointx, datapointy, 20, 20);
            // //We also add a label to the output, so it could be interpreted without the color
            // fill(0);
            // textAlign(CENTER, CENTER);
            // text(centroid + 1, datapointx, datapointy);
        }

        const markersDataSource = new VectorTileDataSource({
            dataProvider: new GeoJsonDataProvider(`cluster${markerId}`, data),
            name: `cluster${markerId}`,
            styleSetName: "geojson",
            addGroundPlane: false
        });
        
        await mapView.addDataSource(markersDataSource);
        markersDataSource.setTheme(theme);

        mapView.update()
        console.log(markersDataSource)
    // }

}

let data = [];
let calculated = false;
let kmeans; 
let slider, sliderLabel;
let clusterDataset;

//We set up our canvas and change the colorMode to HSB which will come in handy later. 
function setup() {
  createCanvas(600, 400);
  background(200);
  colorMode(HSB);
  // User instructions are added 
  let instructions = "Click on the canvas to add data points.\nClick the button Cluster, to cluster them. \nAdjust the number of clusters with the slider."
  text(instructions, 10, height/2);
  //A button is added to start clustering the data
  let calculateButton = createButton('Cluster');
  calculateButton.mouseClicked(cluster)
  //A slider with a label is added to let the user adjust the number of clusters 
  slider = createSlider(1,10,2,1);
  slider.input(sliderAdjusted);
  sliderLabel = createP('Number of Clusters: ' + slider.value());

  noStroke();
  ellipseMode(CENTER);
}
//Once the slider is updated we adjust the label.
function sliderAdjusted(){
  sliderLabel.html('Number of Cluster: ' + slider.value())
}
//If the mouse is clicked and it is not in bottom of our canvas, 
//the mouse coordinates get added to our data array and drawn to the canvas. 
function mousePressed(){
  if(mouseY < height-5){
  data.push({x: mouseX, y: mouseY});
  fill(255)
  ellipse(mouseX, mouseY, 20,20)
  }
}
//On click of the cluster button we create our kmeans object with to data we collected,
// the number of clusters from our slider and two other options.
function cluster(data = []){
  const options = {
    k: 22,
    maxIter: 1200,
    threshold: 0.9,
  };
  kmeans = ml5.kmeans(data, options, clustersCalculated);

  return kmeans;
}

function clustersCalculated() {
  calculated = true;
}
//Once the results are in we recolor the data-points based on their centroid 
function draw() {
  if (calculated) {
    for (i = 0; i < kmeans.dataset.length; i++) {
      let centroid = kmeans.dataset[i].centroid;
      let datapointx = kmeans.dataset[i][0];
      let datapointy = kmeans.dataset[i][1];
      //We are using the HSB colorMode here
      fill(centroid * 36, 100,100);
      ellipse(datapointx, datapointy, 20, 20);
      //We also add a label to the output, so it could be interpreted without the color
      fill(0);
      textAlign(CENTER, CENTER);
      text(centroid + 1, datapointx, datapointy);
    }
  }
}