<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;


class AdminController extends Controller
{
    function  user(){
    


        $users = User::where('type', '=', 'user')->paginate(10);
            return view ('admin.user', compact('users'));
       }
       function  vendor(){
        
    
    
        $users = User::where('type', '=', 'vendor')->paginate(10);
            return view ('admin.vendor', compact('users'));
       }
    
       //craete
       public function create($id){
        $user = User::findOrFail($id);
       return view('admin.users.create',compact('user'));
       }
    
       public function store(Request $request ){
        
        $request->validate([
            
            'image' => ['required'],
            'user_id'=>['required']
            
        ]);
        
        $vendor = new Vendor;
     
                $vendor->fill($request->post());
                $imageUrl = $request->file('image')->store('vendors', ['disk' => 'public']);
                $vendor['image_url'] = $imageUrl;
                $vendor['user_id'] = $request['user_id'];
                $vendor->save();
                return redirect()->route('vendors')->with('message', 'Vendor Image Added Successfully');
        }
       //search
       public function search_user(Request $request ){
        $name=$request['name'];
        $serarch=$request['search_name'];
          $users=User::where($serarch,'like',  '%' . $name .'%')->where('type','=','user')->paginate(5);
          $users->appends(['name' => $name, 'search_name' => $serarch]);
          return view ('admin.user',compact('users'));
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
             'phone_number' => ['required', 'numeric', 'min_digits:11', 'max_digits:11'],
             'type' => ["required" , "regex:(vendor|user)"]
         ]);
            $user->fill($request->post());
    
            $user['name'] = $request['name'];
            $user['email'] = $request['email'];
            $user['balance'] = $request['balance'];
            $user['phone_number'] = $request['phone_number'];
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
        public function transactions($id)
        {
           
            $users = User::findOrFail($id);
            $transactions=Transaction::where('sender_id','=',$id)->orWhere('reciever_id','=',$id)->paginate(10);
           
            return view('admin.users.transactions')->with([
                'users'=>$users, 'transactions'=>$transactions]);
        }
        public function transactions_all( ){
            $transactions=Transaction::paginate(10);
            return view('admin.transaction',compact('transactions'));
            
                }
                public function search_transaction(Request $request ){
                    
                    $name=$request['name'];
                    $serarch=$request['search_name'];
                    if($request['search_name']!='created_at')
                      $transactions=Transaction::where($serarch,'=',   $name )->paginate(10);
                      else
                      $transactions=Transaction::where($serarch,'like','%'.$name.'%' )->paginate(10);
                      $transactions->appends(['name' => $name, 'search_name' => $serarch]);
                      return view ('admin.transaction',compact('transactions'));
                        }
}
