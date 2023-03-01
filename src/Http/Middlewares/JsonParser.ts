import {GeneralMiddleware, MiddlewareReturn} from "../../Core/Server";
import express from 'express'

export class JsonParser implements GeneralMiddleware {
    Inject(): MiddlewareReturn {
        return express.json();
    }

}