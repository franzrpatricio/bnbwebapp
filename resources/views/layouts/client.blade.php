<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">
    <meta name="author" content="BNB">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/client.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/stylez.css') }}" rel="stylesheet"> --}}

    <!-- Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="slidein.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Carousel -->


    
</head>
<body>
    <div id="app">
        @include('layouts.inc.client-navbar')
        <main>
            @yield('content')
        </main>
        @include('layouts.inc.client-footer')
    </div>
</body>
</html>
<!-- Scripts -->
<script src="{{ asset('assets/js/jquery-3.6.0.min') }}" defer></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>

<!-- Bootstrap -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

<script>
    var botmanWidget = { 
        frameEndpoint: '/botman/chat',
        dateTimeFormat: 'm/d/yy HH:MM',
        title:'BnBot 🤖',
        introMessage: 'Hi, I am the official chat bot of Bana and Bana Architects!✋<br><br>Type anything! So that I can give you the commands I know!',
        placeholderText:'Type something here...',
        aboutText: '©️ Bana and Bana Architects 2022',
        displayMessageTime:'true',
        desktopHeight: '600',
        mobileHeight: '100%',
        mobileWidth: '300',
    };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

<script>

        function videoslider(links){
            document.querySelector(".slider").src = links;
        }

    </script>
