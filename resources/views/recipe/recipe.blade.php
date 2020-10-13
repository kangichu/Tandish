@extends('layouts.recipe')

@section('content')

    <main role="main" id="o-wrapper"  class="o-wrapper main-wrap">
      <div class="bottom_nav">
        @include('inc.nav')
      </div>
      
      @include('inc.createrecipe')
      @include('inc.modal')

      <div class="social">
        <p><a href="/p/{{$post->user->id}}" style="color:#fff; text-decoration: none;">
          @if(!Auth::guest()) 
            @if(Auth::user()->id != $post->user_id) 
              {{$post->user->name}} 
            @else 
              My Profile 
            @endif 
          @endif 
        </a></p>    

        @if($post->cookbook_id)
          <span class="playlist"><a href="/cookbook/{{$post->cookbook_id}}">COOKBOOK</a></span>
        @endif               
        <p title="Share" id="c-button--slide-bottom" class="c-button"><i class="las la-external-link-square-alt"></i></p>
        <p title="Comment" class="cd-btns" ><i class="las la-comment"></i></p>
        @if(!Auth::guest())
          @if(Auth::user()->id != $post->user_id)
            @if($made->isEmpty())
              <p>
                {!! Form::open(['action' => 'MadesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}
                  {{Form::hidden('post_id', $post->id)}}
                  {{ Form::button('<i class="las la-utensils"  title="Made this?"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                {!! Form::close() !!}
              </p>
            @else
              <p title="I've Made This" style="color: red"><i class="las la-utensils"></i></p>
            @endif    


            @if($bookmark->isEmpty())
              <p>
                {!! Form::open(['action' => 'BookmarksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}
                  {{Form::hidden('post_id', $post->id)}}
                  {{ Form::button('<i title="Bookmark" class="las la-bookmark"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                {!! Form::close() !!}
              </p>
            @else
              <p title="Bookmarked" style="color: red"><i class="las la-bookmark"></i></p>
            @endif    
          @endif
        @endif
       
        @if(!Auth::guest())
          @if(Auth::user()->id == $post->user_id)

            <p title="Edit"><a href="/r/{{$post->id}}/edit" style="color:#fff"><i class="las la-edit"></i></a></p>
            <p title="Delete" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="las la-trash"></i></p>            
          @endif
        @endif
      </div>   

      <section class="slider-pages">
        <article class="js-scrolling__page js-scrolling__page-1 js-scrolling--active">
          <div class="slider-page slider-page--left">
            <div class="slider-page--skew">
              <div class="slider-page__content" style="background-image: url(/storage/cover_images/{{$post->cover_image}})">
              </div>
              <!-- /.slider-page__content -->
            </div>
            <!-- /.slider-page--skew -->
          </div>
          <!-- /.slider-page slider-page--left -->

          <div class="slider-page slider-page--right">
            <div class="slider-page--skew">
              <div class="slider-page__content">
                <h1 class="slider-page__title slider-page__title--big">
                  {{$post->title}}

                </h1>
                <!-- /.slider-page__title slider-page__title--big -->
                <h2 class="slider-page__title">
                  {!!$post->body!!}<br /> <br /> 
                  <small>Published {{$post->updated_at->diffForHumans() }}  </small>

                  <div class="details">
                    <span title="made this" style="cursor: pointer;"><i class="las la-utensils"></i>&nbsp;{{$count}}</span>
                    <span>Serves: {{$post->serves}}</span>
                    <span>Prep: @if($post->htime != 0){{$post->htime}}hr @endif @if($post->mtime != 0){{$post->mtime}}min @endif</span>
                    <span>Cook:  @if($post->hcook != 0){{$post->hcook}}hr @endif @if($post->mcook != 0){{$post->mcook}}min @endif</span>
                  </div>             
                </h2>
                <!-- /.slider-page__title -->
                <p class="slider-page__description">
                  Please scroll down or press the down arrow on your keyboard
                </p>
                <!-- /.slider-page__description -->
              </div>
              <!-- /.slider-page__content -->
            </div>
            <!-- /.slider-page--skew -->
          </div>
          <!-- /.slider-page slider-page--right -->
        </article>
        <!-- /.js-scrolling__page js-scrolling__page-1 js-scrolling--active -->
        <article class="js-scrolling__page js-scrolling__page-2">
          <div class="slider-page slider-page--left">
            <div class="slider-page--skew">
              <div class="slider-page__content">
                <!-- <h1 class="slider-page__title" style="font-size: 4em;text-decoration: line-through;">
                  Ingredients
                </h1> -->
                <span class="velo-slider__hint"><span><span>Ingredients</span></span></span>
                <!-- /.slider-page__title -->
                <p class="slider-page__description">
                  {!!$post->ingredients!!}
                </p>
                <!-- /.slider-page__description -->
              </div>
              <!-- /.slider-page__content -->
            </div>
            <!-- /.slider-page--skew -->
          </div>
          <!-- /.slider-page slider-page--left -->

          <div class="slider-page slider-page--right">
            <div class="slider-page--skew">
              <div class="slider-page__content"  style="background-image: url(/storage/img/ingredients.jpg)">
              </div>
              <!-- /.slider-page__content -->
            </div>
            <!-- /.slider-page--skew -->
          </div>
          <!-- /.slider-page slider-page--right -->
        </article>
        <!-- /.js-scrolling__page js-scrolling__page-2 -->
        <article class="js-scrolling__page js-scrolling__page-3">
          <div class="slider-page slider-page--left">
            <div class="slider-page--skew">
              <div class="slider-page__content" style="background-image: url(/storage/img/method.jpg)">
              </div>
              <!-- /.slider-page__content -->
            </div>
            <!-- /.slider-page--skew -->
          </div>
          <!-- /.slider-page slider-page--left -->

          <div class="slider-page slider-page--right">
            <div class="slider-page--skew">
              <div class="slider-page__content">
                <!-- <h1 class="slider-page__title" style="font-size: 4em;text-decoration: line-through;">
                  Directions
                </h1> -->
                <span class="velo-slider__hints"><span><span>Directions</span></span></span>
                <!-- /.slider-page__title -->
                <p class="slider-page__description">
                  {!! $post->method !!}
                  <!--{!! Str::words($post->method, 100, '<br><br><a href="#" style="color: #fff; text-decoration: none;" data-toggle="modal" data-target="#exampleModalLong">Read more</a>') !!}
                  }-->
                </p>
                <!-- /.slider-page__description -->
              </div>
              <!-- /.slider-page__content -->
            </div>
            <!-- /.slider-page--skew -->
          </div>
          <!-- /.slider-page slider-page--right -->
        </article>
        <!-- /.js-scrolling__page js-scrolling__page-3 -->
      </section>
      <!-- /.slider-pages -->  

      <!-- search -->
      @include('inc.search')
      <!-- /search -->
    </main>

    @include('inc.profile')
    
    @include('inc.notification')

    <!-- <nav id="c-menu--push-right" class="c-menu c-menu--push-right">
        <button class="c-menu__close"><i class="las la-angle-right"></i></button>
        <span class="in-popular">Popular</span> 
    </nav>/c-menu slide-top -->

    <nav id="c-menu--slide-bottom" class="c-menu c-menu--slide-bottom">
      <button class="c-menu__close"><i class="las la-arrow-down" style="color: #fff"></i></button>
      <div class="social-media">
        <span><a href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" target="_blank"><i class="lab la-facebook-f" style="color:#3b5998"></i></a></span>
        <span><a href="http://twitter.com/share?text={{$post->title}}%20via%20@tandish&url={{$url}}&hashtags=recipe,food,tandish" target="_blank" data-size="large"><i class="lab la-twitter" style="color:#00aced"></i></a></span>
        <span><a href="https://reddit.com/submit?url={{$url}}&title={{$post->title}}" target="_blank"><i class="lab la-reddit" style="color:#FF5700"></i></a></span>
        <span><a href="https://pinterest.com/pin/create/bookmarklet?media=http://localhost:8000/storage/cover_images/{{$post->cover_image}}&url={{$url}}&description={{$post->title}}" target="_blank"><i class="lab la-pinterest-p" style="color:#cb2027"></a></i></span>
      </div>
    </nav><!-- /c-menu slide-bottom -->

    <div class="cd-panels from-right">
      <header class="cd-panel-header">
        <h1>{{$post-> title}} comments</h1>
        <a href="#0" class="cd-panel-closes">Close</a>
      </header>

      <div class="cd-panel-container">
        <div class="cd-panel-content">
          @comments(['model' => $post])
        </div> <!-- cd-panel-content -->
      </div> <!-- cd-panel-container -->
    </div> <!-- cd-panel -->

    <div id="c-mask" class="c-mask"></div><!-- /c-mask -->

    

@endsection
