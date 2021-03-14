<!DOCTYPE html>
<html lang="en">
  
  
  @include('templates.sublayouts._head')
  <head>
    <style>
    * {
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    }
    @font-face {
    font-family: 'icomoon';
    src:url('http://treehouse-code-samples.s3.amazonaws.com/CSS-DD/codepen/stage-13/fonts/icomoon.eot');
    src:url('http://treehouse-code-samples.s3.amazonaws.com/CSS-DD/codepen/stage-13/fonts/icomoon.eot?#iefix') format('embedded-opentype'),
    url('http://treehouse-code-samples.s3.amazonaws.com/CSS-DD/codepen/stage-13/fonts/icomoon.woff') format('woff'),
    url('http://treehouse-code-samples.s3.amazonaws.com/CSS-DD/codepen/stage-13/fonts/icomoon.ttf') format('truetype'),
    url('http://treehouse-code-samples.s3.amazonaws.com/CSS-DD/codepen/stage-13/fonts/icomoon.svg#icomoon') format('svg');
    }
    body {
    margin: 0;
    background: #ecf0f1;
    color: #fff;
    font-family: sans-serif;
    line-height: 1.5;
    }
    ul {
    list-style: none;
    padding: 0;
    margin: 0;
    }
    .main-header {
    margin: auto;
    width: 75%;
    min-height: 90px;
    padding: 1em 2em;
    border: 2px solid #2675a9;
    border-top: none;
    border-radius: 0 0 5px 5px;
    background: #2980b9;
    }
    .main-header:after {
    content: " ";
    display: table;
    clear: both;
    }
    .logo {
    display: block;
    text-decoration: none;
    float: left;
    margin-top: 5px;
    }
    .logo::before {
    color: #fff;
    content: "\e001";
    font-weight: normal;
    font-style: normal;
    font-size: 2.5em;
    font-family: "icomoon";
    -webkit-font-smoothing: antialiased;
    }
    /* Nav Demo Styles -------------------- */
    .main-nav,
    .drop-nav {
    /*background: #2C3E50;*/
    background: #FFFFFF;
    }
    .main-nav {
    float: right;
    /*border-radius: 4px;*/
    margin-top: 8px;
    /*border: solid 1px #1e2a36;*/
    }
    .main-nav > li {
    float: left;
    /*border-left: solid 1px #1e2a36;*/
    }
    .main-nav li:first-child {
    border-left: none;
    }
    .main-nav a {
    /*color: #fff;*/
    color:#080808;
    display: block;
    padding: 10px 30px;
    text-decoration: none;
    }
    .dropdown,
    .flyout {
    position: relative;
    }
    .dropdown:after {
    content: "\25BC";
    font-size: .5em;
    display: block;
    position: absolute;
    top: 38%;
    right: 12%;
    }
    .drop-nav,
    .flyout-nav {
    position: absolute;
    display: none;
    }
    .drop-nav li {
    border-bottom: 1px solid rgba(255,255,255,.2);
    }
    .dropdown:hover > .drop-nav,
    .flyout:hover > .flyout-nav {
    display: block;
    }
    .flyout-nav {
    left: 100%;
    top: 0;
    }
    .flyout:hover a,
    .flyout-nav {
    background: #F4F7FA;

    }
    </style>
  </head>
  <body>
    <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- END SCROLL TOP BUTTON -->
    <!-- Start header section -->
    <header id="mu-header">
      <nav class="navbar navbar-default mu-main-navbar" role="navigation">
        <div class="container" >
          <div class="navbar-header">
            <!-- LOGO -->
            <!--  Text based logo  -->
            <a class="navbar-brand" href="{{('/home')}}">Tea<span>Co</span></a>
          </div>
          <div class="topnav" id="myTopnav">
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="main-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li class="dropdown">
                  <a href="#">Work</a>
                  <ul class="drop-nav">
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Development</a></li>
                    <li class="flyout">
                      <a href="#">Photography</a>
                      <ul class="flyout-nav">
                        <li><a href="#">Nature</a></li>
                        <li><a href="#">People</a></li>
                        <li><a href="#">Pets</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Writing</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>       
        </div>     
      </div>
    </nav>
  </header>
  <!-- End header section -->
  <!--> Content Page </!-->
  <section id="mu-restaurant-menu">
    <div class="container-content">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-restaurant-menu-area">
            
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Restaurant Menu
  <!--> End Content Page </!-->
  @include('templates.sublayouts._footer');
  @include('templates.sublayouts._script')
  {{-- @include('templates.loglayouts._scriptlog') --}}
</body>
</html>