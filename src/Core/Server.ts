import express, {Application, NextFunction, Request, Response} from 'express';
//import {UserModel} from "../Model";

export type MiddlewareReturn = (req: CustomRequest, res: CustomResponse, next: NextFunction) => void

export interface CustomRequest extends Request {
    //user: UserModel

    IsRequestValid(): boolean
}

interface CustomResponse extends Response {

}


export interface GeneralMiddleware {

    Inject(): MiddlewareReturn
}


export interface GeneralRoute {

    Inject(): void;

    RoutePath(): string

    GetAPP(): Application
}

export class Server {
    private app: Application;

    constructor() {
        this.app = express();
    }


    AddMiddleware(mid: GeneralMiddleware) {
        // @ts-ignore
        this.app.use(mid.Inject())
    }


    Start(PORT: number) {
        this.app.listen(PORT, function () {
            console.log(`server working on port ${PORT}`)
        })
    }

    LoadRoute(route: GeneralRoute) {
        route.Inject();
        this.app.use(route.RoutePath(), route.GetAPP())
    }
}