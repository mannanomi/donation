<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Account</title>
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
    if(empty($_SESSION['user_name'])){
    	header('location: userlogin.php');
    }
     ?>

<?php if(isset($_SESSION['user_name'])):

$uname = $_SESSION['user_name'];

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
    <h4 class="text-center"><b><?php echo $uname; ?></b></h4>
    <div class="row">
<?php


        require_once 'db_connect.php';
        $query = "SELECT * FROM users WHERE user_name='$uname' ";
        $result= mysqli_query($db,$query);
        if (mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            $unmae = $row['user_name'];
            $name = $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
    ?>



        <div class="col-12 col-sm-4 col-md-3 mt-3">
          <div class="card" style="height: 350px;">
          <div class="card-header bg-dark text-light">
            <h5><?php echo $name; ?></h5>
          </div>
          <div class="card-body">
            <h6 class="font-weight-bold">Email</h6>
            <p><?php echo $email; ?></p>
            <h6 class="font-weight-bold">Mobile</h6>
            <p><?php echo $mobile; ?></p>
          </div>
          <div class="card-footer">
            <a href="uupdate.php?id=<?php echo $id; ?>">Update Now</a>
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
