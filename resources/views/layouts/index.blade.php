<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tandish') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Slabo+27px|Text+Me+One" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:400,700'>
    <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:300,400,600'>
    <link rel='stylesheet prefetch' href="{{ asset('font/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/slide/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index/slidein/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/search/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/popular/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/notify/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/profile/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" />
    <link href="{{ asset('css/common/inputs/style.css') }}" rel="stylesheet">
    <script>document.documentElement.className = 'js';</script>
      <script src="{{ asset('js/index/modernizr.js') }}"></script> <!-- Modernizr -->
</head>

  <body>

    <svg class="hidden">
      <defs>
        <symbol id="icon-arrow" viewBox="0 0 24 24">
          <title>arrow</title>
          <polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
        </symbol>
        <symbol id="icon-chat" viewBox="0 0 593.915 593.916">
          <title>chat</title>
          <g  fill="#fff">
            <g>
              <path d="M486.354,208.612c-0.327,0.336-0.728,0.877-1.236,1.562c-2.326,3.062-4.942,6.115-7.904,9.118
                c-9.268,8.396-21.188,14.229-22.605,14.887c-3.616,1.536-7.724,3.026-11.994,4.216v0.009c0,0-11.521,2.131-16.554,14.056
                l-11.067,26.358l-49.881,136.393l-5.833,18.566c-0.927,2.708-4.816,11.34-17.209,11.34h-89.056
                c-11.148,0-15.137-8.45-16.036-10.758l-50.032-138.587l-17.508-43.625c0,0,0,0,0-0.027c-3.907-9.754-16.55-13.992-16.55-13.992
                l0.027-0.014c-1.544-0.582-3.144-1.236-4.838-2.008l-0.055,0.045c0,0-0.877-0.391-2.376-1.19
                c-0.323-0.136-0.604-0.336-0.936-0.509c-11.902-6.469-52.112-32.491-39.664-83.795c7.323-25.926,38.283-42.408,74.059-37.875
                c1.677,0.177,3.407,0.427,5.193,0.745c0.5,0.091,1.013,0.213,1.517,0.305c0.827,0.168,1.699,0.399,2.54,0.586l0.082-0.037
                c0,0,12.143,3.099,16.841-7.014c0.009-0.036,0.036-0.055,0.054-0.104c8.922-21.256,33.872-67.04,85.625-74.468
                c34.14-3.703,70.429,18.294,87.493,33.922c0.309,0.309,8.74,8.005,21.951,7.101c0.055,0,0.091,0.009,0.127,0
                c23.605-1.862,72.124,3.639,99.109,72.896C503.089,155.728,505.415,182.385,486.354,208.612L486.354,208.612z M418.027,44.512
                c-1.145,0-2.308,0.082-3.416,0.127c-0.219-0.009-0.346-0.045-0.563-0.055c-14.52-0.427-19.226-6.296-19.226-6.296
                s-0.073,0.063-0.091,0.091C371.181,14.673,338.762,0,302.896,0c-51.663,0-96.242,30.442-117.408,74.477
                c-0.141,0.223-0.241,0.382-0.364,0.627c-4.697,8.723-11.417,9.104-14.642,8.705c-0.618-0.091-1.186-0.268-1.799-0.341
                l-0.073-0.018v0.009c-3.934-0.541-7.937-0.84-12.029-0.84c-49.609,0-89.905,40.828-89.905,91.095
                c0,42.863,29.316,78.815,68.671,88.456l-0.027,0.082c0,0,0.363,0.027,0.868,0.141c0.536,0.109,1.041,0.304,1.59,0.391
                c3.357,1.041,9.431,4.129,12.83,13.434c0,0,0,0,0,0.027l63.61,174.035c0,0,5.37,16.301,23.36,16.301h116.958
                c15.9,0,22.46-10.122,24.877-15.573l1.235-3.38l0.037-0.019l0,0L444.74,272.39c0,0,3.634-9.581,14.882-15.033
                c0.272-0.141,0.382-0.254,0.618-0.363c39.378-16.759,66.999-56.019,66.999-101.871C527.239,94.08,478.412,44.512,418.027,44.512
                L418.027,44.512z"/>
              <path d="M284.351,558.746c-1.854-17.354-17.463-29.966-34.817-28.13c-6.915,0.781-13.147,3.688-17.809,8.068
                c-3.498,2.217-7.023,5.615-10.68,10.14c-11.499,13.883-29.37,39.105-54.779,30.619c-0.114-0.018-0.141,0.091-0.255,0.055
                c-7.105-1.472-2.081,2.998-0.472,4.343c14.951,10.849,32.182,15.974,51.785-0.454c0.104-0.072,0.159-0.055,0.272-0.127
                c5.896-4.144,9.967-1.908,12.03-0.019c0.391,0.455,0.781,0.891,1.208,1.309c0.19,0.272,0.336,0.454,0.336,0.454l-0.036-0.199
                c6.496,6.215,15.519,9.776,25.122,8.74C273.584,591.672,286.168,576.063,284.351,558.746L284.351,558.746z"/>
              <path d="M427.004,580.479v-0.036c-23.732,5.434-40.56-18.336-51.553-31.619c-3.653-4.524-7.179-7.923-10.667-10.14
                c-4.67-4.38-10.885-7.287-17.809-8.068c-17.336-1.817-32.968,10.775-34.794,28.13c-1.872,17.317,10.771,32.927,28.089,34.799
                c9.812,1.018,19.08-2.635,25.567-9.141l0.072,0.055c0,0,0.055-0.109,0.109-0.163c0.291-0.291,0.509-0.618,0.781-0.927
                c1.617-1.563,5.651-3.798,13.593,1.071c0.218,0.146,0.236,0.109,0.437,0.219c17.354,13.538,32.781,10.395,46.41,1.689
                C437.162,578.807,427.004,580.479,427.004,580.479L427.004,580.479z"/>
            </g>
          </g>
        </symbol>
        <symbol id="icon-pencil" viewBox="0 0 48 48">
          <title>pencil</title>
          <g class="nc-icon-wrapper" fill="#fff"><line data-cap="butt" data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" x1="6" y1="32" x2="16" y2="42" stroke-linejoin="miter" stroke-linecap="butt"></line> <line data-cap="butt" data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" x1="11" y1="37" x2="31" y2="17" stroke-linejoin="miter" stroke-linecap="butt"></line> <line data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="30" y1="8" x2="40" y2="18" stroke-linejoin="miter"></line> <line data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="26" y1="12" x2="36" y2="22" stroke-linejoin="miter"></line> <path fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M16,42L4,44l2-12L33.2,4.8 c1.6-1.6,4.1-1.6,5.7,0l4.3,4.3c1.6,1.6,1.6,4.1,0,5.7L16,42z" stroke-linejoin="miter"></path></g>
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
        <symbol id="icon-cross" viewBox="0 0 24 24">
          <title>cross</title>
          <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
        </symbol>
        <symbol id="icon-filter" viewBox="0 0 48 48">
          <title>filter</title>
          <g class="nc-icon-wrapper" fill="#fff">
            <path data-cap="butt" data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" d="M7.4,38.5 c4-4.6,10-7.5,16.6-7.5c6.6,0,12.5,2.9,16.5,7.5" stroke-linejoin="miter" stroke-linecap="butt"></path> 
            <path data-cap="butt" data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" d="M7.4,9.5c4,4.6,10,7.5,16.6,7.5 c6.6,0,12.5-2.9,16.5-7.5" stroke-linejoin="miter" stroke-linecap="butt"></path> 
            <path data-cap="butt" data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" d="M24,46c7.8-3.7,12-12.2,12-22 S31.8,5.7,24,2" stroke-linejoin="miter" stroke-linecap="butt"></path> 
            <path data-cap="butt" data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" d="M24,46c-7.8-3.7-12-12.2-12-22 S16.2,5.7,24,2" stroke-linejoin="miter" stroke-linecap="butt"></path> 
            <polyline data-cap="butt" data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" points="24,46 24,44 24,4 24,2 " stroke-linejoin="miter" stroke-linecap="butt"></polyline> 
            <line data-cap="butt" data-color="color-2" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" x1="2" y1="24" x2="46" y2="24" stroke-linejoin="miter" stroke-linecap="butt"></line> 
            <circle fill="none" stroke="#fff" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" cx="24" cy="24" r="22" stroke-linejoin="miter"></circle>
          </g>
        </symbol>
      </defs>
    </svg>

    @yield('content')
      
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.3.0/velocity.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.3.0/velocity.ui.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script>
    <script src="{{ asset('js/index/index.js') }}"></script>
    <script src="{{ asset('js/common/profile/classie.js') }}"></script>
    <script src="{{ asset('js/common/profile/main.js') }}"></script>
    <script src="{{ asset('js/common/slide/menu.js') }}"></script>
    <script src="{{ asset('js/common/search/index.js') }}"></script>
    <script src="{{ asset('js/index/slidein/main.js') }}"></script>
    <script src="{{ asset('js/common/notify/main.js') }}"></script>
    <script src="{{ asset('js/common/spinner/spinner.js') }}"></script>
    <script src="{{ asset('js/common/popular/index.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
      
      /**
       * Push right instantiation and action.
       */
      var pushRight = new Menu({
        wrapper: '#o-wrapper',
        type: 'push-right',
        menuOpenerClass: '.c-button',
        maskId: '#c-mask'
      });

      var pushRightBtn = document.querySelector('#c-button--push-right');
      
      pushRightBtn.addEventListener('click', function(e) {
        e.preventDefault;
        pushRight.open();
      });

       /**
      * Push left instantiation and action.
      */
      var pushLeft = new Menu({
        wrapper: '#o-wrapper',
        type: 'push-left',
        menuOpenerClass: '.c-button',
        maskId: '#c-mask'
      });

      var pushLeftBtn = document.querySelector('#c-button--push-left');
      
      pushLeftBtn.addEventListener('click', function(e) {
        e.preventDefault;
        pushLeft.open();
      });

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
