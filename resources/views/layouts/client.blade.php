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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/client.css') }}" rel="stylesheet">

    <!-- Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="slidein.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Carousel -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    
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
<script>
         $(document).ready(function(){
	 
   //carousel-control
   
   $("#myCarousel").mouseover(function(){
     $("#myCarousel .carousel-control").show();
   });

   $("#myCarousel").mouseleave(function(){
     $("#myCarousel .carousel-control").hide();
   });
   
   //active thumbnail
   
   $("#thumbCarousel .thumb").on("click", function(){
     $(this).addClass("active");
     $(this).siblings().removeClass("active");
   
   });
   
   //carousel slides
   
   $('#myCarousel').on('slid.bs.carousel', function(){
      var index = $('.carousel-inner .item.active').index();
      //console.log(index);
      var thumbnailActive = $('#thumbCarousel .thumb[data-slide-to="'+index+'"]');
      thumbnailActive.addClass('active');
      $(thumbnailActive).siblings().removeClass("active");
      //console.log($(thumbnailActive).siblings()); 
   });
  });
       </script>
