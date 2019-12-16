const path = require("path");

module.exports={
    mode:"development",
    entry: {
        prompt: "./scripts/prompt.js",
       tasks:  "./scripts/tasks.js",
        lists:"./scripts/list.js",
        settings:'./scripts/settings.js'
    },

    watch: true,

    output: {
        filename: "[name].js",
        path: path.resolve(__dirname, "dist")
    },


}
