@extends('layouts.mainSite')
@section('content')
    <div class="container-fluid mb-3">
        <div class="">
            <div class="">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel"
                    style="margin: 0% 5% ;">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px">
                            <img class="position-absolute w-100 h-100" src="{{ url('img/wwww.jpg') }}"
                                style="object-fit: fill" />
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                        World-Wide
                                    </h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                        Send & recieve Money From and to anywhere in the world
                                        instantly
                                    </p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px">
                            <img class="position-absolute w-100 h-100" src="{{ url('img/sending_money1.jpg') }}"
                                style="object-fit: cover" />
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                        Recieve Money
                                    </h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                        Lorem rebum magna amet lorem magna erat diam stet. Sadips duo
                                        stet amet amet ndiam elitr ipsum diam
                                    </p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px">
                            <img class="position-absolute w-100 h-100" src="{{ url('img/send_money2.jpg') }}"
                                style="object-fit: fill" />
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                        Pay
                                    </h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                        Lorem rebum magna amet lorem magna erat diam stet. Sadips duo
                                        stet amet amet ndiam elitr ipsum diam
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Services</span>
        </h2>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="{{ url('/send-money') }}">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden block" style="width: 100px; height: 100px">
                            <img class="img-fluid" src="{{ url('img/send.png') }}" alt="" />
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Send Money</h6>
                            <small class="text-body"></small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="{{ url('/send-money') }}">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden block" style="width: 100px; height: 100px">
                            <img class="img-fluid" src="{{ url('img/recieve.png') }}" alt="" />
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Request Money</h6>
                            <small class="text-body"></small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="{{ url('/send-money') }}">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden block" style="width: 100px; height: 100px">
                            <img class="img-fluid" src="{{ url('img/pay.png') }}" alt="" />
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Pay Online</h6>
                            <small class="text-body"></small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            @foreach ($vendors as $vendor)
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="{{ url('storage/vendors/'.$vendor->image_url) }}" alt="" />
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
