@forelse($posts as $post)
<!-- Media top -->
<div class="media">
  <div class="media-left media-top">
    <img src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png" class="media-object" style="width:60px">
  </div>
  <div class="media-body">
    <h4 class="media-heading">{{ $post->user->username }}<small class="pull-right"><i>Posted on {{ $post->created_at }}</i></small></h4>
    <p>{{ $post->post }}</p>

    <br>
    @foreach($post->comments as $comment)
		<div class="media">
			<div class="media-left media-top">
			<img src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png" class="media-object" style="width:30px">
			</div>
			<div class="media-body">
			<h4 class="media-heading">{{ $comment->user->username }}<small class="pull-right"><i>Posted on {{ $comment->created_at }}</i></small></h4>
			<p>{{ $comment->comment }}</p>

			<br>
			</div>
		</div>
	@endforeach
  </div>

  <div class="form-group col-md-11 col-md-offset-1 comment_box" id="comment_box_{{ $post->id }}">
	<textarea class="form-control comment_content" placeholder="Comment" rows="2"></textarea>
	<div>
		<br>
		<button type="submit" class="btn btn-success enter_btn" data-postid="{{ $post->id }}">Enter</button>
	</div>
  </div>

</div>

<br>
<br>

@empty
	<!-- <p>Zero Post.</p> -->
@endforelse

<script src="{{ url('/js/comment.js') }}"></script>