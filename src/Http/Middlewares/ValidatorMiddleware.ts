import {GeneralMiddleware, MiddlewareReturn} from "../../Core/Server";
import {validationResult} from "express-validator";

export class ValidatorMiddleware implements GeneralMiddleware {
    Inject(): MiddlewareReturn {
        return (req, res, next) => {

            req.IsRequestValid = function (): boolean {
                const errors = validationResult(req);
                if (!errors.isEmpty()) {
                    res.status(400).json({errors: errors.array()});
                    return false
                }
                return true
            }
            next();
        }
    }

}