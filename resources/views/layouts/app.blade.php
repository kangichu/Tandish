<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tandish') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Slabo+27px|Text+Me+One" rel="stylesheet">
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
        <style type="text/css">
            .coverDisplay {
                vertical-align: middle;
                border-style: none;
                width: 100%;
                margin: 1em auto;
                height: 100%;
                background-position: 50%;
                background-repeat: no-repeat;
                background-size: cover;
            }
            input, button, select, optgroup, textarea {
                margin: 0;
                width: 100%;
                font-family: inherit;
                font-size: inherit;
                line-height: inherit;
            }
        </style>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/common/inputs/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <img src="{{ asset('logo.svg') }}" height="20px">&nbsp;
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Tandish') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script src="https://cdn.tiny.cloud/1/zp680jda2b8bpvfm22gsowqoloh8mereqhrkx4fl9kiwkyd1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea',
                max_chars: 600, // max. allowed chars
                height: 300,
                menubar:false,
                plugins: [
                     "advlist autolink lists"
                ],
                rel_list: [{ title: 'NoFollow', value: 'nofollow' }],
                toolbar: "code|undo redo | fontselect fontsizeselect |styleselect | bold italic | bullist numlist outdent indent",
                formats: {
                    bold : {inline : 'b' },  
                    italic : {inline : 'i' },
                    underline : {inline : 'u'}
                },
                setup: function (ed) {
                    var allowedKeys = [8, 37, 38, 39, 40, 46]; // backspace, delete and cursor keys
                    ed.on('keydown', function (e) {
                        if (allowedKeys.indexOf(e.keyCode) != -1) return true;
                        if (tinymce_getContentLength() + 1 > this.settings.max_chars) {
                            e.preventDefault();
                            e.stopPropagation();
                            return false;
                        }
                        return true;
                    });
                    ed.on('keyup', function (e) {
                        tinymce_updateCharCounter(this, tinymce_getContentLength());
                    });
                },
                init_instance_callback: function () { // initialize counter div
                    $('#' + this.id).prev().append('<div class="char_count" style="text-align:right"></div>');
                    tinymce_updateCharCounter(this, tinymce_getContentLength());
                },
                paste_preprocess: function (plugin, args) {
                    var editor = tinymce.get(tinymce.activeEditor.id);
                    var len = editor.contentDocument.body.innerText.length;
                    var text = $(args.content).text();
                    if (len + text.length > editor.settings.max_chars) {
                        alert('Pasting this exceeds the maximum allowed number of ' + editor.settings.max_chars + ' characters.');
                        args.content = '';
                    } else {
                        tinymce_updateCharCounter(editor, len + text.length);
                    }
                }
            });

            function tinymce_updateCharCounter(el, len) {
                $('#' + el.id).prev().find('.char_count').text(len + '/' + el.settings.max_chars);
            }

            function tinymce_getContentLength() {
                return tinymce.get(tinymce.activeEditor.id).contentDocument.body.innerText.length;
            }
        </script>
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                  URL.revokeObjectURL(output.src) // free memory
                }
            };
        </script>
    </body>
</html>
