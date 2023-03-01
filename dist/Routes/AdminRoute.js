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
exports.AdminRoute = void 0;
var BaseRouter_1 = require("./BaseRouter");
var AdminRoute = (function (_super) {
    __extends(AdminRoute, _super);
    function AdminRoute() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    AdminRoute.prototype.Inject = function () {
        this.subApp.get("/", function (req, res) { return res.send("admin"); });
        this.subApp.get('/customers', function (req, res) {
            res.json([
                { name: "Gamal", 'phone': "1215455" }
            ]);
        });
    };
    AdminRoute.prototype.RoutePath = function () {
        return "/admin";
    };
    return AdminRoute;
}(BaseRouter_1.BaseRouter));
exports.AdminRoute = AdminRoute;
