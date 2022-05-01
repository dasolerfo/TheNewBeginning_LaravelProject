<!DOCTYPE html>
<html >

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
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html">
                <!--<img src="{{ asset('img/logo@3x.png') }}" height="31" alt="logo" />-->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
            <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <div class="d-flex ms-lg-4"> <a class="btn btn-warning"
                            href="{{ route('index') }}">{{ __('msg.torna') }}</a></div>

                    <div class="d-flex ms-lg-4"> <a class="btn btn-warning"
                            href="{{ route('logout') }}">{{ __('msg.surt') }}</a></div>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="http://127.0.0.1:8000/admin">EN</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="http://127.0.0.1:8000/admin">CAT</a></li>
                    </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="mb-0 fw-medium text-secondary">{{ __('msg.usuaris') }}</h2>
        <table class="table table-bordered">
            <thead>
                <tr class="text-secondary">
                    <th>{{ __('msg.nom') }}</th>
                    <th>{{ __('msg.correu') }}</th>
                    <th>{{ __('msg.pais') }}</th>
                    <th>{{ __('msg.detalls') }}</th>
                    <th>{{ __('msg.elimina') }}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr class="text-secondary">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->pais }}</td>
                        <td><a onclick='openForm()' class="btn btn-warning">{{ __('msg.ensenyarDetalls')}}</a></td>
                        {{-- <td><a href="{{ route('cities.edit',$city->ID) }}"><button>Edit</button></a></td> --}}
                        <form action="{{ route('delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td><button type="submit" class="btn btn-danger">{{ __('msg.elimina') }}</button></td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="form-popup" id="myForm">
        <form action="" method="POST" id="footer-form" class="form-container">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="">
                    <input type="text" class="form-control" name="email" id="emailForm"
                        >
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

    <script>
        function openForm(user) {
            document.getElementById("myForm").style.display = "block";

        }


        function closeForm() {
            document.getElementById("myForm").style.display = "none";
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
