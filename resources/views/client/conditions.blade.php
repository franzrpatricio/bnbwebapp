@extends('layouts.client')
@section('content')


<div class="home"  data-aos="fade-right" data-aos-duration="1000">
    <img src="{{asset('assets/client/bghome.jpg')}}" class="fitBg">
    <div class="content1">
        <h1 class="text-light"><span>INTELLECTUAL PROPERTY</span></h1>
        <p>
        All intellectual property rights to the Website and its content, including but not limited to all text, drawings, files, pictures, software, graphics, photos, videos, information, content, materials, products, services, documentation, and interactive features, are owned by us, our licensors, or both. Furthermore, we, our licensors, or both own all trademarks, service marks, trade names, and corporate identity that may appear on the Website. You will not acquire any right, title, or interest in the Website or any Website Content, other for the limited usage rights provided to you in these Terms of Use. Any rights not expressly granted in these Terms of Use are reserved in their entirety.
        </p>
        &nbsp;
        <h1 class="text-light"><span>PRIVACY</span></h1>
        <p>
            The company take steps to protect all the client’s information from unauthorized access and against unlawful processing. The company will only keep the information as long as the Data Legislation allows. We will only use the information for business purposes only.
        </p>
    </div>
</div>

<script>
    AOS.init();
</script>
@endsection