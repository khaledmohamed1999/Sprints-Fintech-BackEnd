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
                    </nav>
                </div>
            </div>
        </div>
        <a class="btn btn-info ml-5" href="/money-requests/request-status">See Requests You Sent</a>
        <br>
        <br>
        <div class="ml-5 inline col-lg-6">
            <h3 style="color: darkgreen">Requests Received</h3>
            @if (session()->has('messageError'))
                <div class="alert alert-danger"> {{ session()->get('messageError')}} </div>
            @endif

            @if (session()->has('messageSuc'))
                <div class="alert alert-success"> {{ session()->get('messageSuc')}} </div>
            @endif
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead style="color: white;background-color: darkblue;">
                    <tr>
                        <th>Request #</th>
                        <th>Request Sender</th>
                        <th>Amount Requested</th>
                        <th>Reason</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if ($requests->currentPage() > 1)
                        <p hidden>{{$counter += ($requests->perPage() * ($requests->currentPage()-1))}}</p>
                    @endif
                    @foreach ($requests as $request)
                        @if ($request->status == "Not Resolved")
                            <tr>
                                <td class="align-middle">Request {{$counter + 1}}</td>
                                <td class="align-middle">{{$namesArray[$counter]}}</td>
                                <td class="align-middle">{{$request->amount}} EGP</td>
                                <td class="align-middle">{{$request->reason}}</td>
                                <td><a class="btn btn-success" href="{{ url('money-requests/' . $request->id . '/Accepted') }}">Accept</a></td>
                                <td><a class="btn btn-danger" href="{{ url('money-requests/' . $request->id . '/Rejected') }}">Reject</a></td>
                            </tr>
                            <p hidden>{{$counter++}}</p>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <br>
                <div class="d-flex justify-content-center">{{$requests->links()}}</div>
            </div>
        </div>
    </div>
@endsection
