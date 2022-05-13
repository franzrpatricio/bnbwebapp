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

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/stylez.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
{{-- <body style="background-image: url('{{asset('assets/client/view.jpg')}}')" style="background-repeat:no-repeat" style="background-size: 100%"> --}}
<body>
    <div id="app">
        @include('layouts.inc.client-navbar')
        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.inc.staff-footer')
        {{-- @include('layouts.newsletter') --}}
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
        introMessage: 'Hi, I am the official chat bot of Bana and Bana Architects!✋',
        placeholderText:'Type something here...',
        aboutText: '©️ Bana and Bana Architects 2022',
        displayMessageTime:'true',
    };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

<script>
    /* Open when someone clicks on the span element */
    function openNav() {
    document.getElementById("myNav").style.width = "100%";
    }

    /* Close when someone clicks on the "x" symbol inside the overlay */
    function closeNav() {
    document.getElementById("myNav").style.width = "0%";
    }
</script>