const path = require('path');

module.exports = {
    mode: 'development',
    entry: {
        //app: './src/classes/Test.js',
        index: './src/index.js'
    },
    devtool: 'inline-source-map',
    output: {
        filename: '[name]-app.js',
        path: path.resolve(__dirname, 'public/js')
    },
    module: {
        rules: [{
            // test: /\.scss$/,
            use: [
                // 'style-loader',
                // 'css-loader',
                // 'sass-loader'
            ]
        }]
    }
};