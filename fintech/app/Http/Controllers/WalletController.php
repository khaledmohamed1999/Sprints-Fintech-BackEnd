<?php

namespace App\Http\Controllers;

use App\Models\Bank;
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
        $date = $request->post()['expiry'];
        $cardNumberHashed = Hash::make($request->post()['number']);
        $cvvHashed = Hash::make($request->post()['cvv']);
        $month = (int)(explode('-',$date)[1]);
        $year = (int)(explode('-',$date)[0]);
        $currentYear = (int)date("Y");
        $currentMonth = (int)date("m");

        if($currentYear < $year){
            $bankcard->fill($request->post());
            $bankcard['user_id'] = Auth::id();
            $bankcard['number'] = $cardNumberHashed;
            $bankcard['cvv'] = $cvvHashed;
            $bankcard->save();
            return redirect()->route('/wallet');
        }

        elseif ($currentYear == $year) {
            if($currentMonth <= $month){
                $bankcard->fill($request->post());
                $bankcard['user_id'] = Auth::id();
                $bankcard['number'] = $cardNumberHashed;
                $bankcard['cvv'] = $cvvHashed;
                $bankcard->save();
                return redirect()->route('/wallet');
            }

            else
                return redirect()->back()->withErrors('Card Is Already Expired');
        }

        else
            return redirect()->back()->withErrors('Card Is Already Expired');
    }
}
