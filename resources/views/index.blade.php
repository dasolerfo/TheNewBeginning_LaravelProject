<!DOCTYPE html>
<!--<html lang="en-US" dir="ltr">
!-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>TNB</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicons/favicon.png') }}">
    <link rel="manifest" href="{{ asset('img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" />

</head>

<body>
    <main class="main" id="top">

        <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand" href="index.html">
                    <!--<img src="{{ asset('img/logo@3x.png') }}" height="31" alt="logo" />-->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon">
                    </span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <p class="" aria-current="page">{{ Auth::user()->name }}</p>
                            </li>
                        @endauth
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="#feature" style="color: #fcbf49">{{ __('msg.joc') }}</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="#validation" style="color: #fcbf49">{{ __('msg.informacio') }}</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="#superhero" style="color: #fcbf49">{{ __('msg.trailer') }}</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="#marketing" style="color: #fcbf49">{{ __('msg.actualitzacions') }}</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                            href="{{ route('ranking') }}" style="color: #fcbf49">RANKING</a></li>
                    </ul>
                    @guest
                        <div class="d-flex ms-lg-4"><button class="btn btn-warning"
                                onclick="openFormSingUp()">{{ __('msg.login') }}</button></div>
                        <div class="d-flex ms-lg-4"><button class="btn btn-warning"
                                onclick="openFormRegist()">{{ __('msg.registra') }}</button></div>
                    @else
                        @if (Auth::user()->admin == 1)
                            <div class="d-flex ms-lg-4"> <a class="btn btn-warning" href="{{ route('admin') }}">Panel
                                    Control</a></div>
                        @else
                            <div class="d-flex ms-lg-4"> <a class="btn btn-warning" href="{{ route('user') }}">Perfil</a></div>
                        @endif
                        <div class="d-flex ms-lg-4"> <a class="btn btn-warning"
                                href="{{ route('logout.post') }}">{{ __('msg.surt') }}</a></div>
                    @endguest
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="/en" style="color: #fcbf49">EN</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="/cat" style="color: #fcbf49">CAT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="tancar" id="tancar" onclick="closeAll()"></div>

        <div class="form-popup" id="myForm">
            <form action="{{ route('login.post') }}" method="POST" id="footer-form" class="form-container">
                @csrf

                <div class="row">
                    <div class="">
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="{{ __('msg.correu') }} *">
                    </div>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <div class="">
                        <input type="password" class="form-control" name="password"
                            placeholder="{{ __('msg.contrasenya') }} *" id="password">
                        <br>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">{{ __('msg.login') }}</button>
                <button type="button" class="btn cancel" onclick="closeForm()">{{ __('msg.tanca') }}</button>
            </form>
        </div>

        <div class="form-popup" id="myFormRegist">
            <form action="{{ route('register.post') }}" method="POST" id="footer-form" class="form-container">
                @csrf
                <div class="row">
                    <div class="">
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="{{ __('msg.nom') }} *" required>
                    </div>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <div class="">
                        <input type="text" class="form-control" name="userName" id="userName"
                            placeholder="{{ __('msg.userName') }} *" required>
                    </div>
                </div>
                <div class="row">
                    <select class="form-select" name="pais" id="pais" required>
                        <option value="Andorra">Andorra</option>
                        <option value="Espanya">Espanya</option>
                        <option value="França">França</option>
                        <option value="Portugal">Portugal</option>
                    </select>
                </div>

                <div class="row">
                    <div class="">
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="{{ __('msg.correu') }} *">
                    </div>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <div class="">
                        <input type="password" class="form-control" name="password"
                            placeholder="{{ __('msg.contrasenya') }} *" id="password">
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="">
                        <input type="password" class="form-control" name="password_confirmation"
                            placeholder="{{ __('msg.contrasenya2') }}  *" id="password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('msg.registra') }}</button>
                <button type="button" class="btn cancel" onclick="closeFormRegist()">{{ __('msg.tanca') }}</button>
            </form>
        </div>
        @if (session('success'))
            <div class="alert alert-danger container" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!-- ===============================================-->
        <!--    Main Content-->
        <!-- ===============================================-->
        <section class="pt-7">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid"
                            src="{{ asset('img/logo@3x.png') }}" alt="" /></div>
                    <div class="col-md-6 text-md-start text-center py-6">
                        <h1 class="mb-4 fs-9 fw-bold">{{ __('msg.benimladris') }}</h1>
                        <p class="mb-6 lead text-secondary">{{ __('msg.f1') }}<br class="d-none d-xl-block" />
                        <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="#!"
                                role="button">{{ __('msg.descargar') }}</a><a
                                class="btn btn-link text-warning fw-medium" href="#!" role="button"
                                data-bs-toggle="modal" data-bs-target="#popupVideo"><span
                                    class="fas fa-play me-2"></span>Trailer </a></div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5 pt-md-9 mb-6" id="feature">

            <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block"
                style="background-image:url({{ asset('img/category/shape.png') }});opacity:.5;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <h1 class="fs-9 fw-bold mb-4 text-center"> {{ __('msg.f2') }} <br class="d-none d-xl-block" />
                    {{ __('msg.f3') }}</h1>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-2" style="margin-top: 4%;">
                        <h4 class="mb-3">{{ __('msg.f4') }}</h4>
                        <p class="mb-0 fw-medium text-secondary">{{ __('msg.f5') }}</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-2" style="margin-top: 4%;">
                        <h4 class="mb-3">{{ __('msg.f6') }}</h4>
                        <p class="mb-0 fw-medium text-secondary">{{ __('msg.f7') }}</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-2" style="margin-top: 4%;">
                        <h4 class="mb-3">{{ __('msg.f8') }}</h4>
                        <p class="mb-0 fw-medium text-secondary">{{ __('msg.f9') }}</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-2" style="margin-top: 4%;">
                        <h4 class="mb-3">{{ __('msg.f10') }}</h4>
                        <p class="mb-0 fw-medium text-secondary">{{ __('msg.f11') }}</p>
                    </div>
                </div>
                <div class="text-center"><a class="btn btn-warning" href="#!" role="button">{{ __('msg.f12') }}</a>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5" id="validation">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="text-secondary">Imladirs</h5>
                        <h2 class="mb-2 fs-7 fw-bold"></h2>
                        <p class="mb-4 fw-medium text-secondary">
                            {{ __('msg.f13') }}<br />{{ __('msg.f14') }}
                        </p>
                        <h4 class="fs-1 fw-bold">{{ __('msg.historia') }}</h4>
                        <p class="mb-4 fw-medium text-secondary">{{ __('msg.historia2') }}</p>

                    </div>
                    <div class="col-lg-6"><img class="img-fluid"
                            src="{{ asset('img/validation/validation.png') }}" alt="" /></div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5" id="manager">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6"><img class="img-fluid"
                            src="{{ asset('img/manager/manager.png') }}" alt="" /></div>
                    <div class="col-lg-6">
                        <h5 class="text-secondary">{{ __('msg.f15') }}</h5>
                        <p class="fs-7 fw-bold mb-2" style="color:#c0c0c0">{{ __('msg.f16') }}</p>
                        <p class="mb-4 fw-medium text-secondary">
                            {{ __('msg.f17') }}<br />
                        </p>
                        <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2"
                                src="{{ asset('img/manager/tick.png') }}" width="35" alt="tick" />
                            <p class="fw-medium mb-0 text-secondary">{{ __('msg.f19') }}</p>
                        </div>
                        <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2"
                                src="{{ asset('img/manager/tick.png') }}" width="35" alt="tick" />
                            <p class="fw-medium mb-0 text-secondary">{{ __('msg.f20') }} </p>
                        </div>
                        <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2"
                                src="{{ asset('img/manager/tick.png') }}" width="35" alt="tick" />
                            <p class="fw-medium mb-0 text-secondary">{{ __('msg.f21') }}</p>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5" id="marketer">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="text-secondary">Optimisation for</h5>
                        <p class="mb-2 fs-8 fw-bold" style="color:#c0c0c0">Marketers</p>
                        <p class="mb-4 fw-medium text-secondary">Few would argue that, despite the advancements
                            of<br />feminism over the past three decades, women still face a<br />double standard when
                            it comes to their behavior.</p>
                        <h4 class="fw-bold fs-1">Accessory makers</h4>
                        <p class="mb-4 fw-medium text-secondary">While most people enjoy casino gambling, sports
                            betting,<br />lottery and bingo playing for the fun</p>
                        <h4 class="fw-bold fs-1">Alterationists</h4>
                        <p class="mb-4 fw-medium text-secondary">If you are looking for a new way to promote your
                            business<br />that won't cost you money,</p>
                        <h4 class="fw-bold fs-1">Custom Design designers</h4>
                        <p class="mb-4 fw-medium text-secondary">If you are looking for a new way to promote your
                            business<br />that won't cost you more money,</p>
                    </div>
                    <div class="col-lg-6"><img class="img-fluid"
                            src="{{ asset('img/marketer/marketer.png') }}" alt="" /></div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-md-11 py-8" id="superhero">

            <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top"
                style="background-image:url({{ asset('img/superhero/oval.png') }};opacity:.5; background-position: top !important ;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h1 class="fw-bold mb-4 fs-7">Need a super hero?</h1>
                        <p class="mb-5 text-info fw-medium">Do you require some help for your project: Conception
                            workshop,<br />prototyping, marketing strategy, landing page, Ux/UI?</p>
                        <button class="btn btn-warning btn-md">Contact our expert</button>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-5" id="marketing">

            <div class="container">
                <h1 class="fw-bold fs-6 mb-3">Marketing Strategies</h1>
                <p class="mb-6 text-secondary">Join 40,000+ other marketers and get proven strategies on email
                    marketing</p>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card"><img class="card-img-top"
                                src="{{ asset('img/marketing/marketing01.png') }}" alt="" />
                            <div class="card-body ps-0">
                                <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1"
                                        href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                                <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card"><img class="card-img-top"
                                src="{{ asset('img/marketing/marketing02.png') }}" alt="" />
                            <div class="card-body ps-0">
                                <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1"
                                        href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                                <h3 class="fw-bold">Motivation Is The First Step To Success</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card"><img class="card-img-top"
                                src="{{ asset('img/marketing/marketing03.png') }}" alt="" />
                            <div class="card-body ps-0">
                                <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1"
                                        href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                                <h3 class="fw-bold">Success Steps For Your Personal Or Business Life</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pb-2 pb-lg-5">

            <div class="container">
                <div class="row border-top border-top-secondary pt-7">
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1"><img
                            class="mb-4" src="{{ asset('img/logo.svg') }}" width="184" alt="" /></div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2">
                        <p class="fs-2 mb-lg-4" style="color:#c0c0c0">Quick Links</p>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">About us</a></li>
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">Blog</a></li>
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">Contact</a></li>
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-4 order-md-4 order-lg-3">
                        <p class="fs-2 mb-lg-4" style="color:#c0c0c0">Legal stuff</p>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">Disclaimer</a></li>
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">Financing</a></li>
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">Privacy Policy</a></li>
                            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none"
                                    href="#!">Terms of Service</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0 order-2 order-md-2 order-lg-4">
                        <p class="fs-2 mb-lg-4" style="color:#c0c0c0">
                            knowing you're always on the best energy deal.</p>
                        <form class="mb-3">
                            <input class="form-control" type="email" placeholder="Enter your phone Number"
                                aria-label="phone" />
                        </form>
                        <button class="btn btn-warning fw-medium py-1">Sign up Now</button>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="text-center py-0">

            <div class="container">
                <div class="container border-top py-3">
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-auto mb-1 mb-md-0">
                            <p class="mb-0">&copy; 2022 Your Company Inc </p>
                        </div>
                        <div class="col-12 col-md-auto">
                            <p class="mb-0">
                                Made with<span class="fas fa-heart mx-1 text-danger"> </span>by <a
                                    class="text-decoration-none ms-1" href="https://themewagon.com/"
                                    target="_blank">ThemeWagon</a></p>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <iframe class="rounded" style="width:100%;height:500px;"
                    src="https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script>
        function openFormSingUp() {
            document.getElementById("myFormRegist").style.display = "none";
            document.getElementById("myForm").style.display = "block";
            document.getElementById("tancar").style.display = "block";
        }

        function openFormRegist() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("myFormRegist").style.display = "block";
            document.getElementById("tancar").style.display = "block";

        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("tancar").style.display = "none";

        }

        function closeFormRegist() {
            document.getElementById("myFormRegist").style.display = "none";
            document.getElementById("tancar").style.display = "none";
        }
        function closeAll(){
            document.getElementById("myForm").style.display = "none";
            document.getElementById("myFormRegist").style.display = "none";
            document.getElementById("tancar").style.display = "none";
        }
    </script>
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap"
        rel="stylesheet">

</body>

</html>
