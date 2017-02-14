@extends('layouts.master')

@section('title')
	Social Network - Register
@endsection

@section('content')

	<div class="col-md-8 col-md-offset-2">
	@if(Session::has('message'))
		<div class="alert alert-success text-center"> {{ Session::get('message') }} </div>
	@endif
	<div class="panel panel-default">
		<div class="panel-heading">Register</div>
		<div class="panel-body">
			<form class="form-horizontal col-md-8 col-md-offset-2" action="{{ url('/register') }}" method="POST">
			{{ csrf_field() }}
				<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
				<label for="username">Username: </label>
					<input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}">
					@if($errors->has('username'))
						<span class="help-block">
							{{ $errors->first('username') }}
						</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
				<label for="email">Email: </label>
					<input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
					@if($errors->has('email'))
						<span class="help-block">
							{{ $errors->first('email') }}
						</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				<label for="password">Password: </label>
					<input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
					@if($errors->has('password'))
						<span class="help-block">
							{{ $errors->first('password') }}
						</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
				<label for="firstname">First Name: </label>
					<input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{ old('firstname') }}">
					@if($errors->has('firstname'))
						<span class="help-block">
							{{ $errors->first('firstname') }}
						</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
					<label for="lastname">Last Name: </label>
					<input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}">
					@if($errors->has('lastname'))
						<span class="help-block">
							{{ $errors->first('lastname') }}
						</span>
					@endif
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
			</form>
		</div>
	</div>
	</div>
@endsection