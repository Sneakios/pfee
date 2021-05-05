
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyBiz Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--scripts -->

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  
  <style>
    .r{
        font-size: medium;
    }

    .cna{
        font-size: large;
        color: #007bff;
        font-weight: bold;
    }

.reg{

border: none;
border-radius: 6px;
font-size: 17px;
line-height: 48px;
padding: 0 16px;
cursor: pointer;
display: inline-block;
text-decoration: none;
white-space: nowrap;
font-family: inherit;
background-color: #42b72a;
color: #fff;
content: '';
display: inline-block;
width: 45%;
vertical-align: middle;
}

.birth {
color: #606770;
font-family: SFProText-Medium, Helvetica, Arial, sans-serif;
font-size: 15px;
font-weight: normal;
line-height: 20px;
margin-bottom: 0;
margin-top: 2px;
}

.lgn{display: inline;width: 130px;
  background-color: #01b1d7;
  color: white;
  border-radius: 25px;
  padding: 8px 16px;
  font-family: 'Source Sans Pro', sans-serif;
  font-size: 18px;
  border: none;}

</style>
 
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="{{route('welcome')}}">Help<span>Me</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
            @guest
            @if ('/' ==  request()->path())
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            <li><a class="nav-link scrollto" href="#testimonials">Team</a></li>

            <li><a class="nav-link scrollto " href="#contact">Contact Us</a></li>
           
            @endif
            @if ('login' !=  request()->path())
                      <li><a class="nav-link scrollto" href="{{ route('login') }}" ><button  class="lgn">Log in</button></a></li>

                      @endif
            @else

                <li>
                  
               {{--   <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                     <li>
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"><img src="{{asset('assets/logout.png')}}"style="height:20px;width:20px;">Logout</a>
                     </li>  
                  </ul>
                  </div>

--}}
<div class="dropdown">
  <button class="dropbtn"> <img src="{{asset('assets/amine.jpg')}}"style="height:30px;width:30px;border-radius: 40px;">  {{ Auth::user()->name }}  </button>
  <div class="dropdown-content">
    <a class="dropdown-item" href="" style="padding-right: 50px"><img src="{{asset('assets/profile.png')}}"style="height:20px;width:20px;"> Profile</a>

    <a class="dropdown-item" style="padding-right: 50px" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"><img src="{{asset('assets/logout.png')}}"style="height:20px;width:20px;">LogOut</a>
  </div>
</div>
                  
                
               </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest



        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

    <main class="py-4">
        @yield('content')
    </main>





    <footer id="footer" style="position: relative;top:150px">

    <div class="container" >
      <div class="copyright">
        &copy; Copyright <strong><span>MyBiz</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.slim.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/app.js')}}" defer ></script>
  <script src="{{asset('assets/js/main.js')}}"></script>


</body>

</html>
