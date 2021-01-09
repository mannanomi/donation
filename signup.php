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

	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
	  <div class="container">
	 <!-- Brand -->
	 <a class="navbar-brand" href="#">Give Donation</a>

	 <!-- Links -->
	 <ul class="navbar-nav mx-auto">
	   <li class="nav-item">
	     <a class="nav-link" href="index.php">Home</a>
	   </li>
	        <div class="dropdown ml-3">
<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
 Log In
</button>
<div class="dropdown-menu">
  <a class="dropdown-item" href="userlogin.php">As User</a>
  <a class="dropdown-item" href="loginpage.php">As Admin</a>
</div>
</div>

	<div class="dropdown ml-3">
	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	  Select Category
	</button>
	<div class="dropdown-menu">
	  <a class="dropdown-item" href="index.php?search=All">All</a>
	  <a class="dropdown-item" href="index.php?search=Social">Social Action</a>
	  <a class="dropdown-item" href="index.php?search=Education">Education</a>
	  <a class="dropdown-item" href="index.php?search=Disaster">Disaster</a>
	  <a class="dropdown-item" href="index.php?search=EnvironmentEnvironment">Environment</a>
	  <a class="dropdown-item" href="index.php?search=Health">Health & Medical</a>
	</div>
	</div>
	 </ul>
	</div>
	</nav>

	<div class="container">
        

			<div class="row d-flex align-items-center justify-content-center" style="height:100vh;">
					<form class="input-form" action="signup-check.php" method="post">
             <h3>Create new account</h3>
            <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	    <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
                        
           <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      class="form-control"
                      name="name" 
                      placeholder="name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      class="form-control"
                      name="name" 
                      placeholder="name"><br>
          <?php }?>

          <label>Username</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      class="form-control"
                      name="uname" 
                      placeholder="username"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      class="form-control"
                      name="uname" 
                      placeholder="username"><br>
          <?php }?>
          <label>Email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="text" 
                      class="form-control"
                      name="email" 
                      placeholder="email"
                      value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      class="form-control"
                      name="email" 
                      placeholder="email"><br>
          <?php }?>
          <label>Mobile Number</label>
          <?php if (isset($_GET['mobile'])) { ?>
               <input type="text" 
                      class="form-control"
                      name="mobile" 
                      placeholder="mobile"
                      value="<?php echo $_GET['mobile']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      class="form-control"
                      name="mobile" 
                      placeholder="mobile"><br>
          <?php }?>

     	<label>Password</label>
            	<input type="password" 
                 class="form-control"
                 name="password" 
                 placeholder="password"
                 id="Input_pass" required><br>
 
          <label>Confirm Password</label>
          <input type="password" 
                 class="form-control"
                 name="re_password" 
                 placeholder="confirm password"
                 id="Input_pass" required><br>

						<div class="clearfix mt-3 mb-2">
							<div class="float-left">
								<input type="checkbox" onclick="show_passord()"><span class="ml-3">Show Password</span><br>
							</div>
							<button class="btn btn-info float-right text-light font-weight-bold" type="submit" name="login-btn">Sign up</button>
						</div> 
    
						<h6 class="font-weight-bold text-center">If you Forgot your Username or Password please contact with the webmaster</h6>
                     <a href="userlogin.php"> Already have an account Login</a>
					</form>
                
			</div>
          
	</div>

<script type="text/javascript">

    function show_passord() {
      var x = document.getElementById("Input_pass");
      if (x.type === "password") {
        x.type = "text";
        } else {
        x.type = "password";
        }
    }

</script>


</body>
</html>
