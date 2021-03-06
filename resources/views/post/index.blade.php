@extends('layouts/app')
@section('title', 'Posts')
@section('content')
	<div class="d-flex justify-content-between">
		@isset($category)
			<h3>Category: {{ $category['name'] }}</h3>
		@endisset

		@isset($tag)
			<h3>Tag: {{ $tag['name'] }}</h3>
		@endisset

		@if(!isset($category) && !isset($tag))
    		<h3>All Post</h3>
    	@endif
		<a href="/post/create" class="btn btn-primary">Create Post</a>
	</div>
	<hr>
	<div class="row">
		@if($posts->count())
			@foreach($posts as $post)
				<div class="col-md-12">
					<div class="card mb-3">
					  <div class="row g-0">
					    <div class="col-md-4">
					      <img
					        style="height: 230px; object-fit: cover; object-position: center;" 
							src="{{ asset("storage/" . $post['thumbnail']) }}" 
					        class="img-fluid"
					      />
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <h3 class="card-title">
					        	{{ $post['title'] }}
					        </h3>
					        <small class="text-muted text-small">
								<a class="badge bg-info" href="">{{ $post->category['name'] }}</a> 
								&middot; {{ $post['created_at']->format('d F, Y') }}
							</small>
							&middot;	
							@foreach($post->tags as $tag)
								<span class="badge bg-dark">
									<a href="/post/tag/{{ $tag['slug'] }}" class="text-white">{{ $tag['name'] }}</a>
								</span>
							@endforeach
					        <p class="card-text">
					          {{ Str::limit($post['text'], 200) }}
					        </p>
					        <div class="d-flex">
					    		<a href="/post/{{ $post['slug'] }}" class="btn btn-link">Read more</a>
						    </div>
					      </div>
					    </div>
					  </div>
					</div>
				</div>	
			@endforeach
			{{ $posts->links() }}
		@else
			<div class="col-md-4 alert alert-info">
				No post
			</div>
		@endif
	</div>
@stop