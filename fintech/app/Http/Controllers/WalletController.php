<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
