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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

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

    // SEND ATTACHMENT IN FORM
    // var form = new FormData();
    // form.append("driver", "web");
    // form.append("attachment", "file");
    // form.append("file", "");

    // var settings = {
    // "url": "http://127.0.0.1:8000/",
    // "method": "POST",
    // "timeout": 0,
    // "processData": false,
    // "mimeType": "multipart/form-data",
    // "contentType": false,
    // "data": form
    // };

    // $.ajax(settings).done(function (response) {
    // console.log(response);
    // });

    // TYPING ANIMATION
    // setInterval(function () {
    //     var msg = document.querySelector('ol.chat li:last-child');
    //     if(msg) {
    //         if(msg.className  === 'visitor') {

    //             var node_li = document.createElement('li');
    //             node_li.className = 'indicator';

    //             var node_div = document.createElement('div');
    //             node_div.className = 'loading-dots';

    //             var node_span1 = document.createElement('span');
    //             var node_span2 = document.createElement('span');
    //             var node_span3 = document.createElement('span');
    //             node_span1.className = 'dot';
    //             node_span2.className = 'dot';
    //             node_span3.className = 'dot';

    //             node_div.appendChild(node_span1);
    //             node_div.appendChild(node_span2);
    //             node_div.appendChild(node_span3);
    //             node_li.appendChild(node_div);

    //             document.querySelector('ol.chat').appendChild(node_li);

    //         } else {
    //             var isbot = document.querySelector('ol.chat li:nth-last-child(2)');
    //             if(msg.className  === 'indicator' && isbot.className === 'chatbot') {
    //                 document.querySelector('ol.chat li .loading-dots').parentNode.remove();
    //             }

    //         }

    //     }
    // }, 10);
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>