@extends('layouts.bookmark')

@section('content')

    <main role="main" id="o-wrapper"  class="o-wrapper main-wrap">

     <!-- Navigation -->
      <div class="menu_nav">
        @include('inc.nav')
      </div>

       @include('inc.createrecipe')

      <div class="basic-info" style="right: 43.5vw;">
        <span>Bookmarks: <p>{{$bookmarkcount}}</p></span>
      </div>

      <a href="/p/{{$user->id}}" class="profile_back"><i class="las la-arrow-left"></i></a>
      
      <!-- /Navigation -->

      <!-- COIDEA:demo START -->
      <div class="carousel">

        <span class="header">
          <p style="width: 16em">My Bookmarks</p>
        </span>

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
          
                  <div class="number">{{$post->user->name}}</div>
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
      
@endsection
