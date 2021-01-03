@extends('layouts/app')
@section('title', "Post")
@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="card mb-3">
			  <img
			    src="{{ asset("storage/" . $post['thumbnail']) }}"
			    class="card-img-top"
			  />
			  <div class="card-body">
			    <h5 class="card-title">
			    	<strong>{{ $post['title'] }}</strong>
			    </h5>
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
				<hr>
			    <p class="card-text">
			      	{{ $post['text'] }}
			    </p>
			    <div>
			    	<a href="/post/{{ $post['slug'] }}/edit" class="btn btn-outline-success btn-rounded" data-mdb-ripple-color="dark">Edit</a>
			    	<button class="btn btn-outline-danger btn-rounded" data-mdb-ripple-color="dark" type="button" data-mdb-toggle="modal" data-mdb-target="#deleteModal">Delete</button>
			    	@include('../layouts/deleteModal')
			    	<a href="/post" class="btn btn-link">Back</a>
			    </div>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			
		</div>
	</div>
@stop