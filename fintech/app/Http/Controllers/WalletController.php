<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        
    }

    public function depositMoney(Request $request){
        return $this->deposit($request);
    }

    public function deposit(Request $request){
        
    }
}
