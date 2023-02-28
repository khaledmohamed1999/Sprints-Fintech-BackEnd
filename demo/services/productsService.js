"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.PRODUCTS = void 0;
class PRODUCTS {
    constructor() {
        this.items = [
            { id: 1, productName: "shoe", productPrice: 50, type: "Private" },
            { id: 2, productName: "shirt", productPrice: 25, type: "public" },
            { id: 3, productName: "hat", productPrice: 20, type: "Private" },
            { id: 4, productName: "watch", productPrice: 200, type: "public" },
            { id: 5, productName: "ball", productPrice: 10, type: "Private" },
            { id: 6, productName: "mobile", productPrice: 1500, type: "public" },
        ];
    }
    getAllProducts() {
        return this.items;
    }
    getProductsById(ID) {
        let Product = this.items.filter(product => product.id == ID);
        if (Product.length > 0)
            return Product;
        else
            return 'There is no product with such id';
    }
    getPublicProducts(type) {
        let Product = this.items.filter(product => product.type == type);
        if (Product.length > 0)
            return Product;
        else
            return 'There is no puplic products, sign in to see private ones';
    }
}
exports.PRODUCTS = PRODUCTS;
;
