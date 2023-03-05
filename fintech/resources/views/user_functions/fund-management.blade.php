@extends('layouts.mainSite')
@section('content')
    <div class="container-fluid">
        <div class="ml-5 inline col-lg-6">
            <h3 style="color: darkgreen">Withdraw Money</h3>
            <div class="bg-light p-30 mb-5">
                <form class="form-group">
                    <label style="color: darkgreen;" for="amount">Amount To Withdraw:</label><br />
                    <input class="form-control" type="number" id="amount" name="amount" /><br />

                    <div class="pt-2">
                        <button class="btn btn-primary font-weight-bold py-2">Withdraw</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>

    <div class="container-fluid">
        <div class="ml-5 inline col-lg-6">
            <h3 style="color: darkgreen">Deposit Money</h3>
            <div class="bg-light p-30 mb-5">
                <form class="form-group">
                    <label style="color: darkgreen;" for="amount">Amount To Deposit:</label><br />
                    <input disabled class="form-control" type="number" id="amount" name="amount" /><br />

                    <div class="pt-2">
                        <button disabled class="btn btn-primary font-weight-bold py-2">Deposit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
