@extends('layouts.mainSite')
@section('content')
<div class="container-fluid py-5">
    <div class="row px-xl-5">
      <div class="col">
        <div class="owl-carousel vendor-carousel">
            @include('includes.pay-bills-items',['img'=>'img/we.jfif', 'name'=>"We Internet", 'url' => "/#"])
            @include('includes.pay-bills-items',['img'=>'img/etisalat.png', 'name'=>"Etisalat", 'url' =>  "/#"])
            @include('includes.pay-bills-items',['img'=>'img/vodafone.png', 'name'=>"Vodafone", 'url' =>  "/#"])
            @include('includes.pay-bills-items',['img'=>'img/orange.png', 'name'=>"Orange", 'url' =>  "/#"])
            @include('includes.pay-bills-items',['img'=>'img/btech.png', 'name'=>"B-Tech", 'url' =>  "/#"])
            @include('includes.pay-bills-items',['img'=>'img/elec.jfif', 'name'=>"Electricity Card", 'url' =>  "/#"])
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
      <div class="row px-xl-5">
  
      <div class="col-lg-8 ">
          <h2 style="color: black;">History</h2>
          <table class="table" border="1" >
              <thead style="color: white;background-color: darkblue;">
                  <th>name</th>
                  <th>date</th>
                  <th>amount</th>
                  <th>status</th>
              </thead> 
              <tr>
                  <td>We</td>
                  <td>21-0-2023</td>
                  <td>$150</td>
                  <td style="color: darkgreen;">success</td>
              </tr>
              <tr>
                  <td>orange</td>
                  <td>21-0-2023</td>
                  <td>$50</td>
                  <td style="color: darkgreen;">success</td>
              </tr>
          </table>
          <a href="" class="btn btn-primary" style="margin: 0% 40%;">View full History</a>
      </div>
      <div class="col-lg-4 mt-5">
          <a class="text-decoration-none" href="#">
              <div class="cat-item d-flex align-items-center mb-4">
                <div class="overflow-hidden block" style="width: 150px; height: 150px">
                  <img class="img-fluid" src="{{url('img/debitCard.png')}}" alt="" />
                </div>
                <div class="flex-fill pl-3">
                  <h6>Generate Virtual Debit Card</h6>
                  <small class="text-body"></small>
                </div>
              </div>
            </a>
      </div>
  
  
  </div>
  
@endsection