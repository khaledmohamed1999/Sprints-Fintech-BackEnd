<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function contact()
    {
        return view("contact");
    }

    public function about()
    {
        return view("about");
    }

    public function payOnline()
    {
        return view("services.payOnline");
    }
    public function admin()
    {

        $users = User::all();
        $nusers = User::where('type', '=', 'user');
        $vendors = User::where('type', '=', 'vendor');
        $transactions=Transaction::all();
        $balance = User::sum('balance');
        return view('admin.adminhome', compact('users','nusers','vendors','transactions','balance'));
        
    }
}
