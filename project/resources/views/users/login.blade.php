@extends('layouts.master')

@section('title')
	Social Network - Login
@endsection

@section('content')
	<br>
	<br>
	<br>
	<br>
	<div class="col-md-4 col-md-offset-4">
	@if(Session::has('err_message'))
		<div class="alert alert-danger text-center">{{ Session::get('err_message') }}</div>
	@endif()
	<div class="panel panel-default">
		<div class="panel-heading">Login</div>
		<div class="panel-body">
			<form action="{{ url('/login') }}" method="POST">
			{{ csrf_field() }}
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<input type="text" class="form-control" name="email" placeholder="Email">
					@if($errors->has('email'))
						<span class="help-block">
							{{ $errors->first('email') }}
						</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<input type="password" class="form-control" name="password" placeholder="Password">
					@if($errors->has('password'))
						<span class="help-block">
							{{ $errors->first('password') }}
						</span>
					@endif
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</form>
		</div>
	</div>
	</div>
@endsection