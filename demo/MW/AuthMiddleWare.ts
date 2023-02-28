import { PRODUCTS } from '../services/productsService';
import { Request,Response,NextFunction } from "express"
export function auth(req:Request,res:Response,next:NextFunction){ 
    let token=(req.headers?.authorization||" ").split(" ")[1]
    let password=Buffer.from(token,'base64').toString('utf8').split(':')[1]
    if (password != '123456')
    return res.send((new PRODUCTS).getPublicProducts('public'));
    return next();
}