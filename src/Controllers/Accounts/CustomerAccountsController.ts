import {Response} from "express";
//import {AccountsDB} from "../../Model";
//import {CustomerAccount} from "../../service/CustomerAccount";
import {
    CustomerAccountsControllerLitResponse
} from "../../Http/JsonResponses/CustomerAccountsController/CustomerAccountsControllerLitResponse";
import {CustomRequest} from "../../Core/Server";
import {CustomResponse} from "../../Http/CustomResponse";


export class CustomerAccountsController {
    async list(req: CustomRequest, res: Response<CustomerAccountsControllerLitResponse>) {
        //let accounts = await(new CustomerAccount()).getListOfTransactions(req.user);
        //CustomResponse(res).json(new CustomerAccountsControllerLitResponse(accounts, req.user.getUserInfo()))
    }


  async  details(req: CustomRequest, res: Response) {

        let {acountno} = req.params;
        //let account = await (new AccountsDB).getAccountByNo(acountno)

        // if (account) {
        //     account.transactions = null;
        //     return CustomResponse(res).json(account)
        // }
        return CustomResponse(res).NotFound("account not found")

    }

    async transactions(req: CustomRequest, res: Response) {

        let {acountno} = req.params;

        //let account = await (new AccountsDB).getAccountByNo(acountno)

        // if (!account)
        //     return CustomResponse(res).NotFound("account not found")

        // return CustomResponse(res).json(account.transactions)
    }
}