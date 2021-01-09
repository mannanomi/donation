<?php
include('login.php');
if(empty($_SESSION['username'])){
	header('location: loginpage.php');
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>

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
<style>
        
        h3{
            text-align: center;
            color: midnightblue;
        }
        table{
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 10px 20px 0 rgba(0,0,0,.03);
    border-radius: 10px;
    margin: auto;
}

th,td{
    border: 1px solid #f2f2f2;
    padding: 8px 30px;
    text-align: center;
    color: gray;
}

th{
    text-transform: uppercase;
    font-weight: 500;
}

td{
    font-size: 13px;
}</style>
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
       <div class ="table-responsive">
          
       <table>
            <h3> List of Donors</h3><br>
           <thead>
               <tr><th>ID</th>
                <th>Username </th>
                <th>Full Name </th>
                <th> Email </th> 
                <th>Mobile</th>
               </tr>
           </thead>
           <tbody>
               <?php

                include 'db_connect.php';

                $selectquery = " select * from users ";
                $query = mysqli_query($db,$selectquery);



                $nums = mysqli_num_rows($query);


                $res = mysqli_fetch_array($query);

                while($res = mysqli_fetch_array($query)){
                ?>
                   

                    <tr>
                        <td> <?php echo $res['id']; ?></td>
                        <td> <?php echo $res['user_name']; ?></td>
                        <td> <?php echo $res['name']; ?></td>
                        <td> <?php echo $res['email']; ?></td>
                        <td> <?php echo $res['mobile']; ?></td>
                
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



 </body>
 </html>
