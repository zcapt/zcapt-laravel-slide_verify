let Base64 = require('js-base64').Base64;
let a = {
    init: "http://localhost:8000/api/init",
    large: "http://localhost:8000/api/getLargeImage",
    small: "http://localhost:8000/api/getSmallImage",
    veri: "http://localhost:8000/api/verify"
};
console.log(Base64.encode(JSON.stringify(a)));