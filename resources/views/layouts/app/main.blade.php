<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>EKMAL</title>
      <!-- CSS here -->
      <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/main-port.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('assets/css/images/logo.svg') }}">

    <title>{{ env('APP_NAME') }}</title>
    @stack('header')
   
</head>

<body>
  
        @include('frontend.common.header')
  
        
                @yield('content')
                @include('frontend.common.footer')
        
    <!-- JavaScript -->
    <button class="back-to-top" type="button"></button>
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
      <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
      <script src="{{ asset('assets/js/jquery1.min.js') }}"></script>
      <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
      <script src="{{ asset('assets/js/custom.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('assets/js/magnific-popup.css') }}" />

      <script src="{{ asset('assets/js/meanmenu.js') }}"></script>
      <script src="{{ asset('assets/js/slick.js') }}"></script>
      <script src="{{ asset('assets/js/nice-select.js') }}"></script>
      <script src="{{ asset('assets/js/purecounter.js') }}"></script>
      <script src="{{ asset('assets/js/wow.js') }}"></script>
      <script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>
    
    @stack('footer')

    </body>
</html>