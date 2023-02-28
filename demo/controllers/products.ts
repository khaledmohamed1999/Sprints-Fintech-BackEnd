import { PRODUCTS } from '../services/productsService';
 import{Response,Request} from 'express'
export class productController{
    
     products(req:Request, res:Response) { 
         
        res.send((new PRODUCTS).getAllProducts());
      }
      getProductById (req:Request, res:Response) {
        let idp = Number(req.params.id);
        res.send((new PRODUCTS).getProductsById(idp));
      }
}