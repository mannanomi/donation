<?php
include('login.php');
if(empty($_SESSION['user_name'])){
	header('location: userlogin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
                    
    
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">


  	<title>Log in Page</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
<?php if(isset($_SESSION['user_name'])): ?>
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
	  <div class="container">
	 <!-- Brand -->
	 <a class="navbar-brand" href="index">Give Donation</a>

	 <!-- Links -->
	 <ul class="navbar-nav mx-auto">
	   <li class="nav-item">
	     <a class="navbar-brand" href="userindex.php">Go To Events</a>
	   </li>
	 </ul>
	</div>
	</nav>

<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="ustyle.css" >

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                         <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
					</div>
					<div class="profile-usertitle-job">
					Donor
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="useraupdate.php">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Donation </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
                              </li>
                              <li>
                              <a href="userlogout.php?logout='1'">Logout</a>	
                              </li>
                              
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			 
<div class="container mt-3">

<div class ="main-div">
     
    
       <div class ="center-div">
       <div class ="table-responsive">
          
       <table>
            <h3> List of Donation</h3><br>
           <thead>
               <tr><th>ID</th>
                <th>Event Name </th>
                <th> Category </th> 
                <th> Amount</th>
               </tr>
           </thead>
           <tbody>
               <?php

                include 'db_connect.php';

                $selectquery = " select * from donate ";
                $query = mysqli_query($db,$selectquery);

                $nums = mysqli_num_rows($query);
                $res = mysqli_fetch_array($query);

                while($res = mysqli_fetch_array($query)){
                ?>
                   

                    <tr>
                        <td> <?php echo $res['id']; ?></td> 
                        <td> <?php echo $res['title']; ?></td> 
                        <td> <?php echo $res['category']; ?></td> 
                        <td> <?php echo $res['amount']; ?></td> 
                
                    </tr>
               
                <?php
                }
                   ?>
           </tbody>
           </table>
       </div>
     </div> 
     </div>

</div>
            </div>
		</div>
	</div>
</div>
<?php endif ?>
</body>
</html>
