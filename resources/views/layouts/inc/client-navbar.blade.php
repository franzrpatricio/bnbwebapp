<!-- The overlay -->
<div id="myNav" class="overlay">
    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
    <!-- Overlay content -->
    <div class="overlay-content">
      <a href="/">Home</a>
      <a href="{{ url('/portfolio') }}">Portfolio</a>
      <a href="{{ url('/profile') }}">Profile</a>
      <a href="{{ url('/projects') }}">Projects</a>
      <a href="{{ url('/contact') }}">Contact Us</a>
    </div>  
</div>
  
<!-- Use any element to open/show the overlay navigation menu -->
<span onclick="openNav()">
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <a href="#" class="navbar-brand" style="color: antiquewhite">BANA AND BANA</a>
        </div>
    </nav>
</span>