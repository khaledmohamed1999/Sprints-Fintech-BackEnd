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
        <a class="btn btn-info ml-5" href="wallet">Go Back To Wallet</a> 
        <br>
        <br>

        <div class="ml-5 inline col-lg-6">
            <h3 style="color: darkgreen">Link Your Bank Card</h3>
            <div class="bg-light p-30 mb-5">
                <form class="form-group">
                    <label for="cardnumber">Card Number:</label><br />
                    <input class="form-control" type="number" id="cardnumber" name="cardnumber" /><br />

                    <label for="cardname">Card Holder Name:</label><br />
                    <input class="form-control" type="text" id="cardname" name="cardname" /><br />

                    <label for="cvv">Card CVV</label><br />
                    <input class="form-control" type="text" id="cvv" name="cvv" /><br />

                    <label for="cvv">Card CVV</label><br />
                    <input class="form-control" type="text" id="cvv" name="cvv" /><br />

                    <label for="cardyear">Card Expiry Date (MM/YYYY)</label><br />
                    <input class="form-control" type="text" id="cardyear" name="cardyear" /><br />

                    <div class="pt-2">
                        <button class="btn btn-primary font-weight-bold py-2">Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
