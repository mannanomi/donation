<?php
include('login.php');
if(empty($_SESSION['username'])){
	header('location: loginpage.php');
}


require_once 'db_connect.php';
if(isset($_POST['add-btn'])){
  $user = $_SESSION['username'];
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $category = mysqli_real_escape_string($db, $_POST['category']);
  $organization = mysqli_real_escape_string($db, $_POST['organization']);
  $exp = mysqli_real_escape_string($db, $_POST['exp']);
  $detail = mysqli_real_escape_string($db, $_POST['detail']);
  $goal = mysqli_real_escape_string($db, $_POST['goal']);
  $deadline = mysqli_real_escape_string($db, $_POST['deadline']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);

  $query = "INSERT INTO events (user, title, exp, goal, deadline, detail, organization, category, email, mobile) VALUES ('$user', '$title', '$exp', '$goal', '$deadline', '$detail', '$organization', '$category', '$email', '$mobile')";
    
  if (mysqli_query($db, $query)) {
  echo "<script type='text/javascript'>alert('Add successfully');window.location.href='dashboard.php';</script>";
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
  <title>Add Event</title>
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

  <?php if(isset($_SESSION['username'])): ?>
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
  <div class="container">
    <div class="jumbotron">
      <div class="row d-flex align-items-center justify-content-center">
          <form class="input-form" method="POST" enctype="multipart/form-data" >
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
              <h6 class="font-weight-bold mt-3">Organisation</h6>
              <input type="text" class="form-control" name="organization" required>
                <h6 class="font-weight-bold mt-3">Goal</h6>
              <input type="text" class="form-control" name="exp" required>
                <h6 class="font-weight-bold mt-3">Description</h6>
                <textarea name="detail" rows="5" cols="60" required></textarea>
                <h6 class="font-weight-bold mt-3">Amount</h6>
                <input type="text" class="form-control" name="goal" required>
                <h6 class="font-weight-bold mt-3">Deadline</h6>
                <input type="date" class="form-control" name="deadline" required>
                <h6 class="font-weight-bold mt-3">Email</h6>
                <input type="email" class="form-control" name="email" required>
                <h6 class="font-weight-bold mt-3">Mobile</h6>
                <input type="text" class="form-control" name="mobile" required>
               <br>
              <br>
              <button class="btn btn-info text-light font-weight-bold mt-3" type="submit" name="add-btn">Add</button>
          </form>
        </div>
      </div>

  </div>
<?php endif ?>
</body>
</html>
