"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Routes = void 0;
const products_1 = require("../controllers/products");
const AuthMiddleWare_1 = require("../MW/AuthMiddleWare");
function Routes(app) {
    let productsController = new products_1.productController();
    app.get("/products", AuthMiddleWare_1.auth, productsController.products);
    app.get("/product/:id", productsController.getProductById);
}
exports.Routes = Routes;
