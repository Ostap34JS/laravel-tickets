<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!--<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap@next/dist/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"/>-->
    <link href="https://fonts.googleapis.com/css?family=Rancho&effect=anaglyph" rel="stylesheet">
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
</head>
<body>
    <div id="app">
        

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand font-effect-anaglyph	" href="/">Mytickets<!--{{ config('app.name', 'Laravel') }}--></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link active" href="/">Головна <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="/">Знайти квитки</a>
                </div>
                <div class="my-2 my-lg-0">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Мова 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Укр</a>
                            <a class="dropdown-item" href="#">Анг</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/zepto.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-native-v4.min.js') }}"></script>
</body>
</html>
