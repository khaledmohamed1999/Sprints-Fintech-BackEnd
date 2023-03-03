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
          <a class="breadcrumb-item text-dark" href="pay-online">Pay Online</a>
        </nav>
      </div>
    </div>
  </div>
  
  <div class="container-fluid">
    <div class="ml-5 inline col-lg-6">
      <h3 style="color: darkgreen">Request Money</h3>
      <div class="bg-light p-30 mb-5">
        <form class="form-group">
          <label style="color: darkgreen;" for="accnumber">Account Number:</label><br />
          <input class="form-control" type="number" id="accnumber" name="accnumber" /><br>
          <label style="color: darkgreen;" for="accname">Account Holder Name:</label><br />
          <input class="form-control" type="text" id="accname" name="accname" />
          <div class="pt-2">
            <button class="btn btn-primary font-weight-bold py-2">Check</button>
          </div>
        </form>
  
        <h6 style="color: red;">Account doesn't exist!</h6>
        <br>
  
        <form class="form-group">
          <label style="color: darkgreen;" for="amount">Amount You Need:</label><br />
          <input disabled class="form-control" type="number" id="amount" name="amount" /><br />
          <label style="color: darkgreen;" for="reason">Reason:</label><br />
          <input disabled class="form-control" type="text" id="reason" name="reason" /><br />
          <div class="pt-2">
            <button disabled class="btn btn-primary font-weight-bold py-2">Send Request</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
@endsection