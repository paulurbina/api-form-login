<?php
session_start();

if (!isset($_SESSION['loggedIN'])) {
	header('Location: login.php');
	exit();
}
?>
<a href="logout.php" title="">Log Out</a>
You are logged IN!.