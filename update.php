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
         $category = mysqli_real_escape_string($db, $_POST['category']);
         $organization = mysqli_real_escape_string($db, $_POST['organization']);
         $exp = mysqli_real_escape_string($db, $_POST['exp']);
         $detail = mysqli_real_escape_string($db, $_POST['detail']);
         $goal = mysqli_real_escape_string($db, $_POST['goal']);
         $deadline = mysqli_real_escape_string($db, $_POST['deadline']);
         $contact = mysqli_real_escape_string($db, $_POST['contact']);

         $query = "UPDATE events SET user='$user', title='$title', exp='$exp', goal='$gaol', deadline='$deadline', detail='$detail', organization='$organization', category = '$category', contact ='$contact' WHERE id='$id'";
         if (mysqli_query($db, $query)) {
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
         $title = $row['title'];
         $req = $row['exp'];
         $goal = $row['goal'];
         $deadline = $row['deadline'];
         $detail = $row['detail'];
         $organization = $row['organization'];
         $contact = $row['contact'];
         $category = $row['category'];
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
                    <h6 class="font-weight-bold mt-3">Organization</h6>
                    <input type="text" class="form-control" value="<?php echo $organization; ?>" name="organization" required>
                      <h6 class="font-weight-bold mt-3">Requirement</h6>
                      <textarea name="exp" rows="5" cols="30" required><?php echo $req; ?></textarea>
                      <h6 class="font-weight-bold mt-3">Description</h6>
                      <textarea name="detail" rows="5" cols="30" required><?php echo $detail; ?></textarea>
                      <h6 class="font-weight-bold mt-3">Salary</h6>
                      <input type="text" class="form-control" name="goal" value="<?php echo $goal; ?>" required>
                      <h6 class="font-weight-bold mt-3">Deadline</h6>
                      <input type="date" class="form-control" name="deadline" value="<?php echo $deadline; ?>" required>
                      <h6 class="font-weight-bold mt-3">Email</h6>
                      <input type="email" class="form-control" name="contact" value="<?php echo $email; ?>" required>
                    <button class="btn btn-info text-light font-weight-bold mt-3" type="submit" name="update-btn">Update</button>
                </form>
              </div>
            </div>

        </div>

      <?php endif ?>

  </body>
</html>
