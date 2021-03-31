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
   $name = $_POST['name'];
   $capacity = $_POST['capacity'];
   $url = $_POST[ 'url'];
   $email = $_POST[ 'email'];
   $description = $_POST[ 'description'];
   $phone = $_POST[ 'phone'];
   $address = $_POST['address'];
   $image = $_POST['image'];
    $DateAndTime = $_POST['DateAndTime'];

   $sql = "INSERT INTO the_event (id, name, capacity, url, email, description, phone, address, image, DateAndTime) VALUES ('$id', '$name', '$capacity', '$url', '$email', '$description', '$phone', '$address', '$image', '$DateAndTime')";
    if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../create_website14.php'><button type='button'>Back</button></a>";
        echo "<a href='../admin_website14.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}



