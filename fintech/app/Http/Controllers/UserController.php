<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
class UserController extends Controller
{
   function  user(){
    


    $users = User::where('type', '=', 'user')->paginate(10);
        return view ('admin.user', compact('users'));
   }
   function  vendor(){
    


    $users = User::where('type', '=', 'vendor')->paginate(10);
        return view ('admin.vendor', compact('users'));
   }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = User::findOrFail($id);
        
        return view('admin.users.edit')->with([
            'user'=>$user,
            
    ]);
    }


       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        
        $request->validate([
         'name' => ['required', 'string', 'max:255'],
         'email' => ['required', 'string', 'email', 'max:255'],
         'phone_number' => ['required', 'numeric', 'min:11',],
         'type' => ["required" , "regex:(vendor|user)"]
     ]);
        $user->fill($request->post());

        $user['name'] = $request['name'];
        $user['email'] = $request['email'];
        $user['balance'] = $request['balance'];
        $user['phone_number'] = $request['phone'];
        $user['name'] = $request['name'];
        $user['type']=$request['type'];
        $user['is_admin'] = $request['is_admin'] ? 1 : 0;
        $user->save();
        return redirect()->route('users')->with('message', 'User updated Successfully');
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        User::destroy($id);
        return redirect()->route('users')->with('alert', 'User deleted successfully');
    }
}
