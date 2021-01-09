<?php
include('login.php');
if(empty($_SESSION['username'])){
	header('location: loginpage.php');
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    
    <title>Send message</title>
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
<title>Admin</title>
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

<div class="container mt-3">
    <div class ="main-div">
     
    
       <div class ="center-div">
        <div class="row justify-content-between">
        <div class="col-md-4 col-md-offset-4">
            
            <?php if(isset($POST['submit'])){ ?>
            
            <div class="alert alert-dismissible alert-success">
            <p> <?php echo $msg;?></p>
            
            </div>
            <?php } ?>
            
        <div class="panel panel-default">        
                <div class="panel-heading" style="background: #fffffff";> <strong>Send Message</strong></div>
            <div class="panel-body">
            <form action="sentmessage.php" method="POST">
                <textarea rows="3" cols="43" placeholder="Enter Message" name="message" class="col-md-12" style="margin-bottom: 5px;"></textarea>
                
                <table class="table table-bordered ">
                <tbody>
                    <tr>
                    
                      <th></th>
                        <th>Name</th>
                        <th>Mobile</th>
                    </tr>
                    <?php  
                    
                    include('db_connect.php');
                    $query = "SELECT * FROM users";
                    $data = mysqli_query($db,$query) or die ('error');
                    if(mysqli_num_rows($data)>0){
                        
                        while($row = mysqli_fetch_assoc($data)){
                            $id = $row['id'];
                            $username = $row['user_name'];
                            $mobile = $row['mobile'];
                          ?>
                       <tr>
                    
                            <td>
                           <input class="checkbox" type="checkbox" name="mobile[]" value=<?php echo $mobile;?>>
                                </td>
                                <td><?php echo $username;?></td>
                                <td><?php echo $mobile;?> </td>
                
                    </tr>
                    
                    <?php
                        }
                    }
                    
                  ?>  
                    </tbody>            
                </table>
                        <input type="submit" class="btn btn-primary" name="submit" style="width: 100%;">
                </form>
            </div>    
                 </div>
                     </div>
                         </div>
                             </div>

</div>

    </div>
     

 </body>
 </html>



    
    
    
        