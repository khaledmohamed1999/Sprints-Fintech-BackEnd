@extends('layouts.mainSite')
@section('content')
<div class="container-fluid">
    <div class="row px-xl-5">
      <div class="col-12">
        <nav class="breadcrumb bg-light mb-30">
          <a class="breadcrumb-item text-dark" href="send-money">Send Money</a>
          <a class="breadcrumb-item text-dark" href="request-money"
            >Request Money</a
          >
          <a class="breadcrumb-item text-dark" href="money-requests">See Requests</a>
          <a class="breadcrumb-item text-dark" href="pay-online">Pay Online</a>
        </nav>
      </div>
    </div>
  </div>
  
  <div class="container-fluid">
    <div class="ml-5 inline col-lg-6">
      <h3 style="color: darkgreen">Pay Your Bills</h3>
      <div class="bg-light p-30 mb-5">
        <form class="form-group">
          <label style="color: darkgreen;" for="billnumber">Bill Reference Number:</label>
          <input class="form-control" type="number" id="billnumber" name="billnumber" /><br />
          <div class="pt-2">
            <button class="btn btn-primary font-weight-bold py-2">Get Bill Info</button>
          </div>
        </form>
  
        <h6 style="color: green;">Amount To Pay Is 200 EGP!</h6>
        <br>
        <div class="pt-2">
          <button class="btn btn-primary font-weight-bold py-2">Pay Bills</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection