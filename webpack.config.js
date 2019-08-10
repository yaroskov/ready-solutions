const path = require('path');
// const ExtractTextPlugin = require('extract-text-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    mode: 'development',
    entry: {
        //app: './src/classes/Test.js',
        index: './src/js/index.js'
    },
    devtool: 'inline-source-map',
    output: {
        filename: 'js/[name]-app.js',
        path: path.resolve(__dirname, 'public')
    },
    module: {
        rules: [{
            test: /\.scss$/,
            use: [
                MiniCssExtractPlugin.loader,
                'css-loader',
                'sass-loader'
            ]
        }]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'css/styles.css'
        })
    ]
};