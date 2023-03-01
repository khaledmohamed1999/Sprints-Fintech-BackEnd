"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
exports.__esModule = true;
exports.BaseRouter = void 0;
var express_1 = __importDefault(require("express"));
var BaseRouter = (function () {
    function BaseRouter() {
        this.subApp = (0, express_1["default"])();
    }
    BaseRouter.prototype.GetAPP = function () {
        return this.subApp;
    };
    return BaseRouter;
}());
exports.BaseRouter = BaseRouter;
