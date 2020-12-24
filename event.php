<?php

if(isset($_GET['id'])){
  $id = $_GET['id'];
}

require_once 'db_connect.php';

$query = "SELECT * FROM events WHERE id= '$id'";
$result= mysqli_query($db,$query);

if (mysqli_num_rows($result) == 1){
  $row = mysqli_fetch_assoc($result);
  $title = $row['title'];
  $req = $row['exp'];
  $goal = $row['goal'];
  $deadline = $row['deadline'];
  $detail = $row['detail'];
  $organization = $row['organization'];
  $email = $row['email'];
  $mobile = $row['mobile'];
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Job Details</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container">
   <!-- Brand -->
   <a class="navbar-brand" href="#"> Give Donation</a>

   <!-- Links -->
   <ul class="navbar-nav mx-auto">
     <li class="nav-item">
       <a class="nav-link" href="index.php">Home</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="loginpage.php">Log In</a>
     </li>
   </ul>
  </div>
  </nav>
  <div class="container">
    <div class="jumbotron">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="font-weight-bold text-light"><?php echo $title; ?> </h3>
        </div>
        <div class="card-body">
          <h5><b>Organization Name:</b> <?php echo $organization; ?> </h5>
          <h6><b>Requirement:</b> <?php echo $req; ?> </h6>
          <h6><b>Detail:</b> <?php echo $detail; ?> </h6>
          <h6><b>Amount:</b> <?php echo $goal; ?> </h6>
          <h6><b>Deadline:</b> <?php echo $deadline; ?> </h6>
          <h6><b>Email:</b> <?php echo $email; ?> </h6>
          <h6><b>Mobile:</b> <?php echo $mobile; ?> </h6>

        </div>
          <div class="card-footer">
        <a class="btn btn-primary" href="donate.html" role="button">Donate</a>
      </div>
      </div>
    </div>
  </div>

</body>
</html>
