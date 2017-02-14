<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

	<div class="container">
		@include('includes.header')
		@yield('content')
	</div>

	<script>
		var userId = "{{ Auth::user()->id }}";
		var token = "{{ Session::token() }}";
		var urlPost = "{{ url('/addPost') }}";
		var urlComment = "{{ url('/addComment') }}";
		var urlDisplayPosts = "{{ url('/posts') }}";
	</script>
	
	<script type="text/javascript" src="{{ url('js/main.js') }}"></script>
</body>
</html>