@extends('layouts.mainSite')
@section('content')

    <head>
        <style>
            label {
                color: darkgreen
            }
        </style>
    </head>

    <div class="container-fluid">
        <a class="btn btn-info ml-5" href="/wallet">Go Back To Wallet</a> 
        <br>
        <br>

        <div class="ml-5 inline col-lg-6">
            <h3 style="color: darkgreen">Link Your Bank Card</h3>
            @if (session()->has('messageError'))
                <div class="alert alert-danger"> {{ session()->get('messageError')}} </div>
            @endif
            <div class="bg-light p-30 mb-5">
                <form method="POST" action="{{url(URL::current() . '/link')}}" enctype="multipart/form-data" class="form-group">
                  @csrf
                    <label for="number">Card Number:</label><br />
                    <input class="form-control" type="text" id="number" name="number" /><br />
                    @error('number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="name">Card Holder Name:</label><br />
                    <input class="form-control" type="text" id="name" name="name" /><br />
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="cvv">Card CVV</label><br />
                    <input class="form-control" type="text" id="cvv" name="cvv" /><br />
                    @error('cvv')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="expiry">Card Expiry Date</label><br />
                    <input class="form-control" type="month" id="expiry" name="expiry" /><br />
                    @error('expiry')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="pt-2">
                        <button class="btn btn-primary font-weight-bold py-2">Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
