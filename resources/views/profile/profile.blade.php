@extends('layouts.profile')

@section('content')

    <main id="o-wrapper" class="o-wrapper container">
      <div class="menu_nav">
        @include('inc.nav')
      </div>

      @include('inc.createrecipe')

      <canvas id="bubble"></canvas>

      <div class="social-media">
        <div class="tools">
          @if(!Auth::guest())
            @if(Auth::user()->id != $user->id)
              @if(auth()->user()->isFollowing($user))
              {!! Form::open(['action' => 'ProfilesController@follwUserRequest', 'method' => 'POST',]) !!}
                {{Form::hidden('user_id', $user->id)}}
                <button type="submit" title="Unfollow"  class="btn btn-sub"><i style="color: blue" class="las la-check-double"></i></button>
              {!! Form::close() !!}
              @else
              {!! Form::open(['action' => 'ProfilesController@follwUserRequest', 'method' => 'POST',]) !!}
                {{Form::hidden('user_id', $user->id)}}
                <button type="submit" title="Follow"  class="btn btn-sub"><i class="las la-check"></i></button>
              {!! Form::close() !!}
              @endif
            @endif
          @endif
          @if(!Auth::guest())
            @if(Auth::user()->id === $user->id)
              <span title="Bookmarks"><a href="/bookmark/{{$user->id}}"><i class="las la-bookmark"></i></a></span>
            @endif
          @endif
          
          <span title="Cookbooks" id="c-button--slide-right" class="c-button"><i class="las la-book-open"></i></span>
          @if(!Auth::guest())
            @if(Auth::user()->id != $user->id)
               <span title="Message" class="cd-btns"><i class="las la-comment"></i></span>
            @else
              <span title="My Messages" class="cd-btns"><i class="las la-comment"></i></span>
            @endif
          @endif
          
          @if(!Auth::guest())
            @if(Auth::user()->id != $user->id)
               <span title="{{$user->name}}'s Recipes"><a href="/user/posts/{{$user->id}}"><i class="las la-expand"></i></a></span>
            @else
              <span title="My Recipes"><a href="/user/posts/{{$user->id}}"><i class="las la-expand"></i></a></span>
            @endif
          @endif
        </div>
      </div>
      @if(count($posts) > 0)
          <span class="velo-slider__hints"><span><span>Check Them Recipes</span></span></span>
        @else
          <span class="velo-slider__hints"><span><span>Create your own Recipes</span></span></span>
       @endif
      <div class="bas_info">
        <div style="font-size: .8em">{{$user->name}}</div>
        <div class="recipes" title="Recipes">
          <span>RECIPES</span>
          <span style="padding-left: .3em;">{{ $postCount }}</span>
        </div>
        <div class="subs" title="Cookbooks">
          <span>COOKBOOKS</span>
          <span style="padding-left: .3em">{{ $cookbookCount }}</span>
        </div>
        @if(!Auth::guest())
          @if(Auth::user()->id === $user->id)
            <div class="bookmarks" title="Bookmarks">
              <span>BOOKMARKS</span>
              <span style="padding-left: .3em">{{ $bookmarkcount }}</span>
            </div>
          @endif
        @endif
        <div class="bookmarks" title="subscribers">
          <span>SUBSCRIBERS</span>
          <span style="padding-left: .3em">{{ $user->followers()->get()->count() }}</span>
        </div>
      </div> 
        
      <div id="hero-slides">
        <div id="header">
          <div id="logo"></div>
          <!-- @if(count($posts) >= 2)
            <div id="menu">
              <i class="las la-play"></i>
            </div>
          @endif -->
        </div>
        <div id="slides-cont">
         <!--  @if(count($posts) >= 4)
          <div class="button" id="next"></div>
          <div class="button" id="prev"></div>
          @endif -->
          <div id="slides">
            @if(count($posts) >= 1)
              @foreach($posts as $post)
              <a href="/r/{{$post->id}}">
                <div class="slide" style="background-image: url(/storage/cover_images/{{$post->cover_image}});">
                  <div class="number">{{$post->updated_at->diffForHumans()}}</div>
                  <div class="body">
                    <!-- <div class="location">Shibuya, Japan</div> -->
                    <div class="headline">{{ $post->title }}</div>
                  </div>
                </div>
              </a>
              @endforeach
            @endif
          </div>
          <div id="next-catch"></div>
          <div id="prev-catch"></div>
        </div>
        <!--<div id="footer"><a href="https://dribbble.com/shots/3888265-Motion-Study" target="_blank">
          <div id="dribbble"></div></a>
        </div>-->
      </div>

      <!-- search -->
      @include('inc.search')
      <!-- /search -->
    </main>

    @include('inc.profile')
    @include('inc.cookbook')
    @include('inc.notification')

    <nav id="c-menu--slide-right" class="c-menu c-menu--slide-right">
      <button class="c-menu__close"><!-- <i class="las la-angle-right"></i> --></button>
      <br><br>
      

      @if(count($cookbooks) > 0)
        @foreach($cookbooks as $cookbook)
          <div class="blog-slider">
            <div class="blog-slider__wrp swiper-wrapper">
              <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__content">
                  <span class="blog-slider__code">{{$cookbook->created_at->diffForHumans()}}</span>
                  <div class="blog-slider__title">{{$cookbook->title}}</div>
                  <div class="blog-slider__text">{{$cookbook->description}}</div>
                  <a href="/cookbook/{{$cookbook->id}}" class="blog-slider__button">View Cookbook</a>                    
                </div>
              </div>
            </div>
          </div><br><br>
        @endforeach
      @endif

      @if(!Auth::guest())
        @if(Auth::user()->id === $user->id)
          <button class="create-boards" data-toggle="modal" data-target="#cookbook"><i class="las la-plus"></i></button>
        @endif
      @endif 
        
    </nav><!-- /c-menu push-top -->

    <nav id="c-menu--slide-left" class="c-menu c-menu--slide-left">
        <button class="c-menu__close"><i class="las la-angle-left"></i></button>
    </nav><!-- /c-menu slide-left -->

    <nav id="c-menu--push-right" class="c-menu c-menu--push-right">
        <button class="c-menu__close"><i class="las la-angle-right"></i></button>
    </nav><!-- /c-menu push-right -->

    <div class="cd-panels from-right">
      <header class="cd-panel-header">
        <a href="#0" class="cd-panel-closes">Close</a>
      </header>

      <div class="cd-panel-container">
        <div class="cd-panel-content">
          
        </div> <!-- cd-panel-content -->
      </div> <!-- cd-panel-container -->
    </div> <!-- cd-panel -->

    <div id="c-mask" class="c-mask"></div><!-- /c-mask -->

@endsection
  