@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<!DOCTYPE html>
<html>
<head>
	<title>My Form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/angular.min.js"></script>
</head>
<body>
	<div class="form">
		<form action="{{route('user_register')}}" method="post">
			{{ csrf_field() }}
			
			<div class="form-group">
				<label class="label">Name</label>
				<input type="text" name="name" id="name" class="form-control">
			</div>
			<br>
			<div class="form-group">
				<label class="label">Email</label>
				<input type="text" name="email" id="email" class="form-control">
			</div>
			<br>
			<div class="form-group">
				<label class="label">Password</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<br>
			<div class="form-group">
				<label class="label">Confirm Password</label>
				<input type="password" name="cpassword" id="cpassword" class="form-control">
			</div>
			<br>
			<div class="form-group">
				<label class="label">Mobile</label>
				<input type="text" name="mobile" id="mobile" class="form-control">
			</div>
			<br>
			<div class="form-group">
				<label class="label">Address</label>
				<input type="text" name="address" id="address" class="form-control">
			</div>

			<br>
			<div class="form-group">
				<button type="submit" class="submit">Submit</button>
			</div>
		</form>
	</div>
</body>	