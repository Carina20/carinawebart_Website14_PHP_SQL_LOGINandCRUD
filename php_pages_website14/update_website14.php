<?php
ob_start();
session_start();
require_once 'dbconnectWebsite14.php';

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


if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM the_event WHERE id = '$id' ";
   $result = mysqli_query($conn,$sql);
   $data = $result->fetch_assoc();

   $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
   <title> Admin_Update records </title>

   <style type= "text/css">
       fieldset {
           margin: auto;
            margin-top: 100px;
           width: 50% ;
       }

       table tr th  {
           padding-top: 20px;
       }
   </style>

</head>
<body>

<fieldset>
   <legend>Update records</legend>

   <form action="actions_website14/a_update_website14.php" method= "post">
       <b><table cellspacing= "3" cellpadding="3"> 
             <tr>
               <td>id</td>
               <td><input  type="number" name= "id" value ="<?php echo $data['id'] ?>" /></td> 
           </tr>
             <tr>
               <td>Name</td>
               <td><input  type="text" name= "name" value ="<?php echo $data['name'] ?>" /></td> 
           </tr>
             <tr>
               <td>Capacity</td>
               <td><input  type="number" name= "capacity" value ="<?php echo $data['capacity'] ?>" /></td> 
           </tr>
           <tr>
               <td>DateAndTime</td>
               <td><input  type="text" name= "DateAndTime" value ="<?php echo $data['DateAndTime'] ?>" /></td> 
           </tr>
           <tr>
               <td>Address</td>
               <td><input type="text"  name="address" value ="<?php echo $data['address'] ?>" /></td>
           </tr>
           <tr>
               <td>Description</td>
               <td><input  type="text" name= "description" value ="<?php echo $data['description'] ?>" /></td> 
           </tr>
            <tr>
               <td>URL</td>
               <td><input  type="text" name= "url" value ="<?php echo $data['url'] ?>" /></td>
           <tr>
               <td>Image</td>
               <td><input  type="text" name= "image" value ="<?php echo $data['image'] ?>" /></td>
            <tr>
               <td>E-mail</td>
               <td><input  type="text" name= "email" value ="<?php echo $data['email'] ?>" /></td>
           </tr>
              <tr>
               <td>Phone</td>
               <td><input  type="text" name= "phone" value ="<?php echo $data['phone'] ?>" /></td>
           </tr>
           <tr>
            <input type= "hidden" name= "id" value= "<?php echo $data['id']?>" />
               <td><br><button type ="submit">Update</button></td>
               <td><br><a href= "admin_website14.php"><button type="button">Back</button></a></td>
           </tr>
       </table></b>
   </form>

</fieldset>

</body>
</html>

<?php
}
?>