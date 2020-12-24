<?php

session_start();

if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['user_name']);

		header('location: index.php');
	}


?>
