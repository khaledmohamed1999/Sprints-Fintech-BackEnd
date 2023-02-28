export interface Level {
    name: string,
    wight: number
}

export interface HandlerAcceptable {

    message: string,
    context?: object,
    level: Level,
    channel: string,
    datetime: Date
    extra?: any

}


export interface IHandler {
    log(details: HandlerAcceptable): void
}
