
<?php
session_start();

if (isset($_SESSION['loggedIN'])) {
	header('Location: hidden.php');
	exit();
}

if (isset($_POST['login'])) {
	$connection = new mysqli('localhost', 'root', '', 'login_user');

	$email = $connection->real_escape_string($_POST['emailPHP']);
	$password = md5($connection->real_escape_string($_POST['passwordPHP']));

	$data = $connection->query("SELECT id FROM users WHERE email='$email' AND password='$password'");
	if ($data->num_rows > 0) {
		$_SESSION['loggedIN'] = '1';
		$_SESSION['email'] = $email;
		exit('Login success..');
	} else {
		exit('Please check input');
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Users</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
		<div class="container col-md-4 offset-md-4 primary-login">
			<h3>Login Users</h3>
			<form class="style-form" action="login.php" method="post" accept-charset="utf-8">
				<div class="form-group">
					<input class="form-control" type="text" name="" id="email" placeholder="Email" >
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="" id="password" placeholder="Password" >
				</div>
				<input class="btn btn-primary" type="button" value="Log In" id="login">
			</form>

			<p id="response"></p>

	</div>




	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script type="text/javascript" src="main.js"></script>
</body>
</html>