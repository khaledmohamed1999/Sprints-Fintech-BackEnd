import {Response} from "express";

export function CustomResponse(res: Response) {
    return {
        json(data: any) {
            return res.json({
                error: null,
                errorCode: 0,
                data: data,
                message: "every thing is ok"
            });
        },
        NotFound(message: string) {
            return res.status(404).json({
                error: "NOT FOUND",
                errorCode: 404,
                data: null,
                message: message
            })

        }
    }
}