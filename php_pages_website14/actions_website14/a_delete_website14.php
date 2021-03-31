<?php 

ob_start();
session_start();
require_once '../dbconnectWebsite14.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin' ]) && !isset($_SESSION['user']) ) {
 header("Location: index_website14.php");
 exit;
}
if( isset($_SESSION['user' ]) ) {
  header("Location: home_website14.php");
  exit;
}

// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

if ($_POST) {
   $id = $_POST['id'];

   $sql = "DELETE FROM the_event WHERE id = '$id'";
    if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
       echo "<a href='../admin_website14.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error updating record : " . $connect->error;
   }

   $conn->close();
}

?>