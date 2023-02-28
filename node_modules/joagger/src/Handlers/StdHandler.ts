import {HandlerAcceptable, IHandler, Level} from "./AbstractHandler";
import {LogLevels} from "../Looger";

export class StdHandler implements IHandler {
    log(details: HandlerAcceptable): void {
        console.log(
            details.datetime.toISOString(),
            this.showLevel(details.level),
            details.channel.toUpperCase(), "|",
            details.message
        )
    }

//
//     log(details: HandlerAcceptable): void {
//         log(type: string, text: string): void {
//             console.log(type, text)
//         }
//     }
//
    private showLevel(level: Level) {
        const Reset = "\x1b[0m"
        // FgBlack = "\x1b[30m"
        const FgRed = "\x1b[31m"
        const FgGreen = "\x1b[32m"
        const FgYellow = "\x1b[33m"
        // FgBlue = "\x1b[34m"
        // FgMagenta = "\x1b[35m"
        // FgCyan = "\x1b[36m"
        // FgWhite = "\x1b[37m"
        if (level.wight < LogLevels.NOTICE.wight) {
            return FgGreen + level.name + Reset;
        } else if (level.wight <= LogLevels.WARNING.wight) {
            return FgYellow + level.name + Reset;
        } else if (level.wight === LogLevels.ERROR.wight) {
            return FgRed + level.name + Reset;
        } else {
            return FgRed + "!!!" + level.name + "!!!" + Reset;
            // red
        }
    }
}
