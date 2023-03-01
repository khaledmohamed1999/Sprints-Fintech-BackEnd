"use strict";
var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
exports.__esModule = true;
exports.ApiRoute = void 0;
var BaseRouter_1 = require("./BaseRouter");
var ApiRoute = (function (_super) {
    __extends(ApiRoute, _super);
    function ApiRoute() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    ApiRoute.prototype.Inject = function () {
        this.subApp.get("/", function (req, res) {
            res.send("welcome from new Route");
        });
    };
    ApiRoute.prototype.RoutePath = function () {
        return "/";
    };
    return ApiRoute;
}(BaseRouter_1.BaseRouter));
exports.ApiRoute = ApiRoute;
