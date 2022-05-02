<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        @include('layouts.inc.client-navbar')
        <main class="py-4">
            @yield('content')
        </main>
        <div class="links">
            <a href="#" onclick="botmanChatWidget.open()">Open BnBot</a>
            <a href="#" onclick="botmanChatWidget.close()">Close BnBot</a>
        </div>
    </div>
</body>
</html>
<!-- Scripts -->
<script src="{{ asset('assets/js/jquery-3.6.0.min') }}" defer></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>

<script>
    var botmanWidget = {
        frameEndpoint: '/botman/chat',
        dateTimeFormat: 'm/d/yy HH:MM',
        title:'BnBot 🤖',
        introMessage: 'Hi, I am the official chat bot of Bana and Bana Architects!✋',
        placeholderText:'Type something here...',
        // mainColor:'#408590',
        // bubbleBackground:'',
        // bubbleAvatarUrl: '/assets/images/kay0.png',
        // aboutLink:'https://botman.io',
        aboutText: '©️ Bana and Bana Architects 2022',
        displayMessageTime:'true',
        // desktopWidth:'370',
        // mobileHeight:'100%',
        // mobileWidth:'300',
        // videoHeight:'160',
    };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>