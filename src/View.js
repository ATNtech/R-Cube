/*
 * Copyright (C) 2017-2020 HERE Europe B.V.
 * Licensed under Apache 2.0, see full license in LICENSE
 * SPDX-License-Identifier: Apache-2.0
 */

import { MapControls, MapControlsUI } from "@here/harp-map-controls";
import { MapView } from "@here/harp-mapview";
import { VectorTileDataSource } from "@here/harp-vectortile-datasource";

const defaultTheme = "resources/berlin_tilezen_night_reduced.json";



export class View {
    constructor(args) {
        this.canvas = args.canvas;
        this.theme = args.theme === undefined ? defaultTheme : args.theme;
        this.mapView = this.initialize();

        const mapControls = new MapControls(this.mapView);
        mapControls.maxTiltAngle = 50;

        const ui = new MapControlsUI(mapControls, { zoomLevel: "input" });
        this.canvas.parentElement.appendChild(ui.domElement);
        const adjustSize = () => {
            this.mapView.resize(window.innerWidth, window.innerHeight);
        };

        this.addBaseMap();
        // this.addEvRange();
        adjustSize();
        window.addEventListener("resize", adjustSize);

        this.mapView.update();
    }

    initialize() {
        const mapView = new MapView({
            canvas: this.canvas,
            theme: this.theme,
            decoderUrl: "decoder.bundle.js",

            // target: new GeoCoordinates(55.755825, 37.617298),
            target: [37.58642, 55.744],
            zoomLevel: 13,
            gatherFeatureAttributes: true,
            enableRoadPicking: true,
        });

        mapView.setDynamicProperty("selection", []);

        return mapView;
    }

    addBaseMap() {
        const dataSource = new VectorTileDataSource({
            // baseUrl: "https://vector.hereapi.com/v2/vectortiles/base/mc",
            // authenticationCode: apikey
            authenticationCode: "bWrhumMbdCd8E8J3LVVuUWAC2jxZigdCrzmfl2Xzdh4",
            styleSetName: "tilezen"
        });
        this.mapView.addDataSource(dataSource);
    }
    addEvRange() {
        // const datasource = new VectorTileDataSource({
        //     dataProvider: new GeoJsonDataProvider("geojson", geojson),
        //     styleSetName: "geojson",
        //     addGroundPlane: false
        // });
        // this.mapView.addDataSource(datasource);
        
    }
}


