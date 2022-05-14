@extends('layouts.client')
@section('content')

<div>
  <div class="header" data-aos="fade-right" data-aos-duration="1000" style="background-image: url('{{asset('assets/client/building2.jpg')}}')">

    <div  class="p-5 text-center bg-image"  style="filter: brightness(60%);">
        <img src="" alt="">
     </div>
        <div class="d-flex justify-content-center align-items-center" >
         <div class="banner-title text-center">
          <h1 class="mb-3 text-light" data-aos="fade-right" data-aos-duration="1000">Virtual Tour</h1>
      </div>
      </div>
    </div>

</div> 
<div class="container-fluid p-3">

<div class="row"> 

<div class="col-12 col-lg-6 col-sm-12 col-md-12 p-3" data-aos="fade-right" data-aos-duration="3000">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-indicators">
  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
</div>
<div class="carousel-inner "style="height:500px; width: 100%; ">
  <div class="carousel-item active ">
    <img src="{{asset('assets/client/front.png')}}" class="d-block w-100 img-fluid" style="height:500px; width: 100%; " alt="..." >
  </div>
  <div class="carousel-item">
    <img src="{{asset('assets/client/side.png')}}" style=" height:500px; width: 100%; " class="d-block w-100  img-fluid" alt="...">
  </div>
  <div class="carousel-item">
    <img src="{{asset('assets/client/top.png')}}" class="d-block w-100 img-fluid "style="height:500px; width: 100%;" alt="...">
  </div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Next</span>
</button>
</div>

</div>
<div class="col-12 col-lg-6 col-sm-12 col-md-12 d-flex justify-content-center align-items-center"  >

<p  style="text-align: justify;" data-aos="fade-right" data-aos-duration="3000">
Tanza, Cavite Project<br>            

  Kitchen 15.10' x 9.06'<br>
  Living, Dining 60 cm x 60 cm<br>
  Study, Den and Maid’s Room<br>
  Living, Dining 60 cm x 60 cm<br>
  Living, Dining 60 cm x 60 cm<br><br>
  Opulent, and meticulously detailed, this lush modern themed home is very classy. Floor to ceiling windows bring in soft northern and westerly light. Spaces are crafte by a refined and highly practical floor plan. A sweeping 10 foot balcony invites amazing entertaining, and offers privileged direct access to swimming, sun patios and fitness. Working with great real space gave the architects an opportunity to refine the layout to match the building's true charcter. Results are impressive. Two large bedroom suites are located at either end of the living spaces for undisturbed privacy. A home office is sited close to the master bedroom suite. And a rarity home living even the kitchen has a door to the:     </div>

</p>

</div>
</div>
<div>
<div class="header" data-aos="fade-right" data-aos-duration="1000" style="background-image: url('{{asset('assets/client/building2.jpg')}}')">

<div  class="p-5 text-center bg-image"  style="filter: brightness(60%);">
    <img src="" alt="">
 </div>
    <div class="d-flex justify-content-center align-items-center" >
     <div class="banner-title text-center">
      <h1 class="mb-3 text-light" data-aos="fade-right" data-aos-duration="1000">Virtual Tour</h1>
  </div>
  </div>
</div>

</div>


  <div class="d-flex justify-content-center p-3" data-aos="fade-right" data-aos-duration="3000">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/Fo1QgbSZXHU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<div class="container-fluid" style="background:whitesmoke;" data-aos="fade-right" data-aos-duration="3000">
  <div class="row">
    <div class="col-lg-6 p-3">
      <div class="p-3"> Comment Panel</div>
      <div class="p-3">
        <label>Name:</label> 
        <input type="name" name="name" placeholder="Name" id="name" style="width: 100%;">
      </div>
      <div class="p-3"> 
      <label>E-mail:</label> 
        <input type="email" name="email" placeholder="Email" id="email" style="width: 100%;">
      </div>
      <div class="p-3"> 
      <label>Comment:</label> 
        <textarea class="form-control" placeholder="write a comment..." rows="3"></textarea>
      </div>
      <button type="button" class="btn btn-primary  btn-info " style=" width:100px">Post</button>
    </div>




    <div class="col-lg-6 p-3">
      <div>Comment Review</div>



    <div style="background:whitesmoke; overflow-y:scroll; height:380px">
      <div class="card m-3" style="width: 500px; height: 150px;">
        <div class="row p-3" >
          <div class="col-3">
            <img src="./images/ar1.jpg" class="img-fluid" style="height: 100px; width: 100px; border-radius: 200px;"></img>
          </div>
          
          <div class="col-9" >
            <div>name</div>
            <div>email</div>
            <div>comment</div>
          </div>
        </div> 
      </div>

      <div class="card m-3" style="width: 500px; height: 150px;">
        <div class="row p-3" >
          <div class="col-3">
            <img src="./images/ar1.jpg" class="img-fluid" style="height: 100px; width: 100px; border-radius: 200px;"></img>
          </div>
          
          <div class="col-9" >
            <div>name</div>
            <div>email</div>
            <div>comment</div>
          </div>
        </div> 
      </div>

      <div class="card m-3" style="width: 500px; height: 150px;">
        <div class="row p-3" >
          <div class="col-3">
            <img src="./images/ar1.jpg" class="img-fluid" style="height: 100px; width: 100px; border-radius: 200px;"></img>
          </div>
          
          <div class="col-9" >
            <div>name</div>
            <div>email</div>
            <div>comment</div>
          </div>
        </div> 
      </div>
  </div>



  


<script>
  AOS.init();
</script>
@endsection