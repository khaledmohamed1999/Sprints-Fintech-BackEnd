"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.productController = void 0;
const productsService_1 = require("../services/productsService");
class productController {
    products(req, res) {
        res.send((new productsService_1.PRODUCTS).getAllProducts());
    }
    getProductById(req, res) {
        let idp = Number(req.params.id);
        res.send((new productsService_1.PRODUCTS).getProductsById(idp));
    }
}
exports.productController = productController;
