<!DOCTYPE html>
<html lang="en">
  
  
  @include('templates.sublayouts._head')
  {{-- <head>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  </head> --}}
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
            <a class="navbar-brand" href="{{('/home')}}">Tea<span>Co</span></a>
          </div>
          <div class="topnav" id="myTopnav">
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
                <ul class="main-nav">
                  @hasanyrole('Admin|Kasir')
                  <li class="dropdown">
                    <a href="#">{{__('Order')}} <i class="fa fa-chevron-circle-down"></i></a>
                    <ul class="drop-nav">
                      <li><a href="{{ route('forder') }}">{{__('Create')}}</a></li>
                      <li><a href="{{ route('vod') }}">{{__('View')}}</a></li>
                      <li class="flyout">
                        <a href="#">{{__('Board')}}
                          <i class="fa fa-chevron-circle-right"></i>
                        </a>
                        <ul class="flyout-nav">
                          <li><a href="{{ route('fboard') }}">{{__('Create')}}</a></li>
                          <li><a href="{{ route('vboard') }}">{{__('View')}}</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#">{{__('Menus')}} <i class="fa fa-chevron-circle-down"></i></a>
                    <ul class="drop-nav">
                      
                          @if(auth()->user()->can('create menu'))
                             <li><a href="{{ route('fmenu') }}">{{__('Create')}}</a></li>
                          @else

                          @endif
                      <li><a href="{{ route('vmenu') }}">{{__('View')}}</a></li>
                      <li class="flyout">
                        <a href="#">{{__('Packet')}}
                          <i class="fa fa-chevron-circle-right"></i>
                        </a>
                        <ul class="flyout-nav">
                          @if(auth()->user()->can('create packet menu'))
                          <li><a href="{{ route('fpacketmenu') }}">{{__('Create')}}</a></li>
                          @else

                          @endif
                          <li><a href="{{ route('vpacketmenu') }}">{{__('View')}}</a></li>
                        </ul>
                      </li>
                      
                    </ul>
                  </li>
                  
                  @endhasanyrole
                  @role('Admin')
                   <li class="dropdown">
                    <a href="#">{{__('Packet')}} <i class="fa fa-chevron-circle-down"></i></a>
                    <ul class="drop-nav">
                      <li><a href="{{ route('fpacket') }}">{{__('Create')}}</a></li>
                      <li><a href="{{ route('vpacket') }}">{{__('View')}}</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#">{{__('Type')}} <i class="fa fa-chevron-circle-down"></i></a>
                    <ul class="drop-nav">
                      <li><a href="{{ route('ftype') }}">{{__('Create')}}</a></li>
                      <li><a href="{{ route('vtype') }}">{{__('View')}}</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#">{{__('Unit')}} <i class="fa fa-chevron-circle-down"></i></a>
                    <ul class="drop-nav">
                      <li><a href="{{ route('funit') }}">{{__('Create')}}</a></li>
                      <li><a href="{{ route('vunit') }}">{{__('View')}}</a></li>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <a href="#">{{__('Balance')}} <i class="fa fa-chevron-circle-down"></i></a>
                    <ul class="drop-nav">
                      <li><a href="{{ route('fbalance') }}">{{__('Create')}}</a></li>
                      <li><a href="{{ route('vbalance') }}">{{__('View')}}</a></li>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <a href="#">{{__('Account')}} <i class="fa fa-chevron-circle-down"></i></a>
                    <ul class="drop-nav">
                      <li><a href="{{ route('fregister') }}">{{__('Create')}}</a></li>
                      <li><a href="{{ route('vaccount') }}">{{__('View')}}</a></li>
                    </ul>
                  </li>
                  @endrole
                  <li class="dropdown">
                    <a href="#">{{ Auth::user()->username }} <i class="fa fa-chevron-circle-down"></i> </a>
                    <ul class="drop-nav">
                      <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                      {{__('Logout')}}</a></li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </ul>
                  </li>
                </ul>
              </ul>
              </div><!--/.nav-collapse -->
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
                <body onload="startTime();showBalance()">
                    <h4 id="txt" style="padding-right:6%"> </h4>     
                    <h4 id="s" style="padding-right:6%"> </h4>  
                </body>
                @include('alerts.alert')
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
      {{-- <script type="text/javascript">
         
      </script> --}}
    </body>
  </html>