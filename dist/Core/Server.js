"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
exports.__esModule = true;
exports.Server = void 0;
var express_1 = __importDefault(require("express"));
var Server = (function () {
    function Server() {
        this.app = (0, express_1["default"])();
    }
    Server.prototype.AddMiddleware = function (mid) {
        this.app.use(mid.Inject());
    };
    Server.prototype.Start = function (PORT) {
        this.app.listen(PORT, function () {
            console.log("server working on port ".concat(PORT));
        });
    };
    Server.prototype.LoadRoute = function (route) {
        route.Inject();
        this.app.use(route.RoutePath(), route.GetAPP());
    };
    return Server;
}());
exports.Server = Server;
