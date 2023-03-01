import express, {Application} from "express";

export abstract class BaseRouter {
    protected subApp: Application;

    constructor() {
        this.subApp = express();
    }

    GetAPP(): Application {
        return this.subApp;
    }
}