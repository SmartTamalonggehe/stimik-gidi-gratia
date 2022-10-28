window._ = require("lodash");

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import lightbox from "lightbox2";
require("select2");
try {
    lightbox.option({
        resizeDuration: 200,
        wrapAround: true,
    });
} catch (e) {}

try {
    window.$ = window.jQuery = require("jquery");
    require("datatables.net-bs4");
} catch (e) {}
