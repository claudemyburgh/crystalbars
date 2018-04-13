<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="{{ $errors->all() ? ' has__modal' : '' }}">
    @include('layouts.partials._loader')
    <div id="app">
        @include('layouts.partials._quote')
        <div class="top-details">
            <div class="wrapper">
                <div class="row">
                    <small class="col text-align-right"><a style="display: inline-block;" href="tel:0727554303">&#9742; 072 755 4303</a> &nbsp; <a style="display: inline-block;" href="mailto:info@crystalbars.co.za">&#9993; info@crystalbars.co.za</a></small>
                    
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="row">
                <div class="xs-col-8 md-col-4">
                    <a href="{{ url('/') }}">
                        <img id="logo" src="{{ asset('/img/logo.jpg') }}" alt="{{ config('app.name') }} logo">
                    </a>
                </div>
                <div class="md-col-8 clearfix">
                    <a href="#" class="menu__mobile"><l class="lunacon lunacon-navicon"></l> MENU</a>
                    <ul class="menu">
                        <li class="{{ return_if(on_page('/' ), 'active') }}"><a href="{{ url('/') }}">HOME</a></li>
                        <li class="{{ return_if(on_page('categories*' ), 'active') }}"><a href="{{ route('categories') }}">PHOTOS</a></li>
                        <li class="{{ return_if(on_page('testimonials' ), 'active') }}"><a href="{{ route('testimonials') }}">TESTIMONIALS</a></li>
                        <li class="{{ return_if(on_page('contact-us' ), 'active') }}"><a href="{{ route('contact') }}">CONTACT US</a></li>
                        <li class="get_quote"><a id="modal-quote-trigger" href="#">GET QUOTE</a></li>
                    </ul>
                </div>
            </div>

            @if (session()->has('success') )

            <br>
            <div class="notify notify--success notify__dismissable"><p><strong>{{ session('success') }}</strong></p></div>

            @endif
            

            @yield('content')
                


        </div>
    </div>
    
    <footer class="footer">
        <div class="wrapper">
            <div class="row">
                <div class="md-col-6 text-align-center">
                    <h3>Web Services</h3>
                    <ul class="footer__list">
                        <li><a target="_blank" href="https://www.sendinblue.com/?ae=893">Sendinblue</a></li>
                        <li><a target="_blank" href="https://everhost.co.za">Everhost Web Hosting</a></li>
                    </ul>
                </div>
                <div class="md-col-6 text-align-center">
                    <h3>Legel Bits</h3>
                    <ul class="footer__list">
                        <li><a  href="{{ route('policy') }}">Terms and Conditions</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="dev">
            <div class="wrapper">
                <div class="row">
                    <div class="col text-align-center">
                        Designed &amp; Developed by <a target="_blank" href="http://designbycode.co.za">DesignByCode</a>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
