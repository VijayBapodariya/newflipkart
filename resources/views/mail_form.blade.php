<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	{{Session::get('success')}}
	<form method="post" action="{{url('/send_demo')}}">
		@csrf
		<input type="text" name="email">
		<button type="submit">submit</button>
	</form>
</body>
</html>