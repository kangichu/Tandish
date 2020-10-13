@extends('layouts.tandish')

@section('content')

<section class="container">
    <article class="half">
        <h1>Tandish</h1>
        <p style="text-align: center; font-size: 0.8em;">This is a POC site that's still under development, therefore all data <br><br>uploaded will be subject to permanent deletion once complete.</p>
        <div class="tabs">
            <span class="tab signin active"><a href="#signin">Sign in</a></span>
            <span class="tab signup"><a href="#signup">Sign up</a></span>
        </div>
        <div class="content">
            <div class="signin-cont cont">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @error('login')
                        <span class="alert alert-warning alert-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    <br><br><br>
                    @enderror
                    <div>
                        <input type="email" name="email" id="email" class="inpt @error('email') is-invalid @enderror"placeholder="Your email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">{{ __('E-Mail Address') }}</label>
                       @error('email')
                       <br>
                            <span class="alert alert-warning alert-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        <br><br><br> 
                        @enderror
                    </div>
                    <div>
                       <input type="password" name="password" id="password" class="inpt @error('password') is-invalid @enderror" name="password" placeholder="Your password" required autocomplete="current-password">              
                       <label for="password">{{ __('Password') }}</label>
                    </div>

                    <input type="checkbox" id="remember" class="checkbox" name="remember" 
                    {{ old('remember') ? 'checked' : '' }}>
                   
                    <label for="remember">{{ __('Remember Me') }}</label>
                    <div class="submit-wrap">
                        <input type="submit" value="Sign in" class="submit">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" class="more" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
	        </div>
	        <div class="signup-cont cont">
                <div class="text-gray-600 mt-2 mb-4">
                    What best describes you?
                </div>
                <div class="user">
                    <div class="radio" data-id="1">
                        <input id="checkbox1" name="radioinput" class="radioinput" type="radio" checked> 
                        <p for="password" class="check font-bold mb-1 text-gray-700 block">
                        <i class="las la-utensils"></i> User</p>
                    </div><br>

                    <div class="radio" data-id="2">
                        <input id="checkbox2" name="radioinput" class="radioinput" type="radio"> 
                        <p for="password" class="check font-bold mb-1 text-gray-700 block">
                        <i class="las la-store-alt"></i> Vendor</p>
                    </div>
                </div><br>

                <div class="first">
                   <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf

                        <div>
                            <input id="name" type="text" class="inpt @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Full Name" autofocus>
                            <label for="name">Your name</label>
                            @error('name')
                            <br>
                                <span class="alert alert-warning alert-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>\
                            <br><br><br>
                            @enderror
                        </div>
                        
                        <div>
                            <input id="email" type="email" class="inpt @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                            <label for="email">Your email</label>
                            @error('email')
                            <br>
                                <span class="alert alert-warning alert-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            <br><br><br>
                            @enderror
                        </div>

                        <div class="mb-5" x-data="app()">
                            <p for="password" class="font-bold mb-1 text-gray-700 block">Set up password</p>
                            <div class="text-gray-600 mt-2 mb-4">
                                <label for="password">Set up password</label>
                                Please create a secure password including the following criteria below.

                                <ul class="list-disc text-sm ml-4 mt-2">
                                    <li>lowercase letters</li>
                                    <li>numbers</li>
                                    <li>capital letters</li>
                                    <li>special characters</li>
                                    <li>must be at least 5 characters</li>
                                </ul>   
                            </div>

                            <div class="relative">
                                <input
                                    :type="togglePassword ? 'text' : 'password'"
                                    @keydown="checkPasswordStrength()"
                                    x-model="password"
                                    class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                    placeholder="Your strong password..."
                                    class="inpt @error('password') is-invalid @enderror" 
                                    name="password" 
                                    id="password"
                                    required 
                                    autocomplete="new-password"                                >

                                <div class="absolute right-0 bottom-0 top-0 px-3 py-3 cursor-pointer" 
                                    @click="togglePassword = !togglePassword"
                                >   
                                    <svg :class="{'hidden': !togglePassword, 'block': togglePassword }" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-gray-500" viewBox="0 0 24 24"><path d="M12 19c.946 0 1.81-.103 2.598-.281l-1.757-1.757C12.568 16.983 12.291 17 12 17c-5.351 0-7.424-3.846-7.926-5 .204-.47.674-1.381 1.508-2.297L4.184 8.305c-1.538 1.667-2.121 3.346-2.132 3.379-.069.205-.069.428 0 .633C2.073 12.383 4.367 19 12 19zM12 5c-1.837 0-3.346.396-4.604.981L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.319-3.319c2.614-1.951 3.547-4.615 3.561-4.657.069-.205.069-.428 0-.633C21.927 11.617 19.633 5 12 5zM16.972 15.558l-2.28-2.28C14.882 12.888 15 12.459 15 12c0-1.641-1.359-3-3-3-.459 0-.888.118-1.277.309L8.915 7.501C9.796 7.193 10.814 7 12 7c5.351 0 7.424 3.846 7.926 5C19.624 12.692 18.76 14.342 16.972 15.558z"/></svg>

                                    <svg :class="{'hidden': togglePassword, 'block': !togglePassword }" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-gray-500" viewBox="0 0 24 24"><path d="M12,9c-1.642,0-3,1.359-3,3c0,1.642,1.358,3,3,3c1.641,0,3-1.358,3-3C15,10.359,13.641,9,12,9z"/><path d="M12,5c-7.633,0-9.927,6.617-9.948,6.684L1.946,12l0.105,0.316C2.073,12.383,4.367,19,12,19s9.927-6.617,9.948-6.684 L22.054,12l-0.105-0.316C21.927,11.617,19.633,5,12,5z M12,17c-5.351,0-7.424-3.846-7.926-5C4.578,10.842,6.652,7,12,7 c5.351,0,7.424,3.846,7.926,5C19.422,13.158,17.348,17,12,17z"/></svg>
                                </div>
                            </div>
                            
                            <div class="flex items-center mt-4 h-3">
                                <div class="w-2/3 flex justify-between h-2">    
                                    <div :class="{ 'bg-red-400': passwordStrengthText == 'Too weak' ||  passwordStrengthText == 'Could be stronger' || passwordStrengthText == 'Strong password' }" class="h-2 rounded-full mr-1 w-1/3 bg-gray-300"></div>
                                    <div :class="{ 'bg-orange-400': passwordStrengthText == 'Could be stronger' || passwordStrengthText == 'Strong password' }" class="h-2 rounded-full mr-1 w-1/3 bg-gray-300"></div>
                                    <div :class="{ 'bg-green-400': passwordStrengthText == 'Strong password' }" class="h-2 rounded-full w-1/3 bg-gray-300"></div>
                                </div>
                                <div x-text="passwordStrengthText" class="text-gray-500 font-medium text-sm ml-3 leading-none"></div>
                            </div>

                            @error('password')
                            <br>
                                <span class="alert alert-warning alert-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            <br><br><br>
                            @enderror
                        </div>

                        <div>
                            <input id="password-confirm" type="password" class="inpt" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            <label for="password">{{ __('Confirm Password') }}</label>
                        </div>

                       <div class="submit-wrap">
                            <input type="submit" value="Sign up" class="submit">
                            <a href="/terms_and_conditions" class="more">Terms and conditions</a>
                        </div><br>
                    </form> 
                </div>

                <div class="second">

                    <h2 style="font-size: 3em; text-align: right; padding-top: .5em;">Coming Soon!</h2>
                    <div style="display: none; visibility: hidden;">
                        <form method="POST" autocomplete="off">
                            @csrf

                            <div>
                                <input id="name" type="text" class="inpt @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Full Name" autofocus>
                                <label for="name">Your name</label>
                                @error('name')
                                <br>
                                    <span class="alert alert-warning alert-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>\
                                <br><br><br>
                                @enderror
                            </div>
                            
                            <div>
                                <input id="email" type="email" class="inpt @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                <label for="email">Your email</label>
                                @error('email')
                                <br>
                                    <span class="alert alert-warning alert-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                <br><br><br>
                                @enderror
                            </div>

                            <div>
                                <div>
                                    <input id="mobile" type="mobile" class="inpt" name="mobile" autocomplete="mobile" placeholder="Phone Number">
                                </div>

                                <div>
                                    <div class="text-gray-600 mt-2 mb-4">
                                        What area is your business located?
                                    </div>
                                    <select id="cars" name="cars" class="inpt @error('email') is-invalid @enderror">
                                        <option value="volvo">Please select Location</option>
                                        <option value='Baringo'>Baringo</option>
                                        <option value='Bomet'>Bomet</option>
                                        <option value='Bungoma'>Bungoma</option>
                                        <option value='Busia'>Busia</option>
                                        <option value='Elgeyo-Marakwet'>Elgeyo-Marakwet</option>
                                        <option value='Embu'>Embu</option>
                                        <option value='Garissa'>Garissa</option>
                                        <option value='Homa Bay'>Homa Bay</option>
                                        <option value='Isiolo'>Isiolo</option>
                                        <option value='Kajiado'>Kajiado</option>
                                        <option value='Kakamega'>Kakamega</option>
                                        <option value='Kericho'>Kericho</option>
                                        <option value='Kiambu'>Kiambu</option>
                                        <option value='Kilifi'>Kilifi</option>
                                        <option value='Kirinyaga'>Kirinyaga</option>
                                        <option value='Kisii'>Kisii</option>
                                        <option value='Kisumu'>Kisumu</option>
                                        <option value='Kitui'>Kitui</option>
                                        <option value='Kwale'>Kwale</option>
                                        <option value='Laikipia'>Laikipia</option>
                                        <option value='Lamu'>Lamu</option>
                                        <option value='Machakos'>Machakos</option>
                                        <option value='Makueni'>Makueni</option>
                                        <option value='Mandera'>Mandera</option>
                                        <option value='Marsabit'>Marsabit</option>
                                        <option value='Meru'>Meru</option>
                                        <option value='Migori'>Migori</option>
                                        <option value='Mombasa'>Mombasa</option>
                                        <option value='Murang'>Murang'a</option>
                                        <option value='Nairobi City'>Nairobi City</option>
                                        <option value='Nakuru'>Nakuru</option>
                                        <option value='Nandi'>Nandi</option>
                                        <option value='Narok'>Narok</option>
                                        <option value='Nyamira'>Nyamira</option>
                                        <option value='Nyandarua'>Nyandarua</option>
                                        <option value='Nyeri'>Nyeri</option>
                                        <option value='Samburu'>Samburu</option>
                                        <option value='Siaya'>Siaya</option>
                                        <option value='Taita-Taveta'>Taita-Taveta</option>
                                        <option value='Tana River'>Tana River</option>
                                        <option value='Tharaka-Nithi'>Tharaka-Nithi</option>
                                        <option value='Trans Nzoia'>Trans Nzoia</option>
                                        <option value='Turkana'>Turkana</option>
                                        <option value='Uasin Gishu'>Uasin Gishu</option>
                                        <option value='Vihiga'>Vihiga</option>
                                        <option value='West Pokot'>West Pokot</option>
                                        <option value='wajir'>wajir</option>
                                    </select>
                                </div><br>
                            </div>    
                                
                            <div class="mb-5" x-data="app()">
                                <p for="password" class="font-bold mb-1 text-gray-700 block">Set up password</p>
                                <div class="text-gray-600 mt-2 mb-4">
                                    <label for="password">Set up password</label>
                                    Please create a secure password including the following criteria below.

                                    <ul class="list-disc text-sm ml-4 mt-2">
                                        <li>lowercase letters</li>
                                        <li>numbers</li>
                                        <li>capital letters</li>
                                        <li>special characters</li>
                                        <li>must be at least 5 characters</li>
                                    </ul>   
                                </div>

                                <div class="relative">
                                    <input
                                        :type="togglePassword ? 'text' : 'password'"
                                        @keydown="checkPasswordStrength()"
                                        x-model="password"
                                        class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                        placeholder="Your strong password..."
                                        class="inpt @error('password') is-invalid @enderror" 
                                        name="password" 
                                        id="password"
                                        required 
                                        autocomplete="new-password"                                >

                                    <div class="absolute right-0 bottom-0 top-0 px-3 py-3 cursor-pointer" 
                                        @click="togglePassword = !togglePassword"
                                    >   
                                        <svg :class="{'hidden': !togglePassword, 'block': togglePassword }" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-gray-500" viewBox="0 0 24 24"><path d="M12 19c.946 0 1.81-.103 2.598-.281l-1.757-1.757C12.568 16.983 12.291 17 12 17c-5.351 0-7.424-3.846-7.926-5 .204-.47.674-1.381 1.508-2.297L4.184 8.305c-1.538 1.667-2.121 3.346-2.132 3.379-.069.205-.069.428 0 .633C2.073 12.383 4.367 19 12 19zM12 5c-1.837 0-3.346.396-4.604.981L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.319-3.319c2.614-1.951 3.547-4.615 3.561-4.657.069-.205.069-.428 0-.633C21.927 11.617 19.633 5 12 5zM16.972 15.558l-2.28-2.28C14.882 12.888 15 12.459 15 12c0-1.641-1.359-3-3-3-.459 0-.888.118-1.277.309L8.915 7.501C9.796 7.193 10.814 7 12 7c5.351 0 7.424 3.846 7.926 5C19.624 12.692 18.76 14.342 16.972 15.558z"/></svg>

                                        <svg :class="{'hidden': togglePassword, 'block': !togglePassword }" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-gray-500" viewBox="0 0 24 24"><path d="M12,9c-1.642,0-3,1.359-3,3c0,1.642,1.358,3,3,3c1.641,0,3-1.358,3-3C15,10.359,13.641,9,12,9z"/><path d="M12,5c-7.633,0-9.927,6.617-9.948,6.684L1.946,12l0.105,0.316C2.073,12.383,4.367,19,12,19s9.927-6.617,9.948-6.684 L22.054,12l-0.105-0.316C21.927,11.617,19.633,5,12,5z M12,17c-5.351,0-7.424-3.846-7.926-5C4.578,10.842,6.652,7,12,7 c5.351,0,7.424,3.846,7.926,5C19.422,13.158,17.348,17,12,17z"/></svg>
                                    </div>
                                </div>
                                
                                <div class="flex items-center mt-4 h-3">
                                    <div class="w-2/3 flex justify-between h-2">    
                                        <div :class="{ 'bg-red-400': passwordStrengthText == 'Too weak' ||  passwordStrengthText == 'Could be stronger' || passwordStrengthText == 'Strong password' }" class="h-2 rounded-full mr-1 w-1/3 bg-gray-300"></div>
                                        <div :class="{ 'bg-orange-400': passwordStrengthText == 'Could be stronger' || passwordStrengthText == 'Strong password' }" class="h-2 rounded-full mr-1 w-1/3 bg-gray-300"></div>
                                        <div :class="{ 'bg-green-400': passwordStrengthText == 'Strong password' }" class="h-2 rounded-full w-1/3 bg-gray-300"></div>
                                    </div>
                                    <div x-text="passwordStrengthText" class="text-gray-500 font-medium text-sm ml-3 leading-none"></div>
                                </div>

                                @error('password')
                                <br>
                                    <span class="alert alert-warning alert-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                <br><br><br>
                                @enderror
                            </div>

                            <div>
                                <input id="password-confirm" type="password" class="inpt" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                <label for="password">{{ __('Confirm Password') }}</label>
                            </div>

                           <div class="submit-wrap">
                                <input type="submit" value="Sign up" class="submit">
                                <a href="/terms_and_conditions" class="more">Terms and conditions</a>
                            </div><br>
                        </form> 
                            
                    </div>
                   
                </div>
        			
			</div>
        </div>
    </article>
</section>

@endsection