/*
 * Copyright (C) 2020-2021 HERE Europe B.V.
 * Licensed under Apache 2.0, see full license in LICENSE
 * SPDX-License-Identifier: Apache-2.0
 */
import { GeoBox, GeoCoordinates } from "@here/harp-geoutils";
import { MapControls, MapControlsUI } from "@here/harp-map-controls";
import { CopyrightElementHandler, MapView } from "@here/harp-mapview";
import { GeoJsonDataProvider, VectorTileDataSource } from "@here/harp-vectortile-datasource";
import { apikey } from "../config";
import * as geojson from "../resources/polygon.json";
export var GeoJsonCustomShaderExample;
(function (GeoJsonCustomShaderExample) {
    const getGeoBox = () => {
        const ring = geojson.features[0].geometry.coordinates[0];
        const geoBox = new GeoBox(GeoCoordinates.fromGeoPoint(ring[0]), GeoCoordinates.fromGeoPoint(ring[0]));
        ring.forEach(geoPoint => geoBox.growToContain(GeoCoordinates.fromGeoPoint(geoPoint)));
        return geoBox;
    };
    const { west, south, east, north } = getGeoBox();
    const properties = geojson.features[0].properties;
    properties.bbox = [west, south, east, north];
    class CustomShaderApp {
        constructor(container) {
            const canvas = typeof container === "string"
                ? document.getElementById(container)
                : container;
            this.mapView = new MapView({
                canvas,
                target: [13.379373, 52.532501],
                zoomLevel: 12.1,
                theme: {
                    extends: "resources/berlin_tilezen_base.json",
                    styles: {
                        geojson: [
                            {
                                layer: "geojson",
                                when: ["==", ["geometry-type"], "Polygon"],
                                renderOrder: 10000,
                                technique: "shader",
                                primitive: "mesh",
                                textureCoordinateType: "feature-space",
                                transparent: true,
                                params: {
                                    vertexShader: `
                                    varying vec2 vUv;
                                    void main()
                                    {
                                        vUv = uv;
                                        gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
                                    }
                                    `,
                                    fragmentShader: `
                                    varying vec2 vUv;
                                    void main()
                                    {
                                        vec2 p = vUv - 0.5;
                                        float r = sqrt(dot(p, p));
                                        gl_FragColor = vec4(0, r, r, r);
                                    }
                                    `
                                }
                            }
                        ]
                    }
                }
            });
            CopyrightElementHandler.install("copyrightNotice", this.mapView);
            const mapControls = new MapControls(this.mapView);
            mapControls.maxTiltAngle = 50;
            const ui = new MapControlsUI(mapControls, { zoomLevel: "input" });
            canvas.parentElement.appendChild(ui.domElement);
            const adjustSize = () => {
                this.mapView.resize(window.innerWidth, window.innerHeight);
            };
            this.addBaseMap();
            this.addEvRange();
            adjustSize();
            window.addEventListener("resize", adjustSize);
        }
        start() { }
        addBaseMap() {
            const dataSource = new VectorTileDataSource({
                baseUrl: "https://vector.hereapi.com/v2/vectortiles/base/mc",
                authenticationCode: apikey
            });
            this.mapView.addDataSource(dataSource);
        }
        addEvRange() {
            const datasource = new VectorTileDataSource({
                dataProvider: new GeoJsonDataProvider("geojson", geojson),
                styleSetName: "geojson",
                addGroundPlane: false
            });
            this.mapView.addDataSource(datasource);
        }
    }
    async function main() {
        const mapView = new CustomShaderApp("mapCanvas");
        mapView.start();
    }
    main();
})(GeoJsonCustomShaderExample || (GeoJsonCustomShaderExample = {}));