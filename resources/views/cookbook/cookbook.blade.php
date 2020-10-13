@extends('layouts.cookbook')

@section('content')

    <main role="main" id="o-wrapper"  class="o-wrapper main-wrap">

     <!-- Navigation -->
      <div class="menu_nav">
        @include('inc.nav')
      </div>

       @include('inc.createrecipe')
       @include('inc.cookmodal')

      <div class="basic-info">
        <span>Recipes: <p>{{$postCount}}</p></span>
      </div>
      
      <!-- /Navigation -->

      <!-- COIDEA:demo START -->
      <div class="carousel">

        <span class="header">
          <p style="width: 16em">{{$cookbook->title}}</p>
        </span>

        @if(!Auth::guest())
          @if(Auth::user()->id != $cookbook->user_id)
             <span class="velo-slider__hint"><span><span>Cookbook</span></span></span>
          @else
            <span class="velo-slider__hint"><span><span>My Cookbook</span></span></span>
          @endif
        @endif

        <div class="social">
          <p>
            <a href="/p/{{$cookbook->user->id}}" style="text-decoration: none; color: #fff">
              @if(!Auth::guest())
                @if(Auth::user()->id == $cookbook->user->id)
                 My Profile
                @else
                 {{$cookbook->user->name}}
                @endif
              @endif
            </a>
          </p>
          <p id="c-button--slide-bottom" class="c-button" ><i class="las la-external-link-square-alt"></i></p>
          <p><i class="las la-thumbs-up"></i></p>
          <p title="Message" class="cd-btns"><i class="las la-comment"></i></p>
           @if(!Auth::guest())
          @if(Auth::user()->id == $cookbook->user_id)

            <p title="Delete" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="las la-trash"></i></p>            
          @endif
        @endif
          <p title="view all"><a href="/user/cookbooks/{{$cookbook->id}}" style="color: #fff"><i class="las la-expand"></i></a></p>
        </div>        

        <!-- COIDEA:demo:slider:for START -->
        <div class="slider slider-for">
         @if(count($posts) > 0)
            @foreach($posts as $post)
            <div class="item" style="background-image: url(/storage/cover_images/{{$post->cover_image}})"></div>
          @endforeach
        @endif
        </div>
        <!-- COIDEA:demo:slider:for END -->
        
        <!-- COIDEA:demo:slider:nav START -->
        <div class="slider slider-nav">
          @if(count($posts) > 0)
            @foreach($posts as $post)
              <div class="nav-item">
                <div class="content" style="background-image: url(/storage/cover_images/{{$post->cover_image}})">
          
                  <div class="number">{{$cookbook->user->name}}</div>
                  <div class="body">
                    <div class="location">Mong Kok, Hong Kong</div>
                    <div class="headline">{{ $post->title }}</div>
                    <a href="/r/{{$post->id}}">
                      <div class="link">Make This Dish</div>
                    </a>
                  </div>
          
                </div>
              </div>
            @endforeach
          @endif
        </div>
        <!-- COIDEA:demo:slider:nav END -->
        @if(count($posts) > 0)
        <!-- COIDEA:demo:navigation START -->
        <div class="navigation">
          <button class="forward"> &gt; </button>
          <button class="back"> &lt; </button>
        </div>
        <!-- COIDEA:demo:navigation END -->
        @endif
      </div>    
      <!-- COIDEA:demo END -->

      <!-- search -->
      @include('inc.search')
      <!-- /search -->
    </main>

    @include('inc.profile')

    @include('inc.notification')
      
    <nav id="c-menu--slide-bottom" class="c-menu c-menu--slide-bottom">
      <button class="c-menu__close"><i class="las la-arrow-down" style="color: #fff"></i></button>
      <div class="social-media">
        <span><a href="#" target="_blank"><i class="lab la-facebook-f" style="color:#3b5998"></i></a></span>
        <span><a href="#" target="_blank" data-size="large"><i class="lab la-twitter" style="color:#00aced"></i></a></span>
        <span><a href="#" target="_blank"><i class="lab la-instagram" style="color:#517fa4"></i></a></span>
        <span><a href="#" target="_blank"><i class="lab la-pinterest-p" style="color:#cb2027"></a></i></span>
      </div>
    </nav><!-- /c-menu slide-bottom -->

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
