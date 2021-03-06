<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Event</title>
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

    <?php

    include('login.php');
    if(empty($_SESSION['username'])){
    	header('location: loginpage.php');
    }
     ?>

<?php if(isset($_SESSION['username'])):

$username = $_SESSION['username'];

   ?>
   <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
   	  <div class="container">
   	 <!-- Brand -->
   	 <a class="navbar-brand" href="#">Give Donation</a>

   	 <!-- Links -->
   	 <ul class="navbar-nav ml-auto">
       <li class="nav-item">
         <a class="nav-link" href="dashboard.php">Dashboard</a>
       </li>
   		 <li class="nav-item ml-3">
       <a class="btn btn-warning btn-sm font-weight-bold" href="logout.php?logout='1'">Logout</a>
   	   </li>

   	 </ul>
   	</div>
   	</nav>
  <div class="jumbotron">
  <div class="container">
    <h4 class="text-center"><b><?php echo $username; ?></b></h4>
    <div class="row">
<?php


        require_once 'db_connect.php';
        $query = "SELECT * FROM events WHERE user='$username' ORDER BY deadline";
        $result= mysqli_query($db,$query);
        if (mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $title = $row['title'];
            $exp = $row['exp'];
            $deadline = $row['deadline'];
            $email = $row['email'];
            $mobile = $row['mobile'];
              
    ?>



        <div class="col-12 col-sm-4 col-md-3 mt-3">
          <div class="card" style="height: 450px;">
          <div class="card-header bg-dark text-light">
            <h5><?php echo $title; ?></h5>
          </div>
          <div class="card-body">
            <h6 class="font-weight-bold">Amount:</h6>
            <p><?php echo $exp; ?></p>
            <h6 class="font-weight-bold">Deadline:</h6>
            <p><?php echo $deadline; ?></p>
              <h6 class="font-weight-bold">Email:</h6>
            <p><?php echo $email; ?></p>
              <h6 class="font-weight-bold">Mobile:</h6>
            <p><?php echo $mobile; ?></p>
          </div>
          <div class="card-footer">
            <a href="update.php?id=<?php echo $id; ?>">Update Now</a>
            <a class="text-danger ml-3" href="delete.php?id=<?php echo $id; ?>">Delete Now</a>
            <a href="picture.php?id=<?php echo $id; ?>">Update Picture</a>
              
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
  <?php endif ?>

  </body>
</html>
