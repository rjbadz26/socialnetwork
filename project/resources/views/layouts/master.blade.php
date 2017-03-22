<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">

	<!-- Jquery -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
	<script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>

	<!-- Latest compiled and minified JavaScript -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
	<script src="{{ url('js/bootstrap.min.js') }}"></script>

	<link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">

</head>
<body>

	<div class="container">
		@include('includes.header')
		@yield('content')
	</div>
	
</body>
</html>