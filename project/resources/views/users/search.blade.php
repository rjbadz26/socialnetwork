@extends('layouts.master')

@section('title')
	Search
@endsection

@section('content')
	<h3>People</h3>
	<hr>
	<table id="rel_tbl">
	@forelse($users as $user)
		<!-- hide auth user -->
		@if($user->id != Auth::user()->id)
			<!-- add value to user1 and user2 -->
			@if(Auth::user()->id < $user->id)
				<?php $user1_id = Auth::user()->id; ?>
				<?php $user2_id = $user->id; ?>
			@else
				<?php $user1_id = $user->id; ?>
				<?php $user2_id = Auth::user()->id; ?>
			@endif
			
			<tr>
			<!-- display relationships -->
			@forelse($relationships as $r)
				@if($r->user1 == $user1_id AND $r->user2 == $user2_id)			
					@if($r->status->status == 'pending')
						@if($r->action_user_id == Auth::user()->id)
							<td>
							<h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
							</td>
							<td>
							<button type="submit" class="btn btn-success rel_btn" disabled>Friend Request Sent</button>
						@else
							<td>
							<h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
							</td>
							<td>
							<button type="submit" class="btn btn-info rel_btn" data-user1="{{$user1_id}}" data-user2="{{$user2_id}}" data-action="{{$r->action_user_id}}" data-status="{{$r->status_id}}">Confirm</button>
						@endif
					@elseif($r->status->status == 'accepted')
						<td>
						<h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
						</td>
						<td>
						<button type="submit" class="btn btn-warning rel_btn" data-user1="{{$user1_id}}" data-user2="{{$user2_id}}" data-action="{{$r->action_user_id}}" data-status="{{$r->status_id}}">Unfriend</button>
					@elseif($r->status->status == 'declined')
						<td>
						<h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
						</td>
						<td>
						<button type="submit" class="btn btn-primary rel_btn" data-user1="{{$user1_id}}" data-user2="{{$user2_id}}" data-action="{{$r->action_user_id}}" data-status="{{$r->status_id}}">Add Friend</button>
					@endif
					
					<?php $counter = 0; ?>
					<?php break; ?>
				@else
					<?php $counter++ ;?>
					@if($r->count() == $counter)
						<td>
						<h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
						</td>
						<td>
						<button type="submit" class="btn btn-primary rel_btn" data-user1="{{$user1_id}}" data-user2="{{$user2_id}}" data-action="{{Auth::user()->id}}" data-status="0">Add Friend</button>
						<?php $counter = 0; ?>
						<?php break; ?>
					@endif
				@endif
			@empty
				<td>
				<h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
				</td>
				<td>
				<button type="submit" class="btn btn-primary rel_btn" data-user1="{{$user1_id}}" data-user2="{{$user2_id}}" data-action="{{Auth::user()->id}}" data-status="0">Add Friend</button>
			@endforelse
			</td>
			</tr>
		@endif
	@empty
		<p>No Results Found.</p>
	@endforelse
	</table>

	<script>
		var urlUpdateRel = "{{ url('/updateRel') }}";
		var token = "{{ Session::token() }}";
		var userId = " {{ Auth::user()->id }} ";
	</script>
	<script src="{{ url('js/update_rel.js') }}"></script>
@endsection

