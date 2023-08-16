// Generated using webpack-cli https://github.com/webpack/webpack-cli
const packageName = generatePackageName();

const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const isProduction = process.env.NODE_ENV == "production";

const stylesHandler = isProduction ? MiniCssExtractPlugin.loader : "style-loader";

const config = {
  entry: {
    admin: "./assets/src/Admin/index.ts",
    frontend: "./assets/src/Frontend/index.ts",
  },
  output: {
    path: path.resolve(__dirname, "assets/dist"),
    library: packageName,
  },
  plugins: [
    // Add your plugins here
    // Learn more about plugins from https://webpack.js.org/configuration/plugins/
  ],
  resolve: {
    extensions: [".tsx", ".ts", ".js"],
  },
  module: {
    rules: [
      {
        test: /\.s[ac]ss$/i,
        use: [stylesHandler, "css-loader", "postcss-loader", "sass-loader"],
      },
      {
        test: /\.tsx?$/,
        use: "ts-loader",
        exclude: /node_modules/,
      },
      {
        test: /\.(eot|svg|ttf|woff|woff2|png|jpg|gif)$/i,
        type: "asset",
      },

      // Add your rules for custom modules here
      // Learn more about loaders from https://webpack.js.org/loaders/
    ],
  },
};

module.exports = () => {
  if (isProduction) {
    config.mode = "production";

    config.plugins.push(new MiniCssExtractPlugin());
  } else {
    config.mode = "development";
  }
  return config;
};

function generatePackageName() {
  const package = require("./package.json");
  const splitted = package.name.split("-");

  return splitted
    .map((word) => {
      return word[0].toUpperCase() + word.slice(1);
    })
    .join("");
}
