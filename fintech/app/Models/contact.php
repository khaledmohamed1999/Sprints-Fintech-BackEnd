<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;

    public static $rules = [
        'subject' => 'required',
        'message' => 'required',
    ]; 
    protected $fillable = [
        'user_id',
        'subject',
        'message',
        
    ];
}
