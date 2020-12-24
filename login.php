<?php
session_start();
require_once 'db_connect.php';



	if(isset($_POST['login-btn'])){
		$username = mysqli_real_escape_string($db, $_POST['username']);

		$password = mysqli_real_escape_string($db, $_POST['password']);

			$query = "SELECT * FROM admin WHERE username= '$username' AND password = '$password'";
			$result= mysqli_query($db,$query);

			if (mysqli_num_rows($result) == 1) {
			    // output data of each row
			    $row = mysqli_fetch_assoc($result);
			        $id = $row['id'];
			        $username = $row['username'];
					$db->close();


			        $_SESSION['username'] = $username;
			        header('location: dashboard.php');

			}else{
				 echo "<script type='text/javascript'>alert('Wrong Username or Password');window.location.href='loginpage.php';</script>";

			}

	}



 ?>
