<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\MoneyRequest;
use App\Models\Transaction;
use App\Models\User;
use App\Models\virtual_card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Redirect;

class WalletController extends TransactionController
{
    public function wallet(){
        $transactions = Transaction::where('sender_id',Auth::id())->orWhere('reciever_id',Auth::id())->get();
        $namesArray = $this->createNamesArray($transactions);
        return view('wallet')->with([
            'transactions' => Transaction::where('sender_id',Auth::id())->orWhere('reciever_id',Auth::id())->paginate(10),
            'namesArray' => $namesArray,
            'counter'=> 0
        ]);
    }

    public function sendMoneyView()
    {
        return view("services.sendMoney");
    }

    public function requestMoneyView()
    {
        return view("services.requestMoney");
    }

    public function requestsView()
    {
        $requests = MoneyRequest::where('request_reciever_id',Auth::id());   
        $namesArray = array();
        foreach ($requests->get() as $request) {
            $senderName = User::find($request->request_sender_id)->name;
            array_push($namesArray,$senderName);
        }
        return view("services.moneyRequests")->with(['requests' => $requests->paginate(10), 'namesArray' => $namesArray, 'counter' => 0]);
    }

    public function requestStatusView()
    {
        $requests = MoneyRequest::where('request_sender_id',Auth::id());   
        $namesArray = array();
        foreach ($requests->get() as $request) {
            $senderName = User::find($request->request_reciever_id)->name;
            array_push($namesArray,$senderName);
        }
        return view("services.moneyRequestStatus")->with(['requests' => $requests->paginate(10), 'namesArray' => $namesArray, 'counter' => 0]);
    }


    public function payBills()
    {
        return view("services.payBills");
    }

    public function manageFunds(){
        return view("user_functions.fund-management");
    }

    public function bankLinkView(){
        return view('user_functions.bank-linking');
    }
    public function generateCard(){
        //$user = auth()->user();
        $user = Auth::user();
        $cards=virtual_card::where('user_id','=',$user['id'])->get();
        if(count($cards)>0){
            $card =$cards[0];
        }
        else{
            $card = new  virtual_card;
            $card['user_id']=$user['id'];
            $card['expiry_date']=date('m');
            $y=date('y') +3;
            $card['expiry_date']= $card['expiry_date'] . "/".$y;
            $card['cvv']=mt_rand(100, 999);
            $card['card_number']='597823'.
            mt_rand(1000000000, 9999999999);
            $card->save();
        }
        return view('user_functions.generate-card')->with([
            'card'=>$card,
            'user'=>$user,


        ]);
    }
    public function deleteVirtualCard($id){
        $virtual = virtual_card::findOrFail($id);
        virtual_card::destroy($id);
        return redirect('wallet')->with('success','Card has been deleted');
    }

    public function bankLink(Request $request){
        return $this->link($request);
    }


    private function link(Request $request){
        $request->validate(Bank::$rules);
        $bankcard = new Bank;
        $cvvHashed = Hash::make($request->post()['cvv']);
        $account = BankAccount::find($request->post()['number']);
        if(is_null($account))
            return redirect()->back()->with('messageError','Account Does Not Exist');
        elseif(!is_null(Bank::find($request->post()['number']))){
            return redirect()->back()->with('messageError','Account Already Linked');
        }
        else{
            if($request->post()['name'] != $account['account_holder_name'])
                return redirect()->back()->with('messageError','There is no account registered with this user');
            else{
                $cvvPost = $request->post()['cvv'];
                if(!Hash::check($cvvPost,$account['cvv']))
                    return redirect()->back()->with('messageError','Account not registered with this cvv');
                    
                else{
                    $date = $request->post()['expiry'];
                    $month = (int)(explode('-',$date)[1]);
                    $year = (int)(explode('-',$date)[0]);
                    $currentYear = (int)date("Y");
                    $currentMonth = (int)date("m");
            
                    if($currentYear < $year){
                        $bankcard->fill($request->post());
                        $bankcard['user_id'] = Auth::id();
                        $bankcard['cvv'] = $cvvHashed;
                        $bankcard->save();
                        return redirect('/wallet')->with('messageSuc', 'Card Successfully Linked!');
                    }
            
                    elseif ($currentYear == $year) {
                        if($currentMonth <= $month){
                            $bankcard->fill($request->post());
                            $bankcard['user_id'] = Auth::id();
                            $bankcard['cvv'] = $cvvHashed;
                            $bankcard->save();
                            return redirect('/wallet');
                        }
            
                        else
                            return redirect()->back()->with('messageError','Card Is Already Expired');
                    }
            
                    else
                        return redirect()->back()->with('messageError','Card Is Already Expired');
                }
            }
        }
    }

    public function withdrawMoney(Request $request){
        return $this->withdraw($request);
    }

    private function withdraw(Request $request){
        $userBalance = Auth::user()['balance'];
        $amount = $request->post()['amount'];
        if(is_null($amount))
            $amount = 0;
        if($amount > 0){
            if($userBalance > 0 && $userBalance >= $amount){
                $defaultPaymentCard = (DB::table('banks')
                ->where('user_id',Auth::id())
                ->where('default',1)
                ->first());
                $account = BankAccount::find($defaultPaymentCard->number);
                if($account){
                    $oldfunds = $account->funds;
                    User::findOrFail(Auth::id())->update(['balance' => ($userBalance - $amount)]);
                    BankAccount::findOrFail($defaultPaymentCard->number)->update(['funds' => ($oldfunds + $amount)]);
                    $this->addTransactionRecordFromFundManagement(Auth::user(),$amount,'Successful');
                    return redirect('/wallet')->with('messageSuc','Amount added to bank successfully');
                }
    
                else{
                    $this->addTransactionRecordFromFundManagement(Auth::user(),$amount,'Failed');
                    return redirect()->back()->with('messageError','Your default account does not exist');
                }
            }
    
            else{
                $this->addTransactionRecordFromFundManagement(Auth::user(),$amount,'Failed');
                return redirect()->back()->with('messageError','You have no funds in your wallet');
            }
        }

        else{
            $this->addTransactionRecordFromFundManagement(Auth::user(),$amount,'Failed');
            return redirect()->back()->with('messageError','You need amount greater than 0');
        }
    }

    public function depositMoney(Request $request){
        return $this->deposit($request);
    }

    private function deposit(Request $request){
        $userBalance = Auth::user()['balance'];
        $amount = $request->post()['amount'];
        $defaultPaymentCard = (DB::table('banks')
            ->where('user_id',Auth::id())
            ->where('default',1)
            ->first());
        $account = BankAccount::find($defaultPaymentCard->number);
        if($amount > 0){
            if($account){
                if($account->funds > 0 && $account->funds >= $amount){
                    $oldfunds = $account->funds;
                    User::findOrFail(Auth::id())->update(['balance' => ($userBalance + $amount)]);
                    BankAccount::findOrFail($defaultPaymentCard->number)->update(['funds' => ($oldfunds - $amount)]);
                    $this->addTransactionRecordFromFundManagement(Auth::user(),$amount,'Successful');
                    return redirect('/wallet')->with('messageSuc','Amount added to wallet successfully');
                }
    
                else{
                    $this->addTransactionRecordFromFundManagement(Auth::user(),$amount,'Failed');
                    return redirect()->back()->with('messageError','Not enough funds in your account');
                }
            }
    
            else{
                $this->addTransactionRecordFromFundManagement(Auth::user(),$amount,'Failed');
                return redirect()->back()->with('messageError','Your default account does not exist');
            }
        }

        else{
            $this->addTransactionRecordFromFundManagement(Auth::user(),$amount,'Failed');
            return redirect()->back()->with('messageError','You need amount greater than 0');
        }
    }

    public function sendMoney(Request $request){
        return $this->sendM($request);
    }

    private function sendM(Request $request){
        if($request->email == Auth::user()->email)
            return redirect('/send-money')->with('messageError','You cant send money to yourself');
        $amount = $request->post()['amount'];
        $receiver = User::where('email',$request->post()['email'])->first();
        if(is_null($receiver)){
            $this->addTransactionRecordFromService(Auth::user(),$amount,0,'Failed');
            return redirect('/send-money')->with('messageError','User Does Not Exist');
        }

        else{
            $senderBalance = Auth::user()['balance'];
            $receiverBlanace = $receiver['balance'];

            if($amount > 0 && $amount <= $senderBalance){
                User::findOrFail(Auth::id())->update(['balance' => ($senderBalance - $amount)]);
                $receiver->update(['balance' => ($receiverBlanace + $amount)]);
                $this->addTransactionRecordFromService(Auth::user(),$amount,$receiver['id'],'Successful');
                return redirect('/send-money')->with('messageSuc','Money Sent Successfully');
            }

            else{
                $this->addTransactionRecordFromService(Auth::user(),$amount,$receiver,'Failed');
                return redirect('/send-money')->with('messageError','Not Enough Funds');
            }
        }
    }


    public function requestMoney(Request $request){
        return $this->requestM($request);
    }

    private function requestM(Request $request){
        $amount = $request->post()['amount'];
        $reason = $request->post()['reason'];
        $receiver = User::where('email',$request->post()['email'])->first();
        if(is_null($receiver))
            return redirect('/request-money')->with('messageError','User Does Not Exist');
        
        else{
            if(is_null($reason))
                return redirect('/request-money')->with('messageError','Reason Can Not Be Empty');
            if($amount > 0){
                $request->validate(MoneyRequest::$rules);
                $moneyRequest = new MoneyRequest;
                $moneyRequest['request_sender_id'] = Auth::id();
                $moneyRequest['request_reciever_id'] = $receiver->id;
                $moneyRequest['amount'] = $amount;
                $moneyRequest['reason'] = $reason;
                $moneyRequest->save();
                return redirect('/request-money')->with('messageSuc','Request Sent Successfully');
            }

            else
                return redirect('/request-money')->with('messageError','Amount should be greater than 0');
        }
    }

    public function resolveMoneyRequest($id, $status){
        return $this->resolve($id, $status);
    }

    private function resolve($id, $status){
        $request = MoneyRequest::find($id);
        if(Auth::id() != $request->request_reciever_id)
            return redirect('/money-requests')->with('messageError','You Are Not Allowed To Handle Requests That Arent Yours');

        switch ($status) {
            case 'Accepted':
                if(Auth::user()->balance >= $request->amount){
                    $moneyReceiverOldBalance = User::find($request->request_sender_id)->balance;
                    $userOldBalance = Auth::user()->balance;
                    DB::table('users')->where('id', $request->request_sender_id)->update(['balance' => ($moneyReceiverOldBalance + $request->amount)]);
                    DB::table('users')->where('id', Auth::id())->update(['balance' => ($userOldBalance - $request->amount)]);
                    DB::table('money_requests')->where('id', $id)->update(['status' => 'Accepted']);
                    $this->addTransactionRecordFromService(Auth::user(),$request->amount,$request->request_sender_id,'Successful');
                    return redirect('/money-requests')->with('messageSuc','Request Accepted');
                }

                else{
                    MoneyRequest::find($id)->update(['status' => 'Rejected']);
                    return redirect('/money-requests')->with('messageError','You dont have enough funds to send');
                }
            
            case 'Rejected':
                MoneyRequest::find($id)->update(['status' => $status]);
                return redirect('/money-requests')->with('messageSuc','Request Rejected');
        }
        



        // User::findOrFail(Auth::id())->update(['balance' => ($senderBalance - $amount)]);
        // $receiver->update(['balance' => ($receiverBlanace + $amount)]);
        // $this->addTransactionRecordFromService(Auth::user(),$amount,$receiver['id'],'Successful');
        // return redirect('/send-money')->with('messageSuc','Money Sent Successfully');
    }
    
}
