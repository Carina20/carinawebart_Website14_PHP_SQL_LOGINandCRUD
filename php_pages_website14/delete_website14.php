<?php

ob_start();
session_start();

require_once 'dbconnectWebsite14.php';


if( !isset($_SESSION['admin' ]) && !isset($_SESSION['user']) ) {
 header("Location: index_website14.php");
 exit;
}
if(isset($_SESSION['user' ]) ) {
  header("Location: home_website14.php");
  exit;
}

$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);


if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM the_event WHERE id = '$id'" ;
   $result = $conn->query($sql) or die($conn->error);  
   $data = $result->fetch_assoc();

   $conn->close();
?>


<!DOCTYPE html>
<html>
<head>
   <title>Delete record</title>
</head>
<body>

<h3>Do you really want to delete this record?</h3>
<form action = "actions_website14/a_delete_website14.php" method="post">

   <input type="hidden" name="id" value="<?php echo $data['id']  ?>" />
   <button type="submit">Yes, delete it!</button>
   <a href="admin_website14.php"><button type="button">No, go back!</button></a>
</form>

</body>
</html>

<?php
}
?>
