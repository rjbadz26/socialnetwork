@forelse($posts as $post)

@if($post->user_id == Auth::user()->id)
<!-- Media top -->
<div class="media">
  <div class="media-left media-top">
    <img src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png" class="media-object" style="width:60px">
  </div>
  <div class="media-body">
    <h4 class="media-heading">{{ $post->user->firstname }} {{ $post->user->lastname }}<small class="pull-right"><i>Posted {{ $post->created_at->diffForHumans() }}</i></small></h4>
    <p>{{ $post->post }}</p>

    <br>
    @foreach($post->comments as $comment)
		<div class="media">
			<div class="media-left media-top">
			<img src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png" class="media-object" style="width:30px">
			</div>
			<div class="media-body">
			<h4 class="media-heading">{{ $comment->user->firstname }} {{ $comment->user->lastname }}<small class="pull-right"><i>{{ $comment->created_at->diffForHumans() }}</i></small></h4>
			<p>{{ $comment->comment }}</p>

			<br>
			</div>
		</div>
	@endforeach
  </div>

  <div class="form-group col-md-11 col-md-offset-1 comment_box">
	<textarea class="form-control" placeholder="Comment" rows="2"></textarea>
	<div>
		<br>
		<button type="submit" class="btn btn-success enter_btn" data-postid="{{ $post->id }}">Enter</button>
	</div>
  </div>

</div>

<br>
<br>

@else
	@if(Auth::user()->id < $post->user_id)
		<?php $user1_id = Auth::user()->id; ?>
		<?php $user2_id = $post->user_id; ?>
	@else
		<?php $user1_id = $post->user_id; ?>
		<?php $user2_id = Auth::user()->id; ?>
	@endif

	@foreach($relationships as $rel)
		@if($rel->user1 == $user1_id AND $rel->user2 == $user2_id AND $rel->status_id == 2)
			<!-- Media top -->
			<div class="media">
			  <div class="media-left media-top">
			    <img src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png" class="media-object" style="width:60px">
			  </div>
			  <div class="media-body">
			    <h4 class="media-heading">{{ $post->user->firstname }} {{ $post->user->lastname }}<small class="pull-right"><i>Posted {{ $post->created_at->diffForHumans() }}</i></small></h4>
			    <p>{{ $post->post }}</p>

			    <br>
			    @foreach($post->comments as $comment)
					<div class="media">
						<div class="media-left media-top">
						<img src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png" class="media-object" style="width:30px">
						</div>
						<div class="media-body">
						<h4 class="media-heading">{{ $comment->user->firstname }} {{ $comment->user->lastname }}<small class="pull-right"><i>{{ $comment->created_at->diffForHumans() }}</i></small></h4>
						<p>{{ $comment->comment }}</p>

						<br>
						</div>
					</div>
				@endforeach
			  </div>

			  <div class="form-group col-md-11 col-md-offset-1 comment_box">
				<textarea class="form-control" placeholder="Comment" rows="2"></textarea>
				<div>
					<br>
					<button type="submit" class="btn btn-success enter_btn" data-postid="{{ $post->id }}">Enter</button>
				</div>
			  </div>

			</div>

			<br>
			<br>
		@endif
	@endforeach
@endif
@empty
	<p>Zero Post.</p>
@endforelse

<script src="{{ url('/js/comment.js') }}"></script>