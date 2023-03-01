import {GeneralRoute} from "../Core/Server";
import express, {Application} from "express";
import {AuthMiddleware} from "../Http/AuthMiddleware";
import {CustomerAccountsController} from "../Controllers/Accounts/CustomerAccountsController";
import {BaseRouter} from "./BaseRouter";
import {param, validationResult} from "express-validator";


function Validate(rules: any[]) {
    return async (req, res, next) => {
        await Promise.all(rules.map(rule => rule.run(req)))


        const errors = validationResult(req);
        if (!errors.isEmpty()) {
            return res.status(400).json({errors: errors.array()});

        }
        return next();
    }

}


export class CustomerRoute extends BaseRouter implements GeneralRoute {
    Inject(): void {

        let ct = new CustomerAccountsController();
        this.subApp.use(AuthMiddleware("USER"));
        // @ts-ignore
        this.subApp.get("/", ct.list);
        // @ts-ignore
        this.subApp.get("/:acountno", Validate([param('acountno').isInt()]), ct.details);
        // @ts-ignore
        this.subApp.get('/:acountno/transactions', Validate([param('acountno').isInt()]), ct.transactions);


    }

    RoutePath(): string {
        return "/customer/account";
    }

}
