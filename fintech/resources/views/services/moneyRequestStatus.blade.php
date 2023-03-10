@extends('layouts.mainSite')
@section('content')
    <link rel="stylesheet" href="{{ url('css/wallet/wallet.css') }}">
    <div class="container-fluid">
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
        <div class="ml-5 inline col-lg-6">
            <h3 style="color: darkgreen">Your Requests</h3>
            @if (session()->has('messageError'))
                <div class="alert alert-danger"> {{ session()->get('messageError')}} </div>
            @endif
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead style="color: white;background-color: darkblue;">
                    <tr>
                        <th>Request #</th>
                        <th>Requested From</th>
                        <th>Amount Requested</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if ($requests->currentPage() > 1)
                        <p hidden>{{$counter += ($requests->perPage() * ($requests->currentPage()-1))}}</p>
                    @endif
                    @foreach ($requests as $request)
                        <tr>
                            <td class="align-middle">Request {{$counter + 1}}</td>
                            <td class="align-middle">{{$namesArray[$counter]}}</td>
                            <td class="align-middle">{{$request->amount}} EGP</td>
                            @if ($request->status == "Accepted")
                                <td style="color: blue" class="align-middle">{{$request->status}}</td>
                            @endif
                            @if ($request->status == "Rejected")
                                <td style="color: red" class="align-middle">{{$request->status}}</td>
                            @endif
                            @if ($request->status == "Not Resolved")
                                <td class="align-middle">{{$request->status}}</td>
                            @endif
                        </tr>
                        <p hidden>{{$counter++}}</p>
                    @endforeach
                </tbody>
            </table>
            <br>
                <div class="d-flex justify-content-center">{{$requests->links()}}</div>
            </div>
        </div>
    </div>
@endsection
