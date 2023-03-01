"use strict";
exports.__esModule = true;
exports.CustomResponse = void 0;
function CustomResponse(res) {
    return {
        json: function (data) {
            return res.json({
                error: null,
                errorCode: 0,
                data: data,
                message: "every thing is ok"
            });
        },
        NotFound: function (message) {
            return res.status(404).json({
                error: "NOT FOUND",
                errorCode: 404,
                data: null,
                message: message
            });
        }
    };
}
exports.CustomResponse = CustomResponse;
