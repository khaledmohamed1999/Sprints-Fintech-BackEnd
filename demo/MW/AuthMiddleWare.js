"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.auth = void 0;
const productsService_1 = require("../services/productsService");
function auth(req, res, next) {
    var _a;
    let token = (((_a = req.headers) === null || _a === void 0 ? void 0 : _a.authorization) || " ").split(" ")[1];
    let password = Buffer.from(token, 'base64').toString('utf8').split(':')[1];
    if (password != '123456')
        return res.send((new productsService_1.PRODUCTS).getPublicProducts('public'));
    return next();
}
exports.auth = auth;
