<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected function addTransactionRecordFromFundManagement(object $user, float $amount, string $status){
        $transaction = new Transaction;
        $transaction['sender_id'] = $user['id'];
        $transaction['reciever_id'] = $user['id'];
        $transaction['created_at'] = now();
        $transaction['updated_at'] = now();
        $transaction['amount'] = $amount;
        $transaction['status'] = $status;
        $transaction->save();


    }
}
