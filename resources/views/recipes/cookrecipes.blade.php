@extends('layouts.cookrecipes')

@section('content')

    <main role="main" id="o-wrapper"  class="o-wrapper main-wrap">
        <div class="bottom_nav">
            @include('inc.nav')
        </div>

        @include('inc.createrecipe')


        <!-- Slider -->
        <section class="velo-slides" data-velo-slider="on" data-velo-theme="light">
            <!-- Slide -->
            @if(!Auth::guest())
              @if(Auth::user()->id != $cookbook->user_id)
                 <span class="back" title="Back To {{$cookbook->user->name}}'s Cookbook"><a href="/cookbook/{{$cookbook->id}}"><i class="las la-arrow-left"></i></a></span>
              @else
                <span class="back" title="Back To My Cookbook"><a href="/cookbook/{{$cookbook->id}}"><i class="las la-arrow-left"></i></a></span>
              @endif
            @endif

            @if(count($posts) > 0)

              @foreach($posts as $post)

                <section class="velo-slide">
                  <!-- Pretitle Hint -->
                  <span class="velo-slider__hint"><span><span>
                    @if(!Auth::guest())
                      @if(Auth::user()->id != $cookbook->user_id)
                         {{$cookbook->user->name}}'s Recipes
                      @else
                        My Recipes
                      @endif
                    @endif
                  </span></span></span> <!-- Slide BG -->
                  <div class="velo-slide__bg">
                    <!-- Borders -->
                    <span class="border"><span></span></span> <!-- Img -->
                    <figure class="velo-slide__figure" style="background-image: url(/storage/cover_images/{{$post->cover_image}})"></figure>
                  </div>

                  <!-- Header -->
                  <header class="velo-slide__header">
                    <h3 class="velo-slide__title">
                      <span class="oh">
                        <span class="name">
                         &nbsp;
                        </span><br />
                        <span class="postTitle">{!!$post->title!!}</span>
                      </span>
                    </h3>
                    <p class="velo-slide__text">
                      <span class="oh">
                        <span>
                          {{$post->body}}<br />
                          <small style="letter-spacing: 0 !important">Published {{$post->updated_at->diffForHumans()}}</small><br />
                          @if($post->cookbook_id)
                            <span class="playlist"><a href="/cookbook/{{$post->cookbook_id}}" style="color: #fff">COOKBOOK</a> </span><br />
                          @endif
                          <!-- <span class="others-two"><i class="las la-utensils"></i><i class="las la-utensils"></i><i class="las la-utensils"></i><i class="las la-utensils"></i>  28 people have tried this recipe </span> -->
                          @if(!Auth::guest())
                            @if(Auth::user()->id == $cookbook->user_id)
                            <span class="d-flex">
                              <span ><a href="/r/{{$post->id}}/edit" style="padding-right: .5em; border-right: 1px solid #fff;font-size: .8em; color: #fff !important; text-decoration: none">Edit</a></span>
                              <span ><a href="#" style="padding-left: .3em; font-size: .8em; color: #fff !important; text-decoration: none">Delete</a></span>
                            </span>
                            @endif
                          @endif
                        </span>
                      </span>
                    </p>
                    <span class="velo-slide__btn">
                      <a class="btn-draw btn--white" href="/r/{{$post->id}}">
                        <span class="btn-draw__text"><span>Make This Dish</span></span>
                      </a> 

                     <!--  <a class="btn-draw btn--white" href="#">
                        <span class="btn-draw__text" data-toggle="modal" data-target=".bd-{{$post->id}}"><span>Make This Dish</span></span>
                      </a> -->
                    </span>
                    
                  </header>
                </section>

              @endforeach

              <!-- Slides Nav -->
              <nav class="velo-slides-nav">
                <ul class="velo-slides-nav__list">
                  <li>
                    <a class="js-velo-slides-prev velo-slides-nav__prev inactive" href="#0"><i class="icon-up-arrow"></i></a>
                  </li>
                  <li>
                    <a class="js-velo-slides-next velo-slides-nav__next" href="#0"><i class="icon-down-arrow"></i></a>
                  </li>
                </ul>
              </nav>

            @else
                <p class="no_p">No Recipes Added To This Cookbook</p>
            @endif
            
        </section>

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
