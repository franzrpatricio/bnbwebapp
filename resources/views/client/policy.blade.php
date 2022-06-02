@extends('layouts.client')
@section('content')

<div class="home"  data-aos="fade-right" data-aos-duration="1000">
    <img src="{{asset('assets/client/bghome.jpg')}}" class="fitBg">
    <div class="jumbotron">
        <div class="content1">
            <h1 class="text-light"><span>Terms and Conditions</span></h1>
            <p>        
                These Terms and Conditions govern your use of the Bana and Bana Architects website located at the domain name https:/bnb-architects.online. By accessing and using the website, the user agrees to be bound by the Terms and Conditions set out in this legal notice. The user may not access display, use, download, copy or distribute content obtained by the website for marketing and other purpose without the consent of the company. You must not use this website if you disagree with any of these terms and conditions set by the company.
            </p>
        </div>
    </div>
</div>

<script>
    AOS.init();
</script>
@endsection