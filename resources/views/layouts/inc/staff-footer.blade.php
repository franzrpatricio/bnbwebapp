<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Bana and Bana Architects 2022</div>

            <div class="col-6 col-lg-2 col-md-4 offset-lg-1 mb-3">
                <h5>Links</h5>
                <ul class="list-unstyled">
                  <li class="mb-2"><a href="/" class="link-light text-decoration-none">Home</a></li>
                  <li class="mb-2"><a href="#" class="link-light text-decoration-none">Portfolio</a></li>
                  <li class="mb-2"><a href="#" class="link-light text-decoration-none">Profile</a></li>
                  <li class="mb-2"><a href="#" class="link-light text-decoration-none">Projects</a></li>
                  <li class="mb-2"><a href="#" class="link-light text-decoration-none">Contact US</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2  col-md-4 mb-3">
                <h5>Services</h5>
                <ul class="list-unstyled">
                    <li class="mb-2 text-white">Construction</li>
                    <li class="mb-2 text-white">Roofing</li>
                    <li class="mb-2 text-white">Design and Build</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2  col-md-4 mb-3">
                <h5>Social Media</h5>
                <div class="row">
                    <ul class="list-unstyled">
                        <a href="#"><i class="fa fa-facebook fa-1x fa-color text-white p-3"></i></a>
                        <a href="#"><i class="fa fa-instagram fa-1x fa-color text-white p-3"></i></a>
                        <a href="#"><i class="fa fa-linkedin fa-1x fa-color text-white p-3"></i></a>      
                    </ul>
                </div>
            </div>

            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>

            <div>
                @if (session('msgc'))
                    <h6 class="alert alert-warning mb-3">{{session('msgc')}}</h6>
                @endif  
                <h5>NEWSLETTER</h5>
                <p>Be the first to know about exciting and upcoming projects, and many more!</p>
                <form action="{{ route('subscribe.subscribe') }}" method="post">
                    {{-- Returning false stops the page from reloading --}}
                    @csrf
                    <div class="p-3"> 
                        {{-- <input type="email" name="email" placeholder="Email" id="email" style="width: 100%;"> --}}
                        <label>Email</label>
                        <input type="email" 
                        name="email" 
                        class="form-control @error('name') is-invalid @enderror('email')" 
                        placeholder="Email" 
                        id="email" 
                        style="width: 100%;"
                        required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>              
                    <button type="submit" class="btn btn-info pull-right" style="color:aqua;">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</footer>