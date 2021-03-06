@extends('layouts/app')
@section('title', 'Update Post')
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4>Update Post &middot; {{ $post['title'] }} </h4> 
      </div>
      <div class="card-body">
        <form action="/post/{{ $post['slug'] }}/update" method="post" enctype="multipart/form-data">
          @method('patch')
          @csrf
          <div class="mb-4">
            <label class="form-label" for="thumbnail">Update thumbnail (optional)</label>
            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" />
            @error('thumbnail')
              <div class="invalid-feedback mb-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <!-- title input -->
          <div class="form-outline mb-4">
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $post['title'] }}"/>
            <label class="form-label" for="title">Title</label>
            @error('title')
              <div class="invalid-feedback mb-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <hr>
          <div class="mb-4"> 
            <select class="form-control js-example-basic-single @error('category') is-invalid @enderror" name="category">
              <option selected disabled>Choose category</option>
              @foreach($categories as $category)
                <option {{ $category['id'] == $post['category_id'] ? 'selected' : '' }} value="{{ $category['id'] }}">{{ $category['name'] }}</option>
              @endforeach
            </select>
            @error('category')
              <div class="invalid-feedback mt-1">
                {{ $message }}
              </div>
            @enderror
          </div>
          <hr>
          <div class="mb-4">
            <select class="form-control js-example-basic-multiple @error('tags') is-invalid @enderror" name="tags[]" multiple="multiple">
              @foreach($post->tags as $tag)
                <option selected value="{{ $tag['id'] }}">{{ $tag['name'] }}</option>
              @endforeach
              @foreach($tags as $tag)
                <option value="{{ $tag['id'] }}">{{ $tag['name'] }}</option>
              @endforeach
            </select>
            @error('tags')
              <div class="invalid-feedback mt-1">
                {{ $message }}
              </div>
            @enderror
          </div>  
          <hr>
          <!-- text input -->
          <div class="form-outline mb-4">
            <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="4">{{ old('text') ?? $post['text'] }}</textarea>
            <label class="form-label" for="text">Text</label>
            @error('text')
              <div class="invalid-feedback mb-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <hr>

          <!-- button -->
          <div class="d-flex">
            <button type="submit" class="btn btn-primary mx-2">Update</button>
            <a href="/post" class="btn btn-light">Back</a>
          </div>
        </form>
      </div>
    </div>  
  </div>
</div>
@stop