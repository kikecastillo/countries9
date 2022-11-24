const globImporter = require("node-sass-glob-importer");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require("path");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");

module.exports = (env, argv) => {
  const isDevMode = argv.mode === "development";
  return {
    mode: isDevMode ? "development" : "production",
    devtool: isDevMode ? "source-map" : false,
    entry: {
      app: ["./js/custom.js"]
    },
    output: {
      path: isDevMode ? path.resolve(__dirname, "js") : path.resolve(__dirname, "js"),
      filename: "js/[name].min.js",
    },

    module: {
      rules: [
        {
          test: /\.scss$/,
          use: [
            {
              loader: MiniCssExtractPlugin.loader
            },
            {
              loader: "css-loader",
              options: {
                sourceMap: true,
                modules: false,
              }
            },
            {
              loader: "postcss-loader",
              options: {
                sourceMap: true
              }
            },
            // {
            //   loader: 'resolve-url-loader'
            // },
            {
              loader: "sass-loader",
              options: {
                sourceMap: true,
                sassOptions: {
                  importer: globImporter(),
                  sourceMap: true,
                }
              }
            }
          ]
        },
        {
          test: /\.js$/,
          exclude: /(node_modules)/,
          use: {
            loader: "babel-loader",
            options: {
              presets: [["@babel/preset-env", {modules: false}]]
            }
          }
        },
      ]
    },
    target: 'node',

    plugins: [
      new MiniCssExtractPlugin(),
      new BrowserSyncPlugin({
        host: "localhost",
        port: 8080,
        proxy: "http://countries.localhost/"
      }),
    ]
  };
};
