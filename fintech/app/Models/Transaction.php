<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public static $rules =[
        'sender_id' => 'required',
        'reciever_id' => 'required',
        'amount' => 'required',
        'status' => 'required',
    ];
}
