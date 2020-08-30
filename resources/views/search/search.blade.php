
@extends('layouts.search')

	@section('content')
	<main role="main" id="o-wrapper"  class="o-wrapper main-wrap">
		<div class="bottom_nav">
            @include('inc.nav')
        </div>

        @include('inc.createrecipe')

        @if(count($posts) > 0)

			<section class="intro-section">
			  <h1 class="intro-heading">Search Results</h1>

			  <p>Here are the results that closely match what you wanted. <br><br>{{ $postCount}} results</p>
			</section>

			@foreach($posts as $key=> $post)
				<!-- Photos via Unsplash Source https://source.unsplash.com/ -->
				<section class="content-section" data-scroll>
				  <figure class="figure"><img src="/storage/cover_images/{{$post->cover_image}}" /></figure>
				  <div class="content">
				    <header class="header">
				      <div class="subheading"><a href="/p/{{$post->user->id}}" style="color: #fff; text-decoration: none;">{{$post->user->name}}</a></div>
				      <h2 class="heading">{!!$post->title!!}</h2>
				    </header>
				    <p class="paragraph">
				     	{{$post->body}}<br>
		              	<small style="letter-spacing: 0 !important">Published {{$post->updated_at->diffForHumans()}}</small><br /><br />
		              	 <span class="playlist"><a href="/cookbook" style="color: #fff">COOKBOOK</a> 
		              	 </span><br />
		              	<span class="others-two"><i class="las la-utensils"></i><i class="las la-utensils"></i><i class="las la-utensils"></i><i class="las la-utensils"></i>  28 people have tried this recipe </span><br><br>
				      	<a href="/r/{{$post->id}}" class="link_btn">Make This Dish</a>
				    </p>
				  </div>
				</section>
			@endforeach

		@else
            <section class="intro-section">
			  <h1 class="intro-heading">Search Results</h1>

			  <p>There were no recipes with that search term. Please try something else. <br><br>{{ $postCount}} results</p>
			</section>
        @endif

		<!-- search -->
        @include('inc.search')
        <!-- /search -->
	</main>

    @include('inc.profile')

    @include('inc.notification')

    <nav id="c-menu--push-right" class="c-menu c-menu--push-right">
      <button class="c-menu__close"><i class="las la-angle-right"></i></button>
      <!--<span class="in-popular">Popular</span> -->  
    </nav><!-- /c-menu slide-top -->

    <nav id="c-menu--slide-right" class="c-menu c-menu--slide-right">
      <button class="c-menu__close"><i class="las la-angle-right"></i></button>
    </nav><!-- /c-menu push-top -->

    <nav id="c-menu--slide-left" class="c-menu c-menu--slide-left">
      <button class="c-menu__close"><i class="las la-angle-left"></i></button>
    </nav><!-- /c-menu slide-left -->

    <nav id="c-menu--push-left" class="c-menu c-menu--push-left">
      <span class="c-menu__close"><i class="las la-angle-left"></i></span>
      <h1 class="profUser">{{ Auth::user()->name }}</h1>
    </nav><!-- /c-menu push-left -->

    <div id="c-mask" class="c-mask"></div><!-- /c-mask -->
	    

@endsection
