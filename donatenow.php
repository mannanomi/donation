
<?php

require_once 'db_connect.php';
if(isset($_POST['add-btn'])){
    
  $uname = mysqli_real_escape_string($db, $_POST['user_name']); 
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $category = mysqli_real_escape_string($db, $_POST['category']);
  $amount = mysqli_real_escape_string($db, $_POST['amount']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);

  $query = "INSERT INTO donate (user_name, title, category, amount, mobile) VALUES ( '$uname', '$title','$category','$amount', '$mobile')";
    
  if (mysqli_query($db, $query)) {
  echo "<script type='text/javascript'>alert(' Donation given successfully');window.location.href='index.php';</script>";
                                 } 
    
    else {
  echo "Error: " . $query . "<br>" . mysqli_error($db);
}

mysqli_close($db);
}


 ?>



<!DOCTYPE html>
<html>
<head>
  <title>Donation</title>
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
			 <a class="navbar-brand" href="#">Give Donation</a>

			 <!-- Links -->
			 <ul class="navbar-nav ml-auto">
				 <li class="nav-item">
	         <a class="nav-link" href="index.php">Home</a>
                 </li>

			 </ul>
			</div>
			</nav>
  <div class="container">
    <div class="jumbotron">
      <div class="row d-flex align-items-center justify-content-center">
          <form class="input-form" method="POST" enctype="multipart/form-data" >
              <h3>Donation Form</h3><br>
              <h6 class="font-weight-bold mt-3">Username</h6>
              <input type="text" class="form-control" name="user_name" required>
              <h6 class="font-weight-bold">Event title</h6>
              <input type="text" class="form-control" name="title" required>
              <div class="form-group mt-3">
               <label for="sel1" class="font-weight-bold">Select Category:</label>
               <select class="form-control" id="sel1" name="category" required>
                 <option value="Social">SOCIAL ACTION</option>
                 <option value="Education">EDUCATION</option>
                 <option value="Disaster">DISASTER RELIEF</option>
                 <option value="Environment">ENVIRONMENT</option>
                 <option value="Health">HEALTH & MEDICAL</option>
               </select>
              </div>
                <h6 class="font-weight-bold mt-3">Amount</h6>
              <input type="text" class="form-control" name="amount" required>
                <h6 class="font-weight-bold mt-3">Mobile</h6>
                <input type="text" class="form-control" name="mobile" required>
              <button class="btn btn-info text-light font-weight-bold mt-3" type="submit" name="add-btn">Donate</button>
          </form>
        </div>
      </div>

  </div>
</body>
</html>