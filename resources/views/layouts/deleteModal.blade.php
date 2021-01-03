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
        	<button type="submit" class="btn btn-danger">Yes</button>
		</form>
        <button type="button" class="btn btn-light" data-mdb-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>