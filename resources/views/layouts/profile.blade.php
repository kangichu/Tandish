<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tandish') }} | {{$user->name}}</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Slabo+27px|Text+Me+One" rel="stylesheet">
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link rel='stylesheet prefetch' href="{{ asset('font/css/line-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profile/bubble/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profile/search/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/common/notify/reset.css') }}"> <!-- CSS reset -->
        <link rel="stylesheet" href="{{ asset('css/common/notify/style.css') }}"> 
        <link rel="stylesheet" href="{{ asset('css/common/slide/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profile/slidein/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profile/cookbook/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profile/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/common/profile/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" /> 

        <script>document.documentElement.className = 'js';</script>
        <script src="{{ asset('js/playlist/modernizr.js') }}"></script> <!-- Modernizr -->
    </head>

    <body>

      <svg class="hidden">
        <defs>
          <symbol id="icon-arrow-left" viewBox="0 0 32 32">
            <title>arrow-left</title>
            <path d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z"></path>
          </symbol>
          <symbol id="icon-arrow-right" viewBox="0 0 32 32">
            <title>arrow-right</title>
            <path d="M31.296 14.336l-9.888-9.888c-0.896-0.896-2.432-0.896-3.328 0s-0.896 2.432 0 3.328l5.824 5.856h-21.536c-1.312 0-2.368 1.056-2.368 2.368s1.056 2.368 2.368 2.368h21.568l-5.856 5.824c-0.896 0.896-0.896 2.432 0 3.328 0.48 0.48 1.088 0.704 1.696 0.704s1.216-0.224 1.696-0.704l9.824-9.824c0.448-0.448 0.704-1.056 0.704-1.696s-0.224-1.248-0.704-1.664z"></path>
          </symbol>
          <symbol id="icon-arrow" viewBox="0 0 24 24">
            <title>arrow</title>
            <polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
          </symbol>
          <symbol id="icon-drop" viewBox="0 0 48 48">
            <title>drop</title>
            <g class="nc-icon-wrapper" fill="#fff">
              <path data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M30,40 c0,3.3-2.7,6-6,6s-6-2.7-6-6" stroke-linejoin="miter"></path> 
              <path fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M38,26c0-5.1,0-10,0-10 c0-7.7-6.3-14-14-14S10,8.3,10,16c0,0,0,4.9,0,10c0,8-4,14-4,14h36C42,40,38,34,38,26z" stroke-linejoin="miter"></path>
            </g>
          </symbol>
          <symbol id="icon-search" viewBox="0 0 48 48">
            <title>search</title>
            <g class="nc-icon-wrapper" fill="#fff">
              <line data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="44" y1="44" x2="32.7" y2="32.7" stroke-linejoin="miter"></line> 
              <circle fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" cx="20" cy="20" r="18" stroke-linejoin="miter">
              </circle>
            </g>
          </symbol>
          <symbol id="icon-popular" viewBox="0 0 512 512">
            <title>popular</title>
            <path style="fill:#fff;" d="M97.103,353.103C97.103,440.86,168.244,512,256,512l0,0c87.756,0,158.897-71.14,158.897-158.897
              c0-88.276-44.138-158.897-14.524-220.69c0,0-47.27,8.828-73.752,79.448c0,0-88.276-88.276-51.394-211.862
              c0,0-89.847,35.31-80.451,150.069c8.058,98.406-9.396,114.759-9.396,114.759c0-79.448-62.115-114.759-62.115-114.759
              C141.241,247.172,97.103,273.655,97.103,353.103z"/>
            <path style="fill:#FFF;" d="M370.696,390.734c0,66.093-51.033,122.516-117.114,121.241
              c-62.188-1.198-108.457-48.514-103.512-110.321c2.207-27.586,23.172-72.276,57.379-117.517l22.805,13.793
              C229.517,242.023,256,167.724,256,167.724C273.396,246.007,370.696,266.298,370.696,390.734z"/>
            <path style="fill:#FFFFFF;" d="M211.862,335.448c-8.828,52.966-26.483,72.249-26.483,105.931C185.379,476.69,216.998,512,256,512
              l0,0c39.284,0,70.729-32.097,70.62-71.381c-0.295-105.508-61.792-158.136-61.792-158.136c8.828,52.966-17.655,79.448-17.655,79.448
              C236.141,345.385,211.862,335.448,211.862,335.448z"/>
          </symbol>
          <symbol id="icon-cross" viewBox="0 0 24 24" fill="#fff">
            <title>cross</title>
            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
          </symbol>
          <symbol id="icon-filter" viewBox="0 0 48 48">
            <title>filter</title>
            <g fill="#fff">
              <polyline data-cap="butt" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" points="8,18.5 8,44 20,44 20,34 28,34 28,44 40,44 40,18.5 " stroke-linejoin="miter" stroke-linecap="butt"></polyline> 
              <polyline data-cap="butt" data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" points="8,18 8,6 14,6 14,13.1 " stroke-linejoin="miter" stroke-linecap="butt"></polyline> 
              <rect data-color="color-2" x="20" y="18" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" width="8" height="8" stroke-linejoin="miter"></rect> 
              <polyline data-cap="butt" data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" points="2,24 24,4 46,24 " stroke-linejoin="miter" stroke-linecap="butt"></polyline>
            </g>
          </symbol>
        </defs>
      </svg>

      @yield('content')

      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js'></script>
      <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
      <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.js"></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script>
      <script src="{{ asset('js/profile/bubble/index.js') }}"></script>
      <script src="{{ asset('js/common/notify/main.js') }}"></script> <!-- Resource jQuery -->
      <script src="{{ asset('js/common/spinner/spinner.js') }}"></script>
      <script src="{{ asset('js/common/profile/classie.js') }}"></script>
      <script src="{{ asset('js/common/profile/main.js') }}"></script>
      <script src="{{ asset('js/common/search/index.js') }}"></script>
      <script src="{{ asset('js/common/slide/menu.js') }}"></script>
      <script src="{{ asset('js/profile/slidein/main.js') }}"></script>
      <script src="{{ asset('js/profile/cookbook/script.js') }}"></script>
      <!-- <script src="{{ asset('js/profile/index.js') }}"></script> -->
      <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

      <script>
        /**
         * Slide left instantiation and action.
         */
        var slideLeft = new Menu({
          wrapper: '#o-wrapper',
          type: 'slide-left',
          menuOpenerClass: '.c-button',
          maskId: '#c-mask'
        });

        var slideLeftBtn = document.querySelector('#c-button--slide-left');

        slideLeftBtn.addEventListener('click', function(e) {
          e.preventDefault;
          slideLeft.open();
        });

        /**
         * Slide right instantiation and action.
         */
        var slideRight = new Menu({
          wrapper: '#o-wrapper',
          type: 'slide-right',
          menuOpenerClass: '.c-button',
          maskId: '#c-mask'
        });

        var slideRightBtn = document.querySelector('#c-button--slide-right');

        slideRightBtn.addEventListener('click', function(e) {
          e.preventDefault;
          slideRight.open();
        });
      </script>
    </body>

</html>
