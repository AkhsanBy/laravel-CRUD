@extends('layouts/app')
@section('title', "Post")
@section('content')
	<div class="card">
	  <div class="card-body">
	    <h5 class="card-title">
	    	<strong>{{ $post['title'] }}</strong>
	    </h5>
	    <div class="text-muted">
			<a href="/post/category/{{ $post->category['slug'] }}">{{ $post->category['name'] }} </a>
			&middot; 
			{{ $post['created_at']->format('d F, Y') }} 
			&middot; 
			@foreach($post->tags as $tag) 
				<a href="/post/tag/{{ $tag['slug'] }}">{{ $tag['name'] }}</a> 
			@endforeach
	    </div>
	    <hr>
	    <p class="card-text">
	    	{{ $post['text'] }}
	    </p>
	    <div>
	    	<a class="btn btn-primary mx-1" style="background-color: #25d366" href="/post/{{ $post['slug'] }}/edit" role="button">
	    		<i class="fas fa-edit"></i>
	    	</a>
			<button type="button" role="button" class="btn btn-primary" style="background-color: #ed302f" data-mdb-toggle="modal" data-mdb-target="#deleteModal">
			  <i class="fas fa-trash"></i>
			</button>

			<!-- Modal delete-->
			<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Are you sure delete this post?</h5>
			        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			      	<h4>{{ $post['title'] }}</h4>
			      	<p>{{ Str::limit($post['text'], 50) }}</p>
			      </div>
			      <div class="modal-footer">
			      	<form action="/post/{{ $post['slug'] }}/delete" method="post">
						@method('delete')
						@csrf
			        	<button type="submit" class="btn btn-primary" style="background-color: #ed302f">Yes</button>
					</form>
			        <button type="button" class="btn btn-light" data-mdb-dismiss="modal">No</button>
			      </div>
			    </div>
			  </div>
			</div>
	    	<a href="/post" class="btn btn-link">Back</a>
	    </div>
	  </div>
	</div>
@stop