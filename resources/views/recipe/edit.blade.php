@extends('layouts.create')

@section('content')
	<!-- partial:index.partial.html -->
	<body class="antialiased sans-serif bg-gray-200">
		<a href="/home" title="Home"><img class="logo" src="{{ asset('logo.svg') }}"></a>
		<span class="velo-slider_hints"><span><span>Edit Recipe</span></span></span>
		<div x-data="app()" x-cloak>
			 {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
			  @csrf
			  	{{Form::hidden('_method', 'PUT')}}
				<div class="max-w-3xl mx-auto px-4 py-10">
					<div x-show.transition="step != 'complete'">	
						<!-- Top Navigation -->
						<div class="border-b-2 py-4">
							<div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight" x-text="`Step: ${step} of 3`"></div>
							<div class="flex flex-col md:flex-row md:items-center md:justify-between">
								<div class="flex-1">
									<div x-show="step === 1">
										<div class="text-lg font-bold text-gray-700 leading-tight">Your Recipe</div>
									</div>
									
									<div x-show="step === 2">
										<div class="text-lg font-bold text-gray-700 leading-tight">Your Recipe</div>
									</div>

									<div x-show="step === 3">
										<div class="text-lg font-bold text-gray-700 leading-tight">Your Recipe</div>
									</div>

								</div>

								<div class="flex items-center md:w-64">
									<div class="w-full bg-white rounded-full mr-2">
										<div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white" :style="'width: '+ parseInt(step / 3 * 100) +'%'"></div>
									</div>
									<div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 3 * 100) +'%'"></div>
								</div>
							</div>
						</div>
						@if(count($errors) > 0)
							<br>
							<span class="alert alert-warning alert-block ">Please Fill in all required fields before submitting</span>
						@endif
						<!-- /Top Navigation -->

						<!-- Step Content -->
						<div class="py-10">	
							<div x-show.transition.in="step === 1">
								<div class="mb-5">
									{{Form::text('title', $post->title, ['class' => 'w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium', 'placeholder' => 'Recipe Title'])}}<br><br>
				                    @if ($errors->has('title'))
				                        <span class="alert alert-warning alert-block ">{{ $errors->first('title') }}</span><br><br>
				                    @endif 
									
								</div>

								<div class="mb-5">
									{{Form::text('body', $post->body, ['class' => 'w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium', 'placeholder' => 'Recipe Description',])}}<br><br>
				                    @if ($errors->has('body'))
				                        <span class="alert alert-warning alert-block ">{{ $errors->first('body') }}</span><br><br>
				                    @endif 
								</div>			
								<div class="mb-5">
									<img id="output" class='coverDisplay' src="/storage/cover_images/{{$post->cover_image}}" style="height:60vh; width: 100vw" />
									{{Form::label('body', 'Recipe Cover Image ', ['class'=>'font-bold mb-1 text-gray-700 block'])}}
									<small>High Quality Cover Image: 24MP Quality</small><br /><br />
				                    <input type="file" name="cover_image" accept="image/*" 
				                     onchange="loadFile(event)">
								</div>
								
							</div>

							<div x-show.transition.in="step === 2">
								<div class="mb-5">
				                    {{Form::textarea('ingredients', $post->ingredients, ['placeholder' => 'Ingredients List', 'id'=>'ingredients'])}}<br><br>
				                    @if ($errors->has('ingredients'))
				                        <span class="alert alert-warning alert-block ">{{ $errors->first('ingredients') }}</span><br><br>
				                    @endif 
								</div>
								<div class="mb-5">
									{{Form::textarea('method', $post->method, ['placeholder' => 'Method Description', 'id'=>'method'])}}<br><br>
				                    @if ($errors->has('method'))
				                        <span class="alert alert-warning alert-block ">{{ $errors->first('method') }}</span><br><br>
				                    @endif 
								</div>
									
							</div>

							<div x-show.transition.in="step === 3">
								<div class="mb-5">
									{{Form::text('time', $post->time, ['class' => 'w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium', 'placeholder' => 'Preparation time: hh mm'])}}<br><br>
				                     @if ($errors->has('time'))
				                        <span class="alert alert-warning alert-block ">{{ $errors->first('time') }}</span><br>	<br>
				                    @endif 
								</div>

								<div class="mb-5">
									 {{Form::text('cook', $post->cook, ['class' => 'w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium', 'placeholder' => 'Cook time: hh mm'])}}<br><br>
				                     @if ($errors->has('cook'))
				                        <span class="alert alert-warning alert-block ">{{ $errors->first('cook') }}</span><br><br>
				                    @endif 
								</div>

								<div class="mb-5">
									{{Form::number('serves', $post->serves, ['class' => 'w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium', 'placeholder' => 'Number of people served'])}}<br><br>
				                     @if ($errors->has('serves'))
				                        <span class="alert alert-warning alert-block ">{{ $errors->first('serves') }}</span><br><br>
				                    @endif 
								</div>
								<div class="mb-5">
									<label for="description" class="font-bold mb-1 text-gray-700 block">Optional</label>
						            <select name="cookbook_id" id="cookbook_id" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
						                <option value="">--- Select Cookbook ---</option>
						                @foreach ($cookbooks as $cookbook)
						                    <option value="{{ $cookbook->id }}">{{ $cookbook->title }}</option>
						                @endforeach
						            </select>
								</div>
							</div>
						</div>
						<!-- / Step Content -->
					</div>
				</div>

				<!-- Bottom Navigation -->	
				<div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md" x-show="step != 'complete'">
					<div class="max-w-3xl mx-auto px-4">
						<div class="flex justify-between">
							<div class="w-1/2">
								<span
									style="cursor: pointer;"	
									x-show="step > 1"
									@click="step--"
									class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border" 
								>Previous</span>
							</div>

							<div class="w-1/2 text-right">
								<span
									style="cursor: pointer;"
									x-show="step < 3"
									@click="step++"
									class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium" 
								>Next</span>

								<input
									style="cursor: pointer;"
									type="submit"
									x-show="step === 3"
									class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium" 
								/>
							</div>
						</div>
					</div>
				</div>
				<!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->	

	   	 	{!! Form::close() !!}
		</div>
	</body>
	<!-- partial -->

@endsection