<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static $rules = [
        'number' => 'required',
        'name' => 'required',
        'cvv' => 'required',
        'expiry' => 'required',
    ];

    protected $fillable = ['number','name','cvv','expiry'];
}
