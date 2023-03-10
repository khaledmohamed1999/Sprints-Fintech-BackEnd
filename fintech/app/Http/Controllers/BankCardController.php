<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'number' => 'required|digits:16',
            'name' => 'required|string',
            'cvv' => 'required|digits:3',
            'expiry' => 'required'
        ]);
        try {
            $bankCard = Bank::create([
                'user_id' => auth()->user()->id,
                'number' => $request->number,
                'expiry' => $request->expiry,
                'cvv' => $request->cvv,
                'name' => $request->name,
            ]);
            if(isset($bankCard)){
                return back()->with('message','Bank Card Linked Successfully!');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bank= Bank::where('number', $id)->first();
        return $bank;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $number)
    {
        try {
            $bankCard = Bank::find(decrypt($number));
            $bankCard->default = 1;
            if($bankCard->save()){
                return redirect()->back()->with('message','Bank card is now default card!');
            }else{
                return redirect()->back()->with('error','Something went wrong!');

            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
