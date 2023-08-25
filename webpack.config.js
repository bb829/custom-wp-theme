const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
var path = require('path');

const jsPath= './js';
const cssPath = './css';
const outputPath = 'assets';
const localDomain = 'http://localhost';
const entryPoints = {
  'app': jsPath + '/app.js',
  'style': cssPath + '/style.scss',
};

module.exports = {
    entry: entryPoints,
    output: {
    path: path.resolve(__dirname, outputPath),
    filename: '[name].js',
    },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),
    new BrowserSyncPlugin({
      proxy: localDomain,
      files: [ outputPath + '/*.css' ],
      injectCss: true,
    }, { reload: false, }),
  ],
  module: {
    rules: [
      {
        test: /\.s?[c]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ],
      },
      {
        test: /\.(?:js|mjs|cjs)$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: [
              ['@babel/preset-env', { targets: "defaults" }]
            ]
          }
        }
      }
    ]
  },
};