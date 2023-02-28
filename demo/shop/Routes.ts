import { Application } from "express";
import{productController} from '../controllers/products';
import { auth } from "../MW/AuthMiddleWare";
export function Routes(app:Application){


  let productsController=new productController();
  
      
      app.get("/products", auth,productsController.products);
      app.get("/product/:id",productsController.getProductById);
}