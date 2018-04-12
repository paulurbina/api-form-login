<?php
session_start();
$_SESSION['message'] = "";
$connection = new mysqli("localhost", "root", "", "login_user");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['password'] == $_POST['confirmpassword']) {

		$firstName = $connection->real_escape_string($_POST["firstName"]);
		$lastName = $connection->real_escape_string($_POST["lastName"]);
		$email = $connection->real_escape_string($_POST["email"]);
		$password = md5($_POST['password']);

		$sql = "INSERT INTO users (firstName, lastName, email, password) VALUES('$firstName', '$lastName', '$email', '$password')";

		if ($connection->query($sql) === true) {
			$_SESSION['message'] == 'Welcome';
			header("location: login.php");
		} else {
			$_SESSION['message'] = "Not Welcome";
		}

	} else {
		$_SESSION['message'] == "two password do not match";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<form action="register.php" method="post" class="container col-md-4 offset-md-4 primary-register">
		<div class="alert alert-danger"><?=$_SESSION['message']?></div>
		<div class="form-group">
			<input type="text" class="form-control" name="firstName" placeholder="First Name" required>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="email" placeholder="Email" required>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="new-password" required>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" autocomplete="new-password" required>
		</div>
		<input type="submit" class="btn btn-primary" value="Register" name="register">
	</form>
</body>
</html>