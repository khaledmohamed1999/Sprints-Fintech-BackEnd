@extends('layouts.mainSite')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{url('img/1.jpg')}}" alt="Image" />
                        </div>

                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{url('img/3.jpg')}}" alt="Image" />
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>Story</h3>
                    <p class="mb-4">
                        Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam
                        stet sit clita ea. Sanc ipsum et, labore clita lorem magna duo dolor
                        no sea Nonumy
                        Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam
                        stet sit clita ea. Sanc ipsum et, labore clita lorem magna duo dolor
                        no sea Nonumy
                        Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam
                        stet sit clita ea. Sanc ipsum et, labore clita lorem magna duo dolor
                        no sea Nonumy
                        Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam
                        stet sit clita ea. Sanc ipsum et, labore clita lorem magna duo dolor
                        no sea Nonumy
                    </p>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="bg-light p-30">
                        <div class="nav nav-tabs mb-4">
                            <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Vision</a>
                            <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Mission</a>
                            <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Values</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <p>
                                    Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea.
                                    Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero
                                    diam ea vero et dolore rebum, dolor rebum eirmod consetetur
                                    invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum
                                    rebum diam. Dolore diam stet rebum sed tempor kasd eirmod.
                                    Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam
                                    consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod
                                    nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit
                                    rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus
                                    eirmod takimata dolor ea invidunt.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-2">
                                <h4 class="mb-3">Our Mission</h4>
                                <p>
                                    Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea.
                                    Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero
                                    diam ea vero et dolore rebum, dolor rebum eirmod consetetur
                                    invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum
                                    rebum diam. Dolore diam stet rebum sed tempor kasd eirmod.
                                    Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam
                                    consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod
                                    nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit
                                    rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus
                                    eirmod takimata dolor ea invidunt.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-3">
                                <h4 class="mb-3">Our Values</h4>
                                <p>
                                    Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea.
                                    Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero
                                    diam ea vero et dolore rebum, dolor rebum eirmod consetetur
                                    invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum
                                    rebum diam. Dolore diam stet rebum sed tempor kasd eirmod.
                                    Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam
                                    consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod
                                    nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit
                                    rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus
                                    eirmod takimata dolor ea invidunt.
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0">
                                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Takimata ea clita labore amet ipsum erat justo voluptua.
                                                Nonumy.
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0">
                                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                            </li>
                                            <li class="list-group-item px-0">
                                                Takimata ea clita labore amet ipsum erat justo voluptua.
                                                Nonumy.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
