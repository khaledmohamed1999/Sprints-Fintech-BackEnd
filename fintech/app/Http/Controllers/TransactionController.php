<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class TransactionController extends Controller
{

    public function filteredTransactionsView(){
        return view('services.filteredTransactions');
    }

    protected function addTransactionRecordFromFundManagement(object $user, float $amount, string $status, string $method){
        $transaction = new Transaction;
        $transaction['sender_id'] = $user['id'];
        $transaction['reciever_id'] = $user['id'];
        $transaction['created_at'] = now();
        $transaction['updated_at'] = now();
        $transaction['amount'] = $amount;
        $transaction['status'] = $status;
        $transaction['method'] = $method;
        $transaction->save();
    }

    protected function addTransactionRecordFromService(object $sender, float $amount,int $receiver ,string $status, string $method){
        $transaction = new Transaction;
        if($receiver == 0)
            $transaction['reciever_id'] = null;
        else
            $transaction['reciever_id'] = $receiver;
        $transaction['sender_id'] = $sender['id'];
        $transaction['created_at'] = now();
        $transaction['updated_at'] = now();
        $transaction['amount'] = $amount;
        $transaction['status'] = $status;
        $transaction['method'] = $method;
        $transaction->save();

    }

    public function transactionFilter(Request $request){
        return $this->filter($request);
    }

    private function filter(Request $request){
        $filter = $request->get('filterForTransaction');
        $search = $request->input('filterSearch');
        if(is_null($search))
            return redirect()->back()->with('messageError','Search Bar is Empty');

        switch ($filter) {
            case 'sender':
                $check  = $this->transactionSecurity(User::where('email', $search)->first());
                if(!$check)
                    return redirect()->back()->with('messageError','Youre not authorized to see the transactions of that user');
                
                $sender = User::where('email', $search)->first();
                if(is_null($sender))
                    return redirect()->back()->with('messageError','User Doesnt Exist');
                else{
                    $transactions = Transaction::where('sender_id',$sender->id)->get();
                    if($transactions->count() == 0)
                        return redirect()->back()->with('messageError','This user didnt send any transactions');
                    else{

                        $namesArray = $this->createNamesArray($transactions);
                        $transactions = Transaction::where('sender_id',$sender->id)->paginate(10);
                        $transactions->appends(['filterSearch' => $search, 'filterForTransaction' => $filter]);
                        return view('services.filteredTransactions')->with([
                            'transactions' => $transactions,
                            'namesArray' => $namesArray,
                            'counter'=> 0
                        ]);
                    }
                }
            
            case 'receiver':
                $check  = $this->transactionSecurity(User::where('email', $search)->first());
                if(!$check)
                    return redirect()->back()->with('messageError','Youre not authorized to see the transactions of that user');

                $reciever = User::where('email', $search)->first();
                if(is_null($reciever))
                    return redirect()->back()->with('messageError','User Doesnt Exist');
                else{
                    $transactions = Transaction::where('reciever_id',$reciever->id)->get();
                    if($transactions->count() == 0)
                        return redirect()->back()->with('messageError','This user didnt send any transactions');
                    else{
                        $namesArray = $this->createNamesArray($transactions);
                        $transactions = Transaction::where('reciever_id',$reciever->id)->paginate(10);
                        $transactions->appends(['filterSearch' => $search, 'filterForTransaction' => $filter]);
                        return view('services.filteredTransactions')->with([
                            'transactions' => $transactions,
                            'namesArray' => $namesArray,
                            'counter'=> 0
                        ]);   
                    }
                }

            case 'id':
                if(is_numeric($search)){
                    $transaction = Transaction::find($search);
                    if(is_null($transaction))
                        return redirect()->back()->with('messageError','This Transaction Doesnt exist');
                    else{
                        if(($transaction->sender_id != Auth::id()) && ($transaction->reciever_id != Auth::id()))
                            return redirect()->back()->with('messageError','Youre not authorized to see that transaction');
                        else{
                            $namesArray = $this->createNamesArray($transaction);
                            return view('services.filteredTransactions')->with([
                                'transactions' => $transaction,
                                'namesArray' => $namesArray,
                                'counter'=> 0
                            ]);
                        }
                    }
                }
                else
                    return redirect()->back()->with('messageError','Please Enter A Number For The ID');

            case 'status':
                if($search == "Successful" || $search == "Failed"){

                    $transactions = Transaction::where('status',$search)
                                    ->where(function($query){
                                        $query->where('sender_id',Auth::id())
                                              ->orWhere('reciever_id',Auth::id());
                            });
                    if($transactions->get()->count() > 0){
                        $namesArray = $this->createNamesArray($transactions->get());
                        $transactionStatus = $transactions->paginate(10);
                        $transactionStatus->appends(['filterSearch' => $search, 'filterForTransaction' => $filter]);
                        return view('services.filteredTransactions')->with([
                            'transactions' => $transactionStatus,
                            'namesArray' => $namesArray,
                            'counter'=> 0
                        ]);
                    }

                    else
                        return redirect()->back()->with('messageError','There no transactions with status' . $search);
                }
                else
                    return redirect()->back()->with('messageError','Please write the status correctly');

            case 'date':
                $enteredDate = date_create_from_format(('Y-m'),$search);
                if($enteredDate){
                    $enteredDate = $enteredDate->format('Y-m');
                    $year = explode("-",$enteredDate)[0];
                    $month = explode("-",$enteredDate)[1];
                    $transactions = Transaction::whereYear('created_at',$year)->whereMonth('created_at',$month)
                                    ->where(function($query){
                                        $query->where('sender_id',Auth::id())
                                              ->orWhere('reciever_id',Auth::id());
                                    });
                    if($transactions->get()->count() > 0){
                        $namesArray = $this->createNamesArray($transactions->get());
                        $transactionDates = $transactions->paginate(10);
                        $transactionDates->appends(['filterSearch' => $search, 'filterForTransaction' => $filter]);
                        return view('services.filteredTransactions')->with([
                            'transactions' => $transactionDates,
                            'namesArray' => $namesArray,
                            'counter'=> 0
                        ]);
                    }

                    else
                        return redirect()->back()->with('messageError','No Transactions In This Date');
                }

                else
                    return redirect()->back()->with('messageError','Please write the date in the correct format');
            
            default:
                return redirect()->back()->with('messageError','You didnt select a filter');
        }
    }

    protected function createNamesArray($transactions){
        $namesArray = array();
        if($transactions instanceof Collection){
            foreach ($transactions as $transaction) {
                if((User::where('id',$transaction->sender_id)->first()->name) == Auth::user()->name)
                    array_push($namesArray,"You");
                else
                    array_push($namesArray,(User::where('id',$transaction->sender_id)->first()->name));

                if(is_null($transaction->reciever_id))
                    array_push($namesArray,"None Existent User");
                else{
                    if((User::where('id',$transaction->reciever_id)->first()->name) == Auth::user()->name)
                        array_push($namesArray,"You");
                    else
                        array_push($namesArray,(User::where('id',$transaction->reciever_id)->first()->name));
                }
            }
            return $namesArray;
        }

        else{
            if((User::where('id',$transactions->sender_id)->first()->name) == Auth::user()->name)
                array_push($namesArray,"You");
            else
                array_push($namesArray,(User::where('id',$transactions->sender_id)->first()->name));
            if(is_null($transactions->reciever_id))
                array_push($namesArray,"None Existent User");
            else{
                if((User::where('id',$transactions->reciever_id)->first()->name) == Auth::user()->name)
                    array_push($namesArray,"You");
                else
                    array_push($namesArray,(User::where('id',$transactions->reciever_id)->first()->name));
            }
            return $namesArray;
        }
    }

    private function transactionSecurity($userSearched){
        $userID = Auth::id();
        $checkSend = (Transaction::where('sender_id',$userSearched->id))
                        ->where('reciever_id',$userID)
                        ->get();
        $checkRecieve = (Transaction::where('reciever_id',$userSearched->id))
                        ->where('sender_id',$userID)
                        ->get();

        if($checkSend->count() > 0 && $checkRecieve->count() > 0)
            return true;
        else
            return false;
    }
}
