<?php
include('login.php');
if(empty($_SESSION['username'])){
	header('location: loginpage.php');
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>

 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<title>User</title>

 </head>
 <body>


<?php if(isset($_SESSION['username'])): ?>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
	  <div class="container">
	 <!-- Brand -->
	 <a class="navbar-brand" href="#">Give Donation</a>

	 <!-- Links -->
	 <ul class="navbar-nav ml-auto">
		 <li class="nav-item">
    <a class="btn btn-warning btn-sm font-weight-bold" href="logout.php?logout='1'">Logout</a>
	   </li>

	 </ul>
	</div>
	</nav>

<div class="container mt-3">

	<a class="btn btn-primary" href="add_event.php">add new event</a>
<a class="btn btn-primary" href="update_event.php">Update event</a>

</div>

<?php endif ?>


 </body>
 </html>
