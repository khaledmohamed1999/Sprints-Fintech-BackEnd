<!-- Topbar Start
<div class="container-fluid">
  <div
    class="row align-content-lg-between bg-light py-2 px-xl-5 d-none d-lg-flex"
  >
    <div class="col-lg-4">
      <a href="" class="text-decoration-none">
        <span class="h1 text-uppercase text-primary bg-dark px-2">Fin</span>
        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1"
          >tech</span
        >
      </a>
    </div>
    <div class="col-lg-4 col-6"></div>
    <div class="col-lg-4 col-6 text-right">
      <p class="m-0">Customer Service</p>
      <h5 class="m-0">+012 345 6789</h5>
    </div>
  </div>
</div>
 Topbar End -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShop</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />
    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ url('lib/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ url('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-4">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-dark py-3 py-lg-0 px-0">
                    <button type="button"class="navbar-toggler"data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="col-lg-5">
                            <a href="" class="text-decoration-none">
                                <span class="h1 text-uppercase text-primary bg-dark px-2">Fin</span>
                                <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">tech</span>
                            </a>
                        </div>
                        <div class="navbar-nav mr-auto py-0  ">
                            <a href="{{ url('/') }}"
                                class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                            <a href="{{ url('/wallet') }}"
                                class="nav-item nav-link {{ request()->segment(1) == 'wallet' ? 'active' : '' }}">Wallet</a>
                            <div class="nav-item dropdown">
                                <a href=""class="nav-link dropdown-toggle"data-toggle="dropdown">Services <i
                                        class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="{{ url('/send-money') }}"
                                        class="dropdown-item {{ request()->segment(1) == 'send-money' ? 'active' : '' }}">Send
                                        Money</a>
                                    <a href="{{ url('/request-money') }}"
                                        class="dropdown-item {{ request()->segment(1) == 'request-money' ? 'active' : '' }}">Request
                                        Money</a>
                                    <a href="{{ url('/money-requests') }}"
                                        class="dropdown-item {{ request()->segment(1) == 'money-requests' ? 'active' : '' }}">See
                                        Requests</a>
                                    <a href="{{ url('/pay-online') }}"
                                        class="dropdown-item {{ request()->segment(1) == 'pay-online' ? 'active' : '' }}">Pay
                                        Online</a>
                                </div>
                            </div>
                            <a href="{{ url('/contact-us') }}"
                                class="nav-item nav-link {{ request()->segment(1) == 'contact-us' ? 'active' : '' }}">Contact</a>

                            <a href="{{ url('/about-us') }}"
                                class="nav-item nav-link {{ request()->segment(1) == 'about-us' ? 'active' : '' }}">About</a>
                            <div style="padding-left: 250px;">
                                @guest
                                    <div class="nav-item dropdown ">
                                        <a href=""class="nav-link dropdown-toggle "data-toggle="dropdown">Login <i
                                                class="fa fa-angle-down mt-1"></i></a>
                                        <div class="dropdown-menu bg-primary rounded-0 border-0 m-0 ">
                                            <a href="/login" class="dropdown-item">Login</a>
                                            <a href="/register" class="dropdown-item">Register</a>
                                        </div>
                                    </div>
                                @endguest

                                @auth
                                    <div class="nav-item dropdown ">
                                        <a href=""class="nav-link dropdown-toggle "data-toggle="dropdown">Hello
                                            {{ auth()->user()->name }} <i class="fa fa-angle-down mt-1"></i></a>
                                        <div class="dropdown-menu bg-primary rounded-0 border-0 m-0 ">
                                            @if (auth()->user()->is_admin == 1)
                                                <a href="/admin" class="dropdown-item">Admin Dashboard</a>
                                            @endif
                                            <a href="#" class="dropdown-item">My Profile</a>
                                            <form method="POST" action="{{ url('/logout') }}">
                                                @csrf
                                                <a class="dropdown-item" href="{{ url('/logout') }}"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">Log
                                                    Out</a>
                                            </form>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>

                    <div class="navbar-nav  py-0 d-none d-lg-block">
                        <a href="" class="btn px-0 ml-3"><i
                                class="fa-brands fa-facebook text-primary"></i></a>
                        <a href="" class="btn px-0 ml-3"><i class="fa-brands fa-twitter text-primary"></i></a>
                        <a href="" class="btn px-0 ml-3"><i
                                class="fa-brands fa-instagram text-primary"></i></a>
                        <a href="" class="btn px-0 ml-3"><i
                                class="fa-brands fa-telegram text-primary"></i></a>
                        <a href="" class="btn px-0 ml-3"><i
                                class="fa-brands fa-whatsapp text-primary"></i></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">
                    No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et
                    et dolor sed dolor. Rebum tempor no vero est magna amet no
                </p>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street,
                    New York, USA
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope text-primary mr-3"></i>info@example.com
                </p>
                <p class="mb-0">
                    <i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890
                </p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick nav</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href=""><i
                                    class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="cart"><i
                                    class="fa fa-angle-right mr-2"></i>Pay-Online</a>
                            <a class="text-secondary mb-2" href="about"><i class="fa fa-angle-right mr-2"></i>About
                                us</a>
                            <a class="text-secondary" href="contact"><i class="fa fa-angle-right mr-2"></i>Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Wallet</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href=""><i
                                    class="fa fa-angle-right mr-2"></i>Wallet</a>
                            <a class="text-secondary mb-2" href="shop"><i class="fa fa-angle-right mr-2"></i>My
                                Transactions</a>
                            <a class="text-secondary mb-2" href="shop"><i
                                    class="fa fa-angle-right mr-2"></i>Request-money</a>
                            <a class="text-secondary mb-2" href="detail"><i
                                    class="fa fa-angle-right mr-2"></i>Send-money</a>
                            <a class="text-secondary mb-2" href="detail"><i
                                    class="fa fa-angle-right mr-2"></i>Generate
                                Card</a>

                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, 0.1) !important">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights
                    Reserved. Designed by
                    <a class="text-primary" href="">Team 4</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src={{ url('img/payments.png') }} alt="" />
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript">
    </script>
    <script src="{{ url('lib/easing/easing.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('lib/owlcarousel/owl.carousel.min.js') }}" type="text/javascript"></script>

    <!-- Template Javascript -->
    <script src="{{ url('js/main.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/home.js') }}" type="text/javascript"></script>
</body>

</html>
