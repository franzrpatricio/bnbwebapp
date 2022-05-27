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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>


    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/client.css') }}" rel="stylesheet">

    <!-- Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="slidein.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
</head>
<body>
    <div id="app">
        @include('layouts.inc.client-navbar')
        <main>
            @yield('content')
        </main>
        <div class="text-center">
            <button
                type="button"
                class="btn btn-primary btn-floating btn-lg"
                id="btn-back-to-top"
            >
            <i class="fa fa-caret-up"></i>
        </button>
        </div>
        @include('layouts.inc.client-footer')
    </div>
</body>
</html>
<!-- Scripts -->
<script src="{{ asset('assets/js/jquery-3.6.0.min') }}" defer></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{asset('assets/js/scrollbtn.js')}}" defer></script>

<!-- Bootstrap -->
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
<script>
    var botmanWidget = { 
        frameEndpoint: '/botman/chat',
        dateTimeFormat: 'm/d/yy HH:MM',
        title:'🤖 BnBot',
        introMessage: 'Hi, I am the official chat bot of Bana and Bana Architects!✋<br><br>Type MENU. So that I can give you the commands I know!',
        placeholderText:'Type something here...',
        aboutText: '©️ Bana and Bana Architects 2022',
        displayMessageTime:'true',
        // desktopHeight: '600',
        desktopWidth: '380',
        mobileHeight: '100%',
        mobileWidth: '100%',
        bubbleAvatarUrl: '{{asset('assets/images/avatar.png')}}',
        mainColor: '#368BC1'
    };
</script>
<script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

<script>
    function videoslider(links){
        document.querySelector(".slider").src = links;
    }
</script>
<script>
    var ready = true;
    
    // set interval
    setInterval(setready, 1000);
    function setready() {
      ready = true;
    }
    
    $(document).on('DOMNodeInserted', "#messageArea", function() {
      if(ready == true)
      {
      setTimeout(replacelink, 200);
      ready = false;
      }
    });
    
    function replacelink() {
      $('#messageArea .btn').each(function(){
          text = $(this).html();
          link = text.match(/(Link:)\s(\/[^<]*)/g);
          if(link)
          {
            $(this).html(' ');
            url = link.toString().substring(5);
            text = text.match(/(.*)(Link:)/g).toString().substring(0,5);
            $(this).empty();
            $(this).html('<a href="' + url + '">' + text + '</a>');
            $(this).addClass('linked');
          }
          else
          {
            $(this).addClass('linked');
          }
      });
    }
    
    </script>