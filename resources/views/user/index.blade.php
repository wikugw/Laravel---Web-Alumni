<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ikatan Alumni Santri Al Binaa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('user/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/css/animate.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('user/css/aos.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('user/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('user/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/css/style.css') }}">
</head>

<body>

    <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}"><img
                    src="{{ URL::asset('user/images/ilumina black.png') }}" style="height: 50px" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a style="color: black" href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item"><a style="color: black" href="{{ route('cerita') }}"
                            class="nav-link">Cerita</a></li>
                    <li class="nav-item"><a style="color: black" href="{{ route('alumni') }}"
                            class="nav-link">Alumni</a></li>
                    @if (Auth::user())
                    <li class="nav-item"><a style="color: black"
                            href="{{ Auth::user()->isAdmin ? route('users.index') : route('userdetails.show', Auth::user()->id) }}"
                            class="nav-link">{{  Auth::user()->name  }}</a></li>
                    @else
                    <li class="nav-item"><a style="color: black" href="{{  route('login') }}" class="nav-link"> Login'
                        </a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <div align="center" class="mb-2">
                            <a href="{{ route('home') }}">
                                <img src="{{ URL::asset('user/images/logo-bawah.jpeg') }}" alt="" height="100px"
                                    width="100px">
                            </a>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">latest News</h2>
                        <div class="block-21 mb-4 d-flex">
                            <a class="img mr-4 rounded" style="background-image: url(images/image_1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a>
                                </h3>
                                <div class="meta">
                                    <div><a href="#"></span> Oct. 16, 2019</a></div>
                                    <div><a href="#"></span> Admin</a></div>
                                    <div><a href="#"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="img mr-4 rounded" style="background-image: url(images/image_2.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a>
                                </h3>
                                <div class="meta">
                                    <div><a href="#"></span> Oct. 16, 2019</a></div>
                                    <div><a href="#"></span> Admin</a></div>
                                    <div><a href="#"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Information</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-1 d-block"><span
                                        class="ion-ios-arrow-forward mr-3"></span>Home</a></li>
                            <li><a href="#" class="py-1 d-block"><span
                                        class="ion-ios-arrow-forward mr-3"></span>About</a></li>
                            <li><a href="#" class="py-1 d-block"><span
                                        class="ion-ios-arrow-forward mr-3"></span>Articles</a></li>
                            <li><a href="#" class="py-1 d-block"><span
                                        class="ion-ios-arrow-forward mr-3"></span>Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
                                        View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
                                            210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());

                        </script> All rights reserved | This template is made with <i class="icon-heart color-danger"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>


    <script src="{{ URL::asset('user/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ URL::asset('user/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/aos.js') }}"></script>
    <script src="{{ URL::asset('user/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ URL::asset('user/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{ URL::asset('user/js/google-map.js') }}"></script>
    <script src="{{ URL::asset('user/js/main.js') }}"></script>

</body>

</html>
