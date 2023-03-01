import {GeneralMiddleware, MiddlewareReturn} from "../../Core/Server";

export class LogMiddleware implements GeneralMiddleware {
    Inject(): MiddlewareReturn {
        return (req, res, next) => {
            console.log("new APi log middleware implemented")
            next();
        }
    }
}