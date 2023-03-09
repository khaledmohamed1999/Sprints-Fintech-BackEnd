<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function sender(){

        return $this->belongsTo(User::class,'sender_id');
    }
    public function reciever(){

        return $this->belongsTo(User::class,'reciever_id');
    }
    use HasFactory;

    public static $rules =[
        'sender_id' => 'required',
        'reciever_id' => 'required',
        'amount' => 'required',
        'status' => 'required',
    ];
}
