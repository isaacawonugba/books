// vue.config.js
module.exports = {
  devServer: {
    port: 8888,
    proxy: {
      "^/api": {
        target: "http://nginx:8088",
        changeOrigin: true
      }
    }
  }
};
