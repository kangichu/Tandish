<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Tandish') }} | {{$user->name}}</title>


    <meta name="description" content="As the original description indicates, slick is a responsive carousel jQuery plugin that supports multiple breakpoints, CSS3 transitions, touch events/swiping, etc. We'd like to show how to make quickly custom styles for a slick slider." />
    <meta name="keywords" content="slick, animation, inspiration, javascript, html5, css3, carousel, slider" />
    <link rel="stylesheet" type="text/css" href="css/base.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
     <link rel='stylesheet prefetch' href="{{ asset('font/css/line-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Slabo+27px|Text+Me+One" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/playlist/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common/notify/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common/notify/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/playlist/search/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common/slide/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/recipe/slidein/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/profile/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" />
    
    <script>document.documentElement.className = 'js';</script>
    <script src="{{ asset('js/index/modernizr.js') }}"></script> <!-- Modernizr -->
  </head>
  
  <body>

    <svg class="hidden">
      <defs>
        <symbol id="icon-arrow-left" viewBox="0 0 32 32">
          <title>arrow-left</title>
          <path d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z"></path>
        </symbol>
        <symbol id="icon-chat" viewBox="0 0 593.915 593.916">
          <title>chat</title>
          <g fill="#fff">
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
        <symbol id="icon-cross" viewBox="0 0 24 24">
          <title>cross</title>
          <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
        </symbol>
        <symbol id="icon-bookmark" viewBox="0 0 512 512">
          <title>cross</title>
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
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    
    <script src="{{ asset('js/playlist/demo.js') }}"></script>
    <script src="{{ asset('js/common/spinner/spinner.js') }}"></script>
    <script src="{{ asset('js/common/profile/classie.js') }}"></script>
    <script src="{{ asset('js/common/profile/main.js') }}"></script>
    <script src="{{ asset('js/common/notify/main.js') }}"></script>
    <script src="{{ asset('js/recipe/slidein/main.js') }}"></script>
    <script src="{{ asset('js/playlist/search/index.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/common/slide/menu.js') }}"></script>
    <script>

        /**
           * Slide bottom instantiation and action.
           */
          var slideBottom = new Menu({
            wrapper: '#o-wrapper',
            type: 'slide-bottom',
            menuOpenerClass: '.c-button',
            maskId: '#c-mask'
          });

          var slideBottomBtn = document.querySelector('#c-button--slide-bottom');
          
          slideBottomBtn.addEventListener('click', function(e) {
            e.preventDefault;
            slideBottom.open();
          });


        

   </script>
  </body>
</html>