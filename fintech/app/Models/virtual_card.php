<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class virtual_card extends Model
{
    use HasFactory;
    protected $fillable = [
        'expiry_date',
        'user_id',
        'card_number',
        'cvv',
    ];
    public $timestamps=false;
}
