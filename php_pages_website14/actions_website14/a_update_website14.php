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
    $id= $_POST[ 'id'];
   $name= $_POST[ 'name'];
   $capacity= $_POST[ 'capacity'];
   $description = $_POST['description'];
   $address= $_POST[ 'address'];
   $image= $_POST[ 'image'];
   $DateAndTime= $_POST[ 'DateAndTime'];
   $phone= $_POST[ 'phone'];
   $url= $_POST[ 'url'];
   $email= $_POST[ 'email'];

   $id = $_POST['id'];



$sql = "UPDATE the_event SET name = '$name', capacity = '$capacity', description = '$description', address = '$address', image = '$image', DateAndTime = '$DateAndTime', email = '$email', url='$url', phone='$phone' WHERE id = '$id' " ;
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../admin_website14.php'><button type='button'>Home_admin</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}


?>
