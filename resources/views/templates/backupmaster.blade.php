<!DOCTYPE html>
<html lang="en">
  
  
  @include('templates.sublayouts._head');
  <body>
    <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- END SCROLL TOP BUTTON -->
    <!-- Start header section -->
    <header id="mu-header">
      <nav class="navbar navbar-default mu-main-navbar" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- LOGO -->
            <!--  Text based logo  -->
            <a class="navbar-brand" href="{{('/')}}">Tea<span>Co</span></a>
            <!--  Image based logo  -->
            {{-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="Logo img"></a>  --}}
            
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
              <li><a href="index.html">HOME</a></li>
              <li><a href="#mu-about-us">ABOUT US</a></li>
              <li><a href="#mu-restaurant-menu">MENU</a></li>
              <li><a href="#mu-reservation">RESERVATION</a></li>
              <li><a href="#mu-gallery">GALLERY</a></li>
              <li><a href="#mu-chef">OUR CHEFS</a></li>
              <li><a href="#mu-contact">CONTACT</a></li>
            </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
      </header>
      <!-- End header section -->
      
      <!-- Start slider  -->
      <section id="mu-slider">
        <div class="mu-slider-area">
          <!-- Top slider -->
          <div class="mu-top-slider">
            <!-- Top slider single slide -->
            <div class="mu-top-slider-single">
              <img src="assets/img/slider/1.jpeg" alt="img">
              <!-- Top slider content -->
              <div class="mu-top-slider-content">
                <span class="mu-slider-small-title">Welcome</span>
                <h2 class="mu-slider-title">To The TeaCo Coffe Shop</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque voluptatem accusamus non quidem, deleniti optio.</p>
                {{-- <a href="#mu-reservation" class="mu-readmore-btn mu-reservation-btn">BOOK A TABLE</a> --}}
              </div>
              <!-- / Top slider content -->
            </div>
            <!-- / Top slider single slide -->
            <!-- Top slider single slide -->
            <div class="mu-top-slider-single">
              <img src="assets/img/slider/2.jpeg" alt="img">
              <!-- Top slider content -->
              <div class="mu-top-slider-content">
                <span class="mu-slider-small-title">The Elegant</span>
                <h2 class="mu-slider-title">Italian Restaurant</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque voluptatem accusamus non quidem, deleniti optio.</p>
                {{-- <a href="#mu-reservation" class="mu-readmore-btn mu-reservation-btn">BOOK A TABLE</a> --}}
              </div>
              <!-- / Top slider content -->
            </div>
            <!-- / Top slider single slide -->
            <!-- Top slider single slide -->
            <div class="mu-top-slider-single">
              <img src="assets/img/slider/3.jpeg" alt="img">
              <!-- Top slider content -->
              <div class="mu-top-slider-content">
                <span class="mu-slider-small-title">Delicious</span>
                <h2 class="mu-slider-title">Spicy Masalas</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque voluptatem accusamus non quidem, deleniti optio.</p>
                {{-- <a href="#mu-reservation" class="mu-readmore-btn mu-reservation-btn">BOOK A TABLE</a> --}}
              </div>
              <!-- / Top slider content -->
            </div>
            <!-- / Top slider single slide -->
          </div>
        </div>
      </section>
      <!-- End slider  -->

      @include('templates.sublayouts._aboutus');
      
      @include('templates.sublayouts._counter');
{{--  --}}
      @include('templates.sublayouts._menu');

      @include('templates.sublayouts._reservation');

      @include('templates.sublayouts._gallery');
      
      @include('templates.sublayouts._testimoni');
      
      @include('templates.sublayouts._chef');
      
      @include('templates.sublayouts._contact');
      
      @include('templates.sublayouts._map');

      @include('templates.sublayouts._footer');
      
      @include('templates.sublayouts._script')
    </body>
  </html>