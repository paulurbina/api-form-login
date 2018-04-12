<?php
session_start();

if (!isset($_SESSION['loggedIN'])) {
	header('Location: login.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bienvenido</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<div class="container">
		<a href="logout.php" title="">Log Out</a> You are logged IN!.
		<div class="welcome">
			<div class="alert alert-success">
				<?=$_SESSION['message']?>
			</div>
			Welcome: <span class="user"><?=$_SESSION['firstName']?></span>
		</div>
	</div>





</body>
</html>