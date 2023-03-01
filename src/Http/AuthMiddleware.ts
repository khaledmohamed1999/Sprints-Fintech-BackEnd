//import {GetUserByUserName} from "../Model";

export const AuthMiddleware = function (type: "ADMIN" | "USER") {
    return async function (req, res, next) {

        let code = (req.headers?.authorization || " ").split(" ")[1];


        let [username, password] = Buffer.from(code, 'base64').toString('utf8').split(":");

        if (!username)
            return res.sendStatus(401);
        //let user = await GetUserByUserName(username)


        // if (user?.type !== type || user?.password != password)
        //     return res.sendStatus(401);

        // req.user = user;

        return next();
    };
}