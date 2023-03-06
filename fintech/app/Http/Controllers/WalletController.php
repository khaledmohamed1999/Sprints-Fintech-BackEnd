<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
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
        $date = $request->post()['expiry'];
        $month = (int)(explode('-',$date)[1]);
        $year = (int)(explode('-',$date)[0]);
        $currentYear = (int)date("Y");
        $currentMonth = (int)date("m");

        if($currentYear < $year){
            $bankcard->fill($request->post());
            $bankcard->save();
            return redirect()->route('wallet');
        }

        elseif ($currentYear == $year) {
            if($currentMonth <= $month){
                $bankcard->fill($request->post());
                $bankcard->save();
                return redirect()->route('wallet');
            }

            else
                return redirect()->back()->withErrors('Card Is Already Expired');
        }

        else
            return redirect()->back()->withErrors('Card Is Already Expired');
    }
}
