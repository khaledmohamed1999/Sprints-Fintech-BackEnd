@extends('layouts.mainSite')
@section('content')
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    @foreach ($vendors as $item)
                        <a href="{{ url('send-money-vendor/' . $item->id) }}">
                            <div class="bg-light p-4">
                                <img height="184" src="{{ url('storage/' . $item->image_url) }}" alt="" />
                                <h3 class="text-center" style="color: black">{{ $item->name }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row px-xl-5">

           
            <div class="col-lg-4 mt-5">
                <a class="text-decoration-none" href="/wallet/generate-card">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden block" style="width: 150px; height: 150px">
                            <img class="img-fluid" src="{{ url('img/debitCard.png') }}" alt="" />
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
