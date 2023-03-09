<?php

namespace App\Http\Controllers;


use App\Models\Transaction;

use App\Models\contact;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $vendors=Vendor::all();
        return view("home")->with([
            'vendors'=>$vendors,
        ]);
    
    }

    public function contact()
    {
        return view("contact");
    }
    public function storeContact(Request $request){
        $contact = new contact;
       //
        $contact['user_id']=1;
        //
        $contact['subject']=$request['subject'];
        $contact['message']=$request['message'];
        $contact->save();
        return redirect("contact-us")->with('success','message sent successfully');
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
