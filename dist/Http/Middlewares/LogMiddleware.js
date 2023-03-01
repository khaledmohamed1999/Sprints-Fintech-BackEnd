"use strict";
exports.__esModule = true;
exports.LogMiddleware = void 0;
var LogMiddleware = (function () {
    function LogMiddleware() {
    }
    LogMiddleware.prototype.Inject = function () {
        return function (req, res, next) {
            console.log("new APi log middleware implemented");
            next();
        };
    };
    return LogMiddleware;
}());
exports.LogMiddleware = LogMiddleware;
