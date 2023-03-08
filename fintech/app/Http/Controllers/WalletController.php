<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\User;
use App\Models\virtual_card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Redirect;
class WalletController extends Controller
{
    public function wallet(){
        return view('wallet');
    }

    public function sendMoney()
    {
        return view("services.sendMoney");
    }

    public function requestMoney()
    {
        return view("services.requestMoney");
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
        $user = User::first();
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


    public function link(Request $request){
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

    public function withdraw(Request $request){
        $userBalance = Auth::user()['balance'];
        $amount = $request->post()['amount'];
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
                    return redirect('/wallet')->with('messageSuc','Amount added to bank successfully');
                }
    
                else
                    return redirect()->back()->with('messageError','Your default account does not exist');
            }
    
            else
                return redirect()->back()->with('messageError','You have no funds in your wallet');
        }

        else
            return redirect()->back()->with('messageError','You need amount greater than 0');
    }

    public function depositMoney(Request $request){
        return $this->deposit($request);
    }

    public function deposit(Request $request){
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
                    return redirect('/wallet')->with('messageSuc','Amount added to wallet successfully');
                }
    
                else
                    return redirect()->back()->with('messageError','Not enough funds in your account');
            }
    
            else
                return redirect()->back()->with('messageError','Your default account does not exist');
        }

        else
            return redirect()->back()->with('messageError','You need amount greater than 0');
    }
}
