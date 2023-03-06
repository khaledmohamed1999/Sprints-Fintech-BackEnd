@extends('layouts.mainSite')
@section('content')
<link rel="stylesheet" href="{{url('css/wallet/wallet.css')}}">
<div class="container-fluid">
    <div class="row px-xl-5">
      <div class="col-12">
        <nav class="breadcrumb bg-light mb-30">
          <a class="breadcrumb-item text-dark" href="send-money">Send Money</a>
          <a class="breadcrumb-item text-dark" href="request-money">Request Money</a>
          <a class="breadcrumb-item text-dark" href="pay-online">Pay Online</a>
        </nav>
      </div>
    </div>
  </div>
  
  <div class="container-fluid">
    <div class="ml-5 inline col-lg-6">
      <h5 style="color: darkgreen;" class=" bg-secondary  section-title position-relative text-uppercase mb-3">Wallet Balance</h5>
      <div  class="bg-light p-30 mb-5">
      <img style="display: inline-block;" src="{{url('img/balance.jfif')}}" alt="">
        <div style="display: inline-block;" class="border-bottom">
          <div  class="d-flex justify-content-between mb-3">
            <h5>Balance: 3000 EGP</h5>
          </div>
        </div>
        <div class="pt-2">
          <a href='{{URL::current() . "/manage-funds"}}' class="btn btn-block btn-primary font-weight-bold py-3">
            Manage Funds
          </a>
        </div>
      </div>
    </div>
        <div class="col-lg-10 table-responsive mb-5">
          <h3 style="color: darkgreen;">Transaction History</h3>
          <table
            class="table table-light table-borderless table-hover text-center mb-0"
          >
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
            <tbody class="align-middle" id="products">
              <tr>
                <td class="align-middle">1</td>
                <td class="align-middle"> 12/03/2020 </td>
                <td class="align-middle">Samir</td>
                <td class="align-middle">You</td>
                <td class="align-middle">100 EGP</td>
                <td class="align-middle">Success</td>
              </tr>
              <tr>
                <td class="align-middle">
                  2
                </td>
                <td class="align-middle"> 12/03/2020 </td>
                <td class="align-middle">Emad</td>
                <td class="align-middle">You</td>
                <td class="align-middle">200 EGP</td>
                <td class="align-middle">Success</td>
              </tr>
              <tr>
                <td class="align-middle">
                  3
                </td>
                <td class="align-middle"> 12/03/2020 </td>
                <td class="align-middle">You</td>
                <td class="align-middle">Ahmed</td>
                <td class="align-middle">150 EGP</td>
                <td class="align-middle">Fail</td>
              </tr>
              <tr>
                <td class="align-middle">
                  4
                </td>
                <td class="align-middle"> 12/03/2020 </td>
                <td class="align-middle">Ahmed</td>
                <td class="align-middle">You</td>
                <td class="align-middle">100 EGP</td>
                <td class="align-middle">Fail</td>
              </tr>
              <tr>
                <td class="align-middle">
                  5
                </td>
                <td class="align-middle"> 12/03/2020 </td>
                <td class="align-middle">You</td>
                <td class="align-middle">Ahmed</td>
                <td class="align-middle">300 EGP</td>
                <td class="align-middle">Fail</td>
              </tr>
            </tbody>
          </table>
        </div>
        
    </div>
    
@endsection