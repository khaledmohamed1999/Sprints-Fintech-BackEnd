"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
exports.__esModule = true;
exports.JsonParser = void 0;
var express_1 = __importDefault(require("express"));
var JsonParser = (function () {
    function JsonParser() {
    }
    JsonParser.prototype.Inject = function () {
        return express_1["default"].json();
    };
    return JsonParser;
}());
exports.JsonParser = JsonParser;
