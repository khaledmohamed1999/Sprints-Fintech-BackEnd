@extends('layouts.mainSite')
@section('content')
    <link rel="stylesheet" href="{{ url('css/wallet/wallet.css') }}">
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="send-money">Send Money</a>
                    <a class="breadcrumb-item text-dark" href="request-money">Request Money</a>
                    <a class="breadcrumb-item text-dark" href="money-requests">See Requests</a>
                    <a class="breadcrumb-item text-dark" href="pay-online">Pay Online</a>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="ml-5 inline col-lg-5">
            @if (session()->has('messageSuc'))
                <div class="alert alert-success"> {{ session()->get('messageSuc')}} </div>
            @endif

            @if (session()->has('messageError'))
                <div class="alert alert-danger"> {{ session()->get('messageError')}} </div>
            @endif


            <h5 style="color: darkgreen;" class=" bg-secondary  section-title position-relative text-uppercase mb-3">Wallet
                Balance</h5>
            <div class="bg-light p-30 mb-5">
                <img style="display: inline-block;" src="{{ url('img/balance.jfif') }}" alt="">
                <div style="display: inline-block;" class="border-bottom">
                    <div class="d-flex justify-content-between mb-3">
                        <h5>Balance: {{Auth::user()['balance']}} EGP</h5>
                    </div>
                </div>
                <div class="pt-2">
                    <a href='{{ URL::current() . '/manage-funds' }}'
                        class="btn btn-block btn-primary font-weight-bold py-3">
                        Manage Funds
                    </a>

                    <a href='{{ URL::current() . '/bank-linking' }}'
                        class="btn btn-block btn-primary font-weight-bold py-3">
                        Link Bank Card
                    </a>
                    <a href='{{ URL::current() . '/generate-card' }}'
                        class="btn btn-block btn-primary font-weight-bold py-3">
                        Generate Virtual Card
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-10 table-responsive mb-5">
            <h3 style="color: darkgreen;">Transaction History</h3>

            <form action='{{ route('filter')}}' method="GET">
                <input style="width: 35%" type="text" placeholder="Search" name="filterSearch">
                <select class="form-select" name="filterForTransaction">
                    <option value="" selected>What Do You Want To Search For?</option>
                    <option value="sender">Sender Email</option>
                    <option value="receiver">Receiver Email</option>
                    <option value="id">Transaction ID</option>
                    <option value="status">Transaction Status</option>
                    <option value="date">Date (YYYY-MM)</option>
                </select>
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>

            <br>
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
                    @if ($transactions->currentPage() > 1)
                        <p hidden>{{$counter += (($transactions->perPage() * 2) * ($transactions->currentPage()-1))}}</p>
                    @endif
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="align-middle">{{$transaction->id}}</td>
                            <td class="align-middle"> {{$transaction->created_at}} </td>
                            <td class="align-middle">{{$namesArray[$counter]}}</td>
                            <td class="align-middle">{{$namesArray[$counter + 1]}}</td>
                            <td class="align-middle">{{$transaction->amount}} EGP</td>
                            @if ($transaction->status == "Successful")
                                <td style="color: blue" class="align-middle">{{$transaction->status}}</td>
                            @endif
                            @if ($transaction->status == "Failed")
                                <td style="color: red" class="align-middle">{{$transaction->status}}</td>
                            @endif
                        </tr>
                        <p hidden>{{$counter += 2}}</p>
                    @endforeach
                </tbody>
            </table>
            <br>
            <div class="d-flex justify-content-center">{{$transactions->links()}}</div>
        </div>

    </div>
@endsection
