<?php
include('login.php');
if(empty($_SESSION['username'])){
    header('location: loginpage.php');
    
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Give Donation</title>
    <style>
        .image{
           
            box-shadow: 3px 3px 6px lightgrey;
        }
    </style>
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
	 <a class="navbar-brand" href="#">Give Donation</a>

	 <!-- Links -->
	 <ul class="navbar-nav ml-auto">
          <li class="nav-item">
	         <a class="nav-link" href="dashboard.php">Dashboard</a>
	       </li> 
		 <li class="nav-item">
    <a class="btn btn-warning btn-sm font-weight-bold" href="logout.php?logout='1'">Logout</a>
	   </li>

	 </ul>
	</div>
	</nav>
      <div class="jumbotron">
<div class="container">
    <br>
    <h1> " Making a donation is the ultimate sign of solidarity. Actions speak louder than words." </h1>
    <br>
    <br>
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
        $image=$row["image"];
        $title = $row['title']; 
        $detail = $row['detail'];
        $organization = $row['organization']; 
        $exp = $row['exp'];
        $deadline = $row['deadline'];
?>



    <div class="col-12 col-sm-4 col-md-3 mt-3">
      <div class="card" style="height: 820px; width: 250px;">
     <img class="image" src="eventspicture/<?php echo $image ?>"width="248px" height="200px">
      <div class="card-header bg-dark text-light">
        <h5><?php echo $title; ?></h5>
      </div>
      <div class="card-body">
        <p><?php echo $detail; ?></p>
        <h6 class="font-weight-bold">Organization:</h6>
        <p><?php echo $organization; ?></p>
        <h6 class="font-weight-bold">Amount:</h6>
        <p><?php echo $exp; ?></p>
        <h6 class="font-weight-bold">Deadline:</h6>
        <p><?php echo $deadline; ?></p>
          <a href="event.php?id=<?php echo $id; ?>">read more</a>
      </div>
      <div class="card-footer">
      <a class="btn btn-primary" href="donatenow.php" role="button">Donate</a>
      
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