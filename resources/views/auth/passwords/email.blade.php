
@extends('layouts.tandish')

@section('content')

<section class="container">
    <article class="half">
        <h1>Tandish</h1>
        <p style="text-align: center; font-size: 0.8em;">This is a POC site that's still under development, therefore all data <br><br>uploaded will be subject to permanent deletion once complete.</p><br><br>
        <div class="tabs">
            @if (session('status'))
                <div class="alert alert-success" role="alert" style="text-align: center; font-size: 0.8em;">
                    {{ session('status') }}
                </div><br><br>
            @endif
        </div>
        <div class="content">
            <div class="signin-cont cont">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <input type="email" name="email" id="email" class="inpt @error('email') is-invalid @enderror" placeholder="Your email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                    <div class="submit-wrap">
                        <input type="submit" value="Send Password Reset Link" class="submit">
                       
                    </div>
                </form>
            </div>
        </div>
    </article>
</section>

@endsection
