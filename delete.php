<?php

include('login.php');
if(empty($_SESSION['username'])){
	header('location: loginpage.php');
}

?>

<?php if(isset($_SESSION['username'])): ?>
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
require_once 'db_connect.php';
$query =" DELETE FROM events WHERE id = '$id'";
if (mysqli_query($db, $query)) {
echo "<script type='text/javascript'>alert('Delete successfully');window.location.href='update_job.php';</script>";
} else {
echo "Error: " . $query . "<br>" . mysqli_error($db);
}
?>
<?php endif ?>
