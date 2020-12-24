<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>



<!DOCTYPE html>
<html>
<head>
  <title>Give Donation</title>
  <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="donationb.css"> -->
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
 <a class="navbar-brand" href="index.php">Give Donation</a>

 <!-- Links -->
 <ul class="navbar-nav mx-auto">
   <li class="nav-item">
     <a class="navbar-brand" href="index.php">Event Home</a>
   </li>
     
 </ul>
</div>
</nav>
<div class="jumbotron">
<div class="container">
  <div class="row">

<?php
require_once 'db_connect.php';

$search='';

if(isset($_GET['search'])){
  $search = $_GET['search'];
}

if($search == 'All' || $search == ''){
  $query = "SELECT * FROM events ORDER BY deadline";
}else{
  $query = "SELECT * FROM events WHERE category='$search' ORDER BY deadline";
}

    $result= mysqli_query($db,$query);

    if (mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $title = $row['title']; 
        $detail = $row['detail'];
        $organization = $row['organization']; 
        $exp = $row['exp'];
        $deadline = $row['deadline'];
?>



    <div class="col-12 col-sm-4 col-md-3 mt-3">
      <div class="card" style="height: 550px; width: 250px;">
      <div class="card-header bg-dark text-light">
        <h5><?php echo $title; ?></h5>
      </div>
      <div class="card-body">
        <p><?php echo $detail; ?></p>
        <h6 class="font-weight-bold">Organization:</h6>
        <p><?php echo $organization; ?></p>
        <h6 class="font-weight-bold">Requirement:</h6>
        <p><?php echo $exp; ?></p>
        <h6 class="font-weight-bold">Deadline:</h6>
        <p><?php echo $deadline; ?></p>
          <a href="event.php?id=<?php echo $id; ?>">read more</a>
      </div>
      <div class="card-footer">
      <a class="btn btn-primary" href="#" role="button">Donate</a>
      
      </div>
    </div>
    </div>

    <?php
          }
        }
     ?>

</div>
  </div>
</div>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>