
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
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="login.php" method="post" accept-charset="utf-8">
		<input type="text" name="" id="email" placeholder="Email"><br>
		<input type="password" name="" id="password" placeholder="Password"><br>
		<input type="button" value="Log In" id="login">
	</form>

	<p id="response"></p>




	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="main.js"></script>
</body>
</html>