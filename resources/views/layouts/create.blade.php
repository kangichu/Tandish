<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tandish') }}</title>
  		<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
		<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Slabo+27px|Text+Me+One" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" />
		 <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

		<style>
			[x-cloak] {
				display: none;
			}

			[type="checkbox"] {
				box-sizing: border-box;
				padding: 0;
			}

			.form-checkbox,
			.form-radio {
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				-webkit-print-color-adjust: exact;
				color-adjust: exact;
				display: inline-block;
				vertical-align: middle;
				background-origin: border-box;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
				flex-shrink: 0;
				color: currentColor;
				background-color: #fff;
				border-color: #e2e8f0;
				border-width: 1px;
				height: 1.4em;
				width: 1.4em;
			}

			.form-checkbox {
				border-radius: 0.25rem;
			}

			.form-radio {
				border-radius: 50%;
			}

			.form-checkbox:checked {
				background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
				border-color: transparent;
				background-color: currentColor;
				background-size: 100% 100%;
				background-position: center;
				background-repeat: no-repeat;
			}
			
			.form-radio:checked {
				background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
				border-color: transparent;
				background-color: currentColor;
				background-size: 100% 100%;
				background-position: center;
				background-repeat: no-repeat;
			}
			.logo{
				position: fixed;
				z-index: 999;
				top: 3vh;
				left: 2.5em;
				height: 1.5em;
			}
			.velo-slider_hints > span {
				font-family: 'Open Sans Condensed', sans-serif;
				font-size: 0.8em;
				font-weight: 400;
				text-transform: uppercase;
				letter-spacing: 0.2em;
			}
			.velo-slider_hints {
				position: fixed;
				top: 0em;
				left: 5px;
				display: none;
				height: 100vh;
				width: 7vw;
				font-size: 2em;
				color: #446d97;
			}
			@media (min-width: 54em) {
				.velo-slider_hints {
					display: block;
				}
			}
			.velo-slider_hints > span {
				position: absolute;
				top: 50%;
				left: 50%;
				white-space: nowrap;
				-webkit-transform: translate(-50%, -50%) rotate(-90deg);
				      transform: translate(-50%, -50%) rotate(-90deg);
				overflow: hidden;
			}
			.velo-slider_hints > span > span {
				display: inline-block;
				-webkit-transform: translateY(-110%);
				      transform: translateY(-110%);
			}
			.velo-slider_hints > span > span {
				opacity: 1;
				top: 50%;
				transition: 1s cubic-bezier(0.19, 1, 0.22, 1);
				-webkit-transform: translateY(0%);
		        transform: translateY(0%);
					transition: 0.4 ease;
			}
			.row{
				display: flex;
				flex-direction: row;
				flex-wrap: wrap;
				justify-content: space-between;
			}
		</style>

	</head>
	<body>

        @yield('content')

		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		<script src="https://cdn.tiny.cloud/1/zp680jda2b8bpvfm22gsowqoloh8mereqhrkx4fl9kiwkyd1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script src="{{ asset('js/common/spinner/spinner.js') }}"></script>
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
			function app() {
				return {
					step: 1
				}
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
