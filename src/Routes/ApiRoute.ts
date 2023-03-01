import {GeneralRoute} from "../Core/Server";
import {Application} from "express";
import {BaseRouter} from "./BaseRouter";

export class ApiRoute extends BaseRouter implements GeneralRoute {
    Inject(): void {
        this.subApp.get("/", function (req, res) {
            res.send("welcome from new Route");
        })
    }

    RoutePath(): string {
        return "/";
    }

}