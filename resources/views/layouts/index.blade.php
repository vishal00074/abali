<!DOCTYPE html>
<html lang="zxx">
  <head>
    @include('include.head')
    @yield('css')
  </head>
  <body>
    <!-- wpp-btn-mobile --
<div class="phone-call cbh-phone cbh-green cbh-show  cbh-static" id="clbh_phone_div" style="">
    <a id="WhatsApp-button" href="https://wa.me/+00000" target="_blank" class="phoneJs" title="WhatsApp 360imagem">
        <div class="cbh-ph-circle"></div>
        <div class="cbh-ph-circle-fill"></div>
        <div class="cbh-ph-img-circle1"></div>
    </a>
</div>
<!-- wpp-btn-mobile -->

    <!-- Preloader -->
    <!--<div class="preloader-bg"></div>-->
    <!--<div id="preloader">-->
    <!--  <div id="preloader-status">-->
    <!--    <div class="preloader-position loader"><span></span></div>-->
    <!--  </div>-->
    <!--</div>-->
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
      <svg
        class="progress-circle svg-content"
        width="100%"
        height="100%"
        viewBox="-1 -1 102 102"
      >
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
     @include('include.navbar')
     @include('flash-message')
    </nav>
   
    <!-- Slider -->
    @yield('content')
    <!-- Footer -->
    <footer class="footer">
     @include('include.footer') 
    </footer>
    <!-- jQuery -->
    <script src="{{ asset('frontend/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.isotope.v3.0.2.js') }}"></script>
    <script src="{{ asset('frontend/js/pace.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/scrollIt.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/js/YouTubePopUp.js') }}"></script>
    <script src="{{ asset('frontend/js/select2.js') }}"></script>
    <script src="{{ asset('frontend/js/datepicker.js') }}"></script>
    <script src="{{ asset('frontend/js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    @yield('script')
  </body>
</html>
