@extends('layouts.mainSite')
@section('content')
    <div class="container-fluid">
        <a class="btn btn-info ml-5" href="/wallet">Go Back To Wallet</a> 
        <br>
        <br>
        <div class="ml-5 inline col-lg-6">
            <h3 style="color: darkgreen">Virtual Debit Card</h3>
            <div class="bg-light p-30 mb-5">
                <table class="table">
                    <tr>
                        <td>Cardholder Name :</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Card Number :</td>
                        <td>{{$card['card_number']}}</td>
                    </tr>
                    <tr>
                        <td>Expiry Date :</td>
                        <td>{{$card['expiry_date']}}</td>
                    </tr>
                    <tr>
                        <td>CVV :</td>
                        <td>{{$card['cvv']}}</td>
                    </tr>
                </table>
                    <div class="pt-2">
                        <form action=" {{ url('wallet/virtual/delete-card/' . $card->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger block"
                                onclick="return confirm('Are you sure ?');">
                                <h6 class=""></h6>
                                Delete</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>

    <hr>
@endsection