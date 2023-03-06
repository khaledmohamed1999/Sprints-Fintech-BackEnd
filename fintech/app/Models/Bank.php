<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static $rules = [
        'number' => ['required', 'numeric', 'min_digits:16', 'max_digits:16',],
        'name' => ['required', 'max:255',],
        'cvv' => ['required', 'numeric', 'min_digits:3', 'max_digits:4',],
        'expiry' => 'required',
    ];

    protected $fillable = ['number','name','cvv','expiry'];
}
