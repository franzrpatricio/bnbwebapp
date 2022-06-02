@extends('layouts.client')
@section('content')


<div class="p-5 text-center" data-aos="fade-left" data-aos-duration="3000" style=" background-image: url({{asset('assets/client/building2.jpg')}});">
   
  <div class="d-flex justify-content-center align-items-center" >
    <div class="banner-title text-center">
      <h1 class="text-light py-4" data-aos="fade-right" data-aos-duration="1000"><span>The Team</span></h1>
      <p class=" text-light text-center" data-aos="fade-right" data-aos-duration="1000" style="font-size: 22px;">
        Get to Know the  Developers
      </p>
    </div>
  </div>
</div>

{{-- <div class="container d-flex justify-content-center p-3">
  <div class="row ">

    <div class="col-3 ">

      <div class="card text-center" style="width: 20rem; height:30rem;">
        <img src="{{asset('assets/client/aj.jpg')}}" class="card-img-top m-2" style=" width: 15rem;" alt="AJ Cotoner">
        <div class="card-body">
          <h5 class="card-title">Frontend Developer</h5>
          <h6><a href="https://www.facebook.com/aj.cotoner.1/">Arthur John Cotoner</a></h6>
          <p class="card-text" style="text-align:justify;">
            Front-end developers use HTML, CSS, JavaScript and Bootstrap to build the client side of a website. They are responsible for building the visual elements on a page, such as the layout, buttons, menus, forms, and other features that users will see and interact with when they visit a webpage.

          </p>
        </div>
      </div>
    </div>

    <div class="col-3">
      <div class="card text-center" style="width: 20rem; height:30rem;">
        <img src="{{asset('assets/client/renz.jpg')}}" class="card-img-top m-2" style="width: 15rem;" alt="AJ Cotoner">
        <div class="card-body">
          <h5 class="card-title">Frontend Developer</h5>
          <h6><a href="https://www.facebook.com/RenzBanana">Renz Kristoffer Bana</a></h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
       
        </div>
      </div>
    </div>

    <div class="col-3">
      <div class="card text-center" style="width: 20rem; height:30rem;">
        <img src="{{asset('assets/client/trish.jpg')}}" class="card-img-top m-2" style="width: 15rem;" alt="AJ Cotoner">
        <div class="card-body">
          <h5 class="card-title">Backend Developer</h5>
          <h6><a href="https://www.facebook.com/trishaaaellorda">Trisha May Ellorda</a></h6>
           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
      </div>
    </div>

    <div class="col-3">
      <div class="card text-center" style="width: 20rem; height:30rem;">
        <img src="{{asset('assets/client/franz.jpg')}}" class="card-img-top m-2" style="width: 15rem;" alt="AJ Cotoner">
        <div class="card-body">
          <h5 class="card-title">Backend Developer</h5>
          <h6><a href="https://www.facebook.com/franzgerard.patricio">Franz Gerard Patricio</a></h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>

    
        
  </div>
  

</div> --}}

<div class="container p-3">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="{{asset('assets/client/aj.jpg')}}">
        </div>
        <div class="team-content">
          <h3 class="name">Arthur John Cotoner</h3>
          <h4 class="title">Frontend Developer</h4>
        </div>
        <ul class="social">
          <li><a href="https://www.facebook.com/aj.cotoner.1/" class="fa fa-facebook" aria-hidden="true"></a></li>
          <li><a href="https://twitter.com/ajcotoner" class="fa fa-twitter" aria-hidden="true"></a></li>
          <li><a href="https://www.instagram.com/azzzcotoner/" class="fa fa-instagram" aria-hidden="true"></a></li>
          <li><a href="https://www.linkedin.com/in/arthur-john-cotoner-024aa5125" class="fa fa-linkedin" aria-hidden="true"></a></li>
        </ul>
      </div>
    </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="{{asset('assets/client/renz.jpg')}}">
        </div>
        <div class="team-content">
          <h3 class="name">Renz Kristoffer Bana</h3>
          <h4 class="title">Frontend Developer</h4>
        </div>
        <ul class="social">
          <li><a href="https://www.facebook.com/RenzBanana" class="fa fa-facebook" aria-hidden="true"></a></li>
          <li><a href="https://twitter.com/KristofferBana" class="fa fa-twitter" aria-hidden="true"></a></li>
          <li><a href="https://www.instagram.com/wenz___18/" class="fa fa-instagram" aria-hidden="true"></a></li>
          <li><a href="https://www.linkedin.com/in/renz-kristoffer-bana-626aa1202/" class="fa fa-linkedin" aria-hidden="true"></a></li>
        </ul>
      </div>
    </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="{{asset('assets/client/franz.jpg')}}">
        </div>
        <div class="team-content">
          <h3 class="name">Franz Gerard Patricio</h3>
          <h4 class="title">Backend Developer</h4>
        </div>
        <ul class="social">
          <li><a href="https://www.facebook.com/franzgerard.patricio" class="fa fa-facebook" aria-hidden="true"></a></li>
          <li><a href="https://twitter.com/kpatriciooooo" class="fa fa-twitter" aria-hidden="true"></a></li>
          <li><a href="https://www.instagram.com/franzrpatricio/" class="fa fa-instagram" aria-hidden="true"></a></li>
          <li><a href="https://www.linkedin.com/in/fgrpatricio" class="fa fa-linkedin" aria-hidden="true"></a></li>
        </ul>
      </div>
    </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="{{asset('assets/client/trish.jpg')}}">
        </div>
        <div class="team-content">
          <h3 class="name">Trisha May Ellorda</h3>
          <h4 class="title">Backend Developer</h4>
        </div>
        <ul class="social">
          <li><a href="https://www.facebook.com/trishaaaellorda" class="fa fa-facebook" aria-hidden="true"></a></li>
          <li><a href="https://twitter.com/trishaaaellorda" class="fa fa-twitter" aria-hidden="true"></a></li>
          <li><a href="https://www.instagram.com/trishaaaellorda/ class="fa fa-instagram" aria-hidden="true"></a></li>
          <li><a href="https://www.linkedin.com/in/tmellorda" class="fa fa-linkedin" aria-hidden="true"></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>



  <script>
    AOS.init();
</script>
@endsection



  
