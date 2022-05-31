<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

    {{-- MULTI-SELECT --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>

    {{-- FOR ICONS IN NAVBAR --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" crossorigin="anonymous"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

    {{-- BOOTSTRAP ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    {{-- SUMMERNOTE CSS link --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    {{-- ANIMATION FOR MODAL-CAROUSEL ON TOP OF MASTER--}}
    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="sb-nav-fixed">
    {{-- navbar --}}
    @include('layouts.inc.admin-navbar')

    <div id="layoutSidenav">
        {{-- sidebar --}}
        @include('layouts.inc.admin-sidebar')

        <div id="layoutSidenav_content">
            <main>
                {{--  --}}
                @yield('content')

            </main>
            @include('layouts.inc.admin-footer')
        </div>
    </div>

    {{-- <script src="{{ asset('assets/js/pwd-toggle.js') }}"></script> --}}
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    {{-- MULTI-SELECT --}}
    <link rel="stylesheet" href="{{asset('assets/multi/filter_multi_select.css')}}"/>
    <script src="{{ asset('assets/multi/filter-multi-select-bundle.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    {{-- SUMMERNOTE CSS link --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#summernoteDesc").summernote({
                height: 250,
                // airMode: true,
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>

    {{-- ASK ADMIN&STAFF IF SURE IN DELETE --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete').click(function(e) {
                if(!confirm('Are you sure you want to delete this?')) {
                    e.preventDefault();
                }
            });
        });
    </script>

    {{-- CAROUSEL SCRIPT ON BOTTOM OF MASTER --}}
    <script>
        // document.getElementById('gallery').classList.add("custom");
        document.getElementById('gallery');
        document.getElementById('exampleModal').classList.add("custom");
    </script>

    {{-- MULTIPLE CHECKBOX --}}
    <script>
        $(function () {
            $('#designs').on('optionselected', function(e) {
            ...
            });
        });
    </script>
    <script>
        $(function () {
            $('#amenities').on('optionselected', function(e) {
            ...
            });
        });
    </script>

    {{-- TOGGLE PASSWORD --}}
    <script>
        const togglecurrentPassword = document.querySelector("#togglecurrentPassword");
        const currentpwd = document.querySelector("#currentpwd");

        togglecurrentPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = currentpwd.getAttribute("type") === "password" ? "text" : "password";
            currentpwd.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        const togglenewPassword = document.querySelector("#togglenewPassword");
        const newpwd = document.querySelector("#newpwd");

        togglenewPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = newpwd.getAttribute("type") === "password" ? "text" : "password";
            newpwd.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        const togglerepeatPassword = document.querySelector("#togglerepeatPassword");
        const repeatpwd = document.querySelector("#repeatpwd");

        togglerepeatPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = repeatpwd.getAttribute("type") === "password" ? "text" : "password";
            repeatpwd.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>

    {{-- MULTIPLE UPLOAD VIDEOS PROJECT --}}
    {{-- <script type="text/javascript">
        $(document).ready(function() {
          $(".btn-success").click(function(){ 
              var lsthmtl = $(".clone").html();
              $(".increment").after(lsthmtl);
          });
          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".realprocode").remove();
          });
        });
    </script>
    
    <script>
          $(function() {
            $('[data-toggle="modal"]').hover(function() {
                var modalId = $(this).data('target');
                $(modalId).modal('show');
            });
        });
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    ></script>


<script>
$(document).ready(function() {
var max_fields      = 10; //maximum input boxes allowed
var wrapper         = $(".input_fields_wrap"); //Fields wrapper
var add_button      = $(".add_field_button"); //Add button ID

var x = 1; //initlal text box count


$(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed

     //text box increment
        // $(wrapper).append('<div><input type="file" name="videos[]" class=" form-control" ><input type="text" name="texts[]" placeholder="&#xf015; Virtual Tour Name" required style="font-family:Arial, FontAwesome"><a href="#" class="remove_field">Remove</a></div>');

        $(wrapper).append('<div class="card p-2"><input type="file" name="videos[]" class=" form-control m-2" ><input type="text" name="texts[]" class=" form-control m-2" placeholder="&#xf015; Virtual Tour Name" required style="font-family:Arial, FontAwesome"><a href="#" class="remove_field d-flex justify-content-end" style="color:red;">Remove</a></div>');
         //add input box
        x++; 
}
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
   
e.preventDefault(); 
$(this).parent('div').remove(); 
x--;
})
});

</script>

    {{-- BOOTSTRAP script link --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>