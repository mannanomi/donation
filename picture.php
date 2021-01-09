<?php
include('login.php');
if(empty($_SESSION['username'])){
  header('location: loginpage.php');
}
 ?>

<?php


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update</title>
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



     <?php if(isset($_SESSION['username'])):

       if(isset($_GET['id'])){
         $id = $_GET['id'];
       }

       if(isset($_POST['update-btn'])){
       require_once 'db_connect.php';
         $user = $_SESSION['username'];
         $title = mysqli_real_escape_string($db, $_POST['title']);
         $image = $_FILES['image']['name'];
         $target = "eventspicture/".basename($image);
         

         $query = "UPDATE events SET image='$image' WHERE id='$id'";
         if (mysqli_query($db, $query)) {
             if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
         echo "<script type='text/javascript'>alert('Add successfully');window.location.href='dashboard.php';</script>";
       } else {
         echo "Error: " . $query . "<br>" . mysqli_error($db);
       }

       mysqli_close($db);
       }



       require_once 'db_connect.php';

       $query = "SELECT * FROM events WHERE id= '$id'";
       $result= mysqli_query($db,$query);

       if (mysqli_num_rows($result) == 1){
         $row = mysqli_fetch_assoc($result);
       }


        ?>

        <div class="container">
          <div class="jumbotron">
            <div class="row d-flex align-items-center justify-content-center">
                  <form method="POST" action="" enctype="multipart/form-data">
  	                 <div class="container">
  	                         <input type="file" name="image">
		                       <div>
		                 	<br>
			                <button class="btn btn-info text-light font-weight-bold mt-3" type="submit" name="update-btn">Update</button>
                      <a href="dashboard.php" class="btn btn-secondary">Back</a>
		                            </div>
                             
                                     </div>
                                  </form>
            
              </div>
            </div>
        </div>

      <?php endif ?>
<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>   
  </body>
</html>
