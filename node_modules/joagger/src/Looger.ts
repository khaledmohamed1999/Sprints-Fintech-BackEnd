import {IHandler, Level} from "./Handlers/AbstractHandler";
import {StdHandler} from "./Handlers/StdHandler";


export const LogLevels = {
    DEBUG: {name: 'DEBUG', wight: 100},
    INFO: {name: 'INFO', wight: 200},
    NOTICE: {name: 'DEBUG', wight: 300},
    WARNING: {name: 'WARNING', wight: 400},
    ERROR: {name: 'ERROR', wight: 500},
    CRITICAL: {name: 'CRITICAL', wight: 600},
    ALERT: {name: 'ALERT', wight: 700},
    EMERGENCY: {name: 'EMERGENCY', wight: 800},
}


export interface ILogger {
    setHandlers(handlers: Array<IHandler>): void;

    pushHandler(handler: IHandler): void;

    debug(message: string, context?: any, extra?: any): void;

    info(message: string, context?: any, extra?: any): void;

    notice(message: string, context?: any, extra?: any): void;

    warning(message: string, context?: any, extra?: any): void;

    error(message: string, context?: any, extra?: any): void;

    critical(message: string, context?: any, extra?: any): void;

    alert(message: string, context?: any, extra?: any): void;

    emergency(message: string, context?: any, extra?: any): void;
}


export class Logger implements ILogger {
    private readonly _channel: string;
    private handlers: Array<IHandler> = [];


    constructor(channel: string) {
        this._channel = channel;
    }

    setHandlers(handlers: Array<IHandler>): void {
        this.handlers = handlers;
    }

    private _log(level: Level, message: string, context = {}, extra = {}): void {
        let now = new Date();
        for (let handler of this.handlers) {
            handler.log({
                channel: this._channel,
                context: context,
                datetime: now,
                extra: extra,
                level: level,
                message: message
            })
        }
    }

    pushHandler(handler: IHandler): void {
        this.handlers.push(handler)
    }

    alert(message: string, context: any = {}, extra: any = {}): void {
        this._log(LogLevels.ALERT, message, context, extra)
    }

    critical(message: string, context: any = {}, extra: any = {}): void {
        this._log(LogLevels.CRITICAL, message, context, extra)
    }

    debug(message: string, context: any = {}, extra: any = {}): void {
        this._log(LogLevels.DEBUG, message, context, extra)
    }

    emergency(message: string, context: any = {}, extra: any = {}): void {
        this._log(LogLevels.EMERGENCY, message, context, extra)
    }

    error(message: string, context: any = {}, extra: any = {}): void {
        this._log(LogLevels.ERROR, message, context, extra)
    }

    info(message: string, context: any = {}, extra: any = {}): void {
        this._log(LogLevels.INFO, message, context, extra)
    }

    notice(message: string, context: any = {}, extra: any = {}): void {
        this._log(LogLevels.NOTICE, message, context, extra)
    }

    warning(message: string, context: any = {}, extra: any = {}): void {
        this._log(LogLevels.WARNING, message, context, extra)
    }


}


export interface LoggerList<T extends ILogger> {
    [key: string]: T;
}

export class LoggerFactory {

    private static logsList: LoggerList<ILogger> = {};

    static create(name: string, handlers: IHandler[] = []): ILogger {
        if (!(name in LoggerFactory.logsList)) {
            LoggerFactory.logsList[name] = this.make(name, handlers);
        }
        return LoggerFactory.logsList[name];
    }

    private static make(name: string, handlers: IHandler[] = []): ILogger {
        let logger = new Logger(name);
        logger.setHandlers(handlers);
        return logger;
    }


}

export function logger(channel: string = "default", handlers: Array<IHandler> = []) {

    if (handlers.length === 0)
        handlers.push(new StdHandler())

    return LoggerFactory.create(channel, handlers);
}
