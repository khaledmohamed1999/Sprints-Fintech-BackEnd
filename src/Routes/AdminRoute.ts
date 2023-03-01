import {GeneralRoute} from "../Core/Server";
import express, {Application} from "express";
//import {AuthMiddleware} from "../Http/AuthMiddleware";
import {BaseRouter} from "./BaseRouter";

export class AdminRoute extends BaseRouter implements GeneralRoute {
    Inject(): void {

      //  this.subApp.use(AuthMiddleware("ADMIN"))

        this.subApp.get("/", (req, res) => res.send("admin"));

        this.subApp.get('/customers', function (req, res) {
            res.json([
                {name: "Gamal", 'phone': "1215455"}
            ]);
        });

    }

    RoutePath(): string {
        return "/admin";
    }

}