@extends('layouts.client')
@section('content')

    <div class="header" style="background-image: url('{{asset('assets/client/building.jpg')}}')">

      <div  class="p-3 text-center bg-image"  style="filter: brightness(60%);">
        <img src="" alt="">
        </div>
      <div class="d-flex justify-content-center align-items-center" >
        <div class="banner-title text-center">
          <h1 class="mb-3 text-light">Architect's Profile</h1>
          <p class="mb-3 text-light text-center">Get to Know our Finest Architects</p>
          
        </div>
      </div>
    </div>
  

   <!-- ======= About Section ======= -->
   <section id="about" class="about section-bg">
    <div class="container">

      <div class="row gy-4">
        
        <div class="card">
          <img src="{{asset('assets/client/ar2.jpg')}}" style="height: 100%; width: 100%;" class="card-image-top">

          </div>
        </div>
        <div class="col-xl-7">
          <div class="content d-flex flex-column justify-content-center ps-0 ps-xl-4">
            <h3 data-aos="fade-in" data-aos-delay="100">Architect Michael G. Bana</h3>
            <p data-aos="fade-in">
              Arch. Michael G. Bana is a product of Technological Institute of the Philippines graduated Bachelor of Science in Architecture in October 1992.
                He is a highly skilled and dedicated professional with 20 years of experience and has a strong background in SIte Supervising, Planning, & Technical Drawing Management.
                Highly commited to quality and teamwork. He provides technical skills and expertise in various architectural design of engineering structures. Prepare work plans and communicate
                to project managers to determine the scope of work. Besides being an Architect, he is also a Site Supervisor and MEP Site Engineer. He became a Installation Site Manager of Penny Steel Haus
                during 1993-1997. He also became a Site Engineer for Site Tech Electromechanical in Dubai, UEA in 2008-2010. Now he is the Co-Founder of Bana & Bana Architects in 2011 up to the present day. 
            </p>
            <div class="row gy-4 mt-3">
              <div class="col-md-6 icon-box" data-aos="fade-up">
                <i class="bx bx-receipt"></i>
                <h4><a href="#">Site Engineer</a></h4>
                <p>Penny Steel Haus during 1993-1997. He also became a Site Engineer for Site Tech Electromechanical in Dubai, UEA in 2008-2010. </p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-cube-alt"></i>
                <h4><a href="#">Site Supervisor</a></h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-images"></i>
                <h4><a href="#">MEP Site Engineer</a></h4>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-shield"></i>
                <h4><a href="#">Co-Founder of Bana & Bana Architects</a></h4>
                <p>2011 up to the present day</p>
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section><!-- End About Section -->
  <br>

  <section id="about" class="about section-bg py-4">
    <div class="container">

      <div class="row py-4">
        <div class="card">
          <img src="{{asset('assets/client/ar1.jpg')}}" style="height: 100%; width: 100%;" class="card-image-top">

          </div>

        </div>
        <div class="col-xl-7">
          <div class="content d-flex flex-column justify-content-center ps-0 ps-xl-4">
            <h3 data-aos="fade-in" data-aos-delay="100">Architect Michael G. Bana</h3>
            <p data-aos="fade-in">
              Arch. Michael G. Bana is a product of Technological Institute of the Philippines graduated Bachelor of Science in Architecture in October 1992.
                He is a highly skilled and dedicated professional with 20 years of experience and has a strong background in SIte Supervising, Planning, & Technical Drawing Management.
                Highly commited to quality and teamwork. He provides technical skills and expertise in various architectural design of engineering structures. Prepare work plans and communicate
                to project managers to determine the scope of work. Besides being an Architect, he is also a Site Supervisor and MEP Site Engineer. He became a Installation Site Manager of Penny Steel Haus
                during 1993-1997. He also became a Site Engineer for Site Tech Electromechanical in Dubai, UEA in 2008-2010. Now he is the Co-Founder of Bana & Bana Architects in 2011 up to the present day. 
            </p>
            <div class="row gy-4 mt-3">
              <div class="col-md-6 icon-box" data-aos="fade-up">
                <i class="bx bx-receipt"></i>
                <h4><a href="#">Site Engineer</a></h4>
                <p>Penny Steel Haus during 1993-1997. He also became a Site Engineer for Site Tech Electromechanical in Dubai, UEA in 2008-2010. </p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-cube-alt"></i>
                <h4><a href="#">Site Supervisor</a></h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-images"></i>
                <h4><a href="#">MEP Site Engineer</a></h4>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-shield"></i>
                <h4><a href="#">Co-Founder of Bana & Bana Architects</a></h4>
                <p>2011 up to the present day</p>
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>
  </section>
  </div>
@endsection