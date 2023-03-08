@extends('layouts.mainSite')
@section('content')
    <div class="container-fluid">
        <a class="btn btn-info ml-5" href="/wallet">Go Back To Wallet</a> 
        <br>
        <br>
        <div class="ml-5 inline col-lg-6">
            <h3 style="color: darkgreen">Filtered Transactions</h3>
            @if (session()->has('messageError'))
                <div class="alert alert-danger"> {{ session()->get('messageError')}} </div>
            @endif
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead style="color: white;background-color: darkblue;">
                    <tr>
                        <th>ID</th>
                        <th>Transaction Date</th>
                        <th>Sender</th>
                        <th>Reciever</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if ($transactions instanceof \Illuminate\Pagination\LengthAwarePaginator || $transactions->currentPage() > 1)
                        <p hidden>{{$counter += (($transactions->perPage() * 2) * ($transactions->currentPage()-1))}}</p>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td class="align-middle">{{$transaction->id}}</td>
                                <td class="align-middle"> {{$transaction->created_at}} </td>
                                <td class="align-middle">{{$namesArray[$counter]}}</td>
                                <td class="align-middle">{{$namesArray[$counter + 1]}}</td>
                                <td class="align-middle">{{$transaction->amount}} EGP</td>
                                <td class="align-middle">{{$transaction->status}}</td>
                            </tr>
                            <p hidden>{{$counter += 2}}</p>
                        @endforeach

                    @else
                        <tr>
                            <td class="align-middle">{{$transactions->id}}</td>
                            <td class="align-middle"> {{$transactions->created_at}} </td>
                            <td class="align-middle">{{$namesArray[$counter]}}</td>
                            <td class="align-middle">{{$namesArray[$counter + 1]}}</td>
                            <td class="align-middle">{{$transactions->amount}} EGP</td>
                            <td class="align-middle">{{$transactions->status}}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <br>
            @if ($transactions instanceof \Illuminate\Pagination\LengthAwarePaginator || $transactions->currentPage() > 1)
            <div class="d-flex justify-content-center">{{$transactions->links()}}</div>
            @endif
            </div>
        </div>
    </div>
@endsection
