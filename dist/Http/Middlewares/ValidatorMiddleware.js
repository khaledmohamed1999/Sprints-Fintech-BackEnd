"use strict";
exports.__esModule = true;
exports.ValidatorMiddleware = void 0;
var express_validator_1 = require("express-validator");
var ValidatorMiddleware = (function () {
    function ValidatorMiddleware() {
    }
    ValidatorMiddleware.prototype.Inject = function () {
        return function (req, res, next) {
            req.IsRequestValid = function () {
                var errors = (0, express_validator_1.validationResult)(req);
                if (!errors.isEmpty()) {
                    res.status(400).json({ errors: errors.array() });
                    return false;
                }
                return true;
            };
            next();
        };
    };
    return ValidatorMiddleware;
}());
exports.ValidatorMiddleware = ValidatorMiddleware;
