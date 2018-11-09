<?php 


		$conn=mysql_connect("localhost","root","");
		if ($conn) {}
		else echo "not connect";
		$db=mysql_select_db('myfirst',$conn);
		if($db)
		{}
		else echo "not connected";
		if(isset($_POST['user_name'])&&isset($_POST['company_name'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['confirm'])){
		$user_name=$_POST['user_name'];
		$company_name=$_POST['company_name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$confirm=$_POST['confirm'];
		if($password!=$confirm){ echo "password do not match";}
		else {	$query="SELECT email from sign where email='$email'";
				 
				$query_run=mysql_query($query);
				//echo  mysql_num_rows($query_run);
				if(mysql_num_rows($query_run)>=1){echo 'the email:'.$email. ' already exists';}
				//echo ' mysql_num_rows($query_run)';
				else{	$sql="INSERT INTO sign(user_name,company_name,email,password)
					VALUES ('$user_name','$company_name','$email','$password')";

					$t=mysql_query($sql);
					if($t)
					{echo "Successful";}
					else echo mysql_error();
					}
			}
		}
		else echo mysql_error();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>My Form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/angular.min.js"></script>
</head>
<body>



	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1 class="text-center">Registration</h1>
				<form class="form-horizontal" action="form.php" method="POST" ng-app="myApp" ng-controller="myController">

					<div class="form-group">
						<label for="userName" class="col-sm-4 control-label">User Name</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="userName"  name="user_name" minlength="3" maxlength="10" placeholder="Enter user name" required>

					    </div>
					</div>
					<div class="form-group">
						<label for="userName" class="col-sm-4 control-label">Company Name</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="userName" name="company_name" placeholder="Enter company name" required>
							
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">Email</label>
						<div class="col-md-8">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-sm-4 control-label">Password</label>
						<div class="col-md-8">
							<input type="password" class="form-control" id="password" name=password placeholder="Enter password" required>
						</div>
					</div>

					<div class="form-group">
						<label for="confirmPassword" class="col-md-4 control-label">Confirm Password</label>
						<div class="col-md-8">
							<input type="password" class="form-control" id="confirmPassword" name="confirm" placeholder="Enter confirm password" required>
						</div>
					</div>

					
					<button class="btn btn-primary pull-right" onclick=href>Submit</button>
				</form>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		var app = angular.module('myApp', []);
		app.controller("myController", function($scope){
			$scope.months = ['January', 'February', 'March', 'April', 'May', 'June','July','August','September','October','November','December'];
			$scope.days = ['01', '02', '03','04','05','06','07','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'];

			$scope.days = function(min, max){
				var output = [];
				for (var i=min; i<=max; i++){
					output.push(i);
				}
				return output;
			}
			$scope.years = function(max, min){
				var output = [];
				for (var i=max; i>=min; i--){
					output.push(i);
				}
				return output;
			}
		});
	</script>
</body>
</html>