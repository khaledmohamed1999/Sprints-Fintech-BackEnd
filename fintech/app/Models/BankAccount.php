<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['funds'];
    protected $primaryKey = 'card_number';
}
