@extends('layouts.mainSite')
@section('content')
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

    <div class="container-fluid">
        <div class="ml-5 inline col-lg-6">
            <h3 style="color: darkgreen">Send Money</h3>
            @if (session()->has('messageError'))
                <div class="alert alert-danger"> {{ session()->get('messageError')}} </div>
            @endif
            @if (session()->has('messageSuc'))
                <div class="alert alert-success"> {{ session()->get('messageSuc')}} </div>
            @endif
            <div class="bg-light p-30 mb-5">
                <form method="POST" action="{{url(URL::current() . '/send-money-request')}}" enctype="multipart/form-data" class="form-group">
                    @csrf
                    <label style="color: darkgreen;" for="email">Account Email:</label><br />
                    <input class="form-control" type="text" id="email" name="email" /><br />
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label style="color: darkgreen;" for="amount">Amount To Send:</label><br />
                    <input class="form-control" type="number" min="0" id="amount" name="amount" /><br />
                    @error('amount')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="pt-2">
                        <button class="btn btn-primary font-weight-bold py-2">Send Money</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
