<?php
include('login.php');
if(empty($_SESSION['user_name'])){
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



     <?php if(isset($_SESSION['user_name'])):

       if(isset($_GET['id'])){
         $id = $_GET['id'];
       }

       if(isset($_POST['update-btn'])){
       require_once 'db_connect.php';
         $uname = $_SESSION['user_name'];
         $name = mysqli_real_escape_string($db, $_POST['name']);
         $email = mysqli_real_escape_string($db, $_POST['email']);
         $mobile = mysqli_real_escape_string($db, $_POST['mobile']);

         $query = "UPDATE users SET user_name='$uname', name='$name', email='$email', mobile='$mobile' WHERE id='$id'";
         if (mysqli_query($db, $query)) {
         echo "<script type='text/javascript'>alert('Add successfully');window.location.href='dashboard.php';</script>";
       } else {
         echo "Error: " . $query . "<br>" . mysqli_error($db);
       }

       mysqli_close($db);
       }



       require_once 'db_connect.php';

       $query = "SELECT * FROM users WHERE id= '$id'";
       $result= mysqli_query($db,$query);

       if (mysqli_num_rows($result) == 1){
         $row = mysqli_fetch_assoc($result);
         $name = $row['name'];
         $email = $row['email'];
         $mobile = $row['mobile'];
       }


        ?>

        <div class="container">
          <div class="jumbotron">
            <div class="row d-flex align-items-center justify-content-center">
                <form class="input-form" method="POST">
                    <h6 class="font-weight-bold">Event title</h6>
                    <input type="text" class="form-control" value="<?php echo $title; ?>" name="title" required>
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
                    <h6 class="font-weight-bold mt-3">Name</h6>
                    <input type="text" class="form-control" value="<?php echo $name; ?>" name="organization" required>
                      <h6 class="font-weight-bold mt-3">Email</h6>
                      <textarea name="exp" rows="5" cols="30" required><?php echo $email; ?></textarea>
                      <h6 class="font-weight-bold mt-3">Mobile</h6>
                      <textarea name="detail" rows="5" cols="30" required><?php echo $mobile; ?></textarea>
                    <button class="btn btn-info text-light font-weight-bold mt-3" type="submit" name="update-btn">Update</button>
                </form>
              </div>
            </div>

        </div>

      <?php endif ?>

  </body>
</html>
