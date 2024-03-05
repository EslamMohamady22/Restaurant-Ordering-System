<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-Area header-Sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="{{url('single')}}" class="active">Single</a></li>
                            <li class="scroll-to-section"><a href="{{url('double')}}" class="active">Double</a></li>
                            <li class="scroll-to-section"><a href="{{url('share')}}" class="active">Share</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        
                            <li class="scroll-to-section"><a href="{{url('offer')}}">Offers</a></li>
                            <li class="scroll-to-section"><a href="{{url('showadmin')}}">contact</a></li>
                        <li value="chef" class="submenu">
                            <a href="javascript:;">Chefs</a>
                                <ul id="selectUser" style="background-color:white; text-align:right; width:250px">
                                    
                                        <li  disabled selected>Please select user</li> 
                                              
                                        @foreach ($chefs as $foods)
                                        <a href="{{url('choice_debartment')}}?user_selected={{$foods->name}}"> 
                                            <li value="{{$foods->name}}">
                                                {{$foods->name}}
                                            </li>
                                        </a>
                                        @endforeach
                                        
                                
                                </ul>
                                
    
                            
                            
                        </li>
                        <li value="Debartment" class="submenu">
                            <a href="javascript:;">Debartment</a>
                                <ul id="selectUser" style="background-color:white">
                                    
                                        <li  disabled selected>Please select user</li> 
                                              
                                        @foreach ($food as $foods)
                                        <a href="{{url('choice_debartment')}}?user_selected={{$foods->debartment}}"> 
                                            <li value="{{$foods->debartment}}">
                                                {{$foods->debartment}}
                                            </li>
                                        </a>
                                        @endforeach
                                        
                                
                                </ul>
                                
    
                            
                            
                        </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="btn btn-success">
                                @auth
                                <a href="{{url('/showcart',Auth::user()->id)}}">
                                Cart[{{$count}}] </a>                                   
                                @endauth   
                                @guest
                                    Cart[0]
                                @endguest
                                
                            
                           
                            
                            
                            </li>
                            
                            <li>
                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <li><x-app-layout>
   
                                        </x-app-layout>
                                        </li>
                                    @else
                                        <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>
                
                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                            </li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                
    @foreach ($offer as $foods)
   
                <div class="item">
                    <div style="background-image: url('FoodImagefolder/{{$foods->image}}')" class='card'>
                        <div class="price"><h6>{{$foods->price}}</h6></div>
                        <div class='info'>
                            <h1 class='title'>{{$foods->title}}</h1>
                            <p class='description'>{{$foods->description}}</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                        </div>
                        
                    </div>
                    <form method="POST" action="{{ url('/Addcart',$foods->id) }}" enctype="multipart/form-data">
                        
                        @csrf
                        <div>
                                
                            <x-jet-input id="cart" min=1   style="color: black" class="block mt-1 w-full" aria-placeholder="cart" type="number" name="quantity" value=1 required autofocus autocomplete="cart" />
                            <x-jet-button class="ml-4">
                                {{ __('Cart') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            
    @endforeach

    

</div>
</div>
</div>



    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.
                        
                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>