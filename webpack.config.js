const CopyWebpackPlugin = require("copy-webpack-plugin");
const { addHarpWebpackConfig } = require("@here/harp-webpack-utils/scripts/HarpWebpackConfig");
const VersionFile = require('webpack-version-file');
// this webpack config consists of two generated bundles.
// 1. The bundle that is loaded in the web worker to do background tasks
// 2. The main bundle.

module.exports = addHarpWebpackConfig(
    {
        plugins: [
            new CopyWebpackPlugin({
                patterns: [
                    require.resolve("three/build/three.min.js"),
                    {
                        from: "resources/",
                        to: "resources/",
                        toType: "dir"
                    }
                ]
            }),
            new VersionFile({
                output: './dist/version.txt',
                // package: './package.json'
              })
        ],
        output: {
            path: __dirname + '/public/dist'
            //path.resolve(__dirname, 'bin'),
        }
        ,
    },
    { mainEntry: "./src/index.js", decoderEntry: "./src/decoder.js", htmlTemplate: "./src/index.html" }
);
