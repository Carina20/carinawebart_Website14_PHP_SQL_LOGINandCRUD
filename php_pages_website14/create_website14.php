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
?>


<!DOCTYPE html>
<html>
<head>
   <title> Admin_Add event </title>

    <meta charset="UTF-8" author="Carina" content= "Eventpage">
  <meta name="viewport" content ="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../styles_website14.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


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



<body>

<header>
  
    <div class="container-fluid top_container">
      <div class="row" style="background-color: rgb(255,80,80); color:rgb(154,0,154)">
        
          <div id="Welcome_field"> Hi, <?php echo $userRow['userName' ]; ?></div> <div><a id="Signout_field" style="color:rgb(154,0,154);" href="logout_website14.php?logout">Sign Out</a></div>
    
      </div>
    </div>

  <nav class="navbar navbar-expand navbar-light">
    <li class="navbar-brand" style="color: rgb(154,0,154)">StadtEvents</li>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" id="home" href="admin_website14.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" style="color: purple;" id="link_insert" href="create_website14.php"> Add event</a>
      </li>
    </ul>
  </div>

</nav>

  </header>

<div class="container-fluid main_container">

<fieldset>
   <legend><b>Add event</b></legend>

   <form action="actions_website14/a_create_website14.php" method= "post">
       <b><table cellspacing= "3" cellpadding="3"> 
           <tr>
               <td>Id</td>
               <td><input  type="number" name="id" /></td>
           </tr>
           <tr>
               <td>Name</td>
               <td><input  type="text" name="name" /></td>
           </tr>    
           <tr>
               <td>Capacity</td>
               <td><input  type="text" name="capacity"  /></td>
           </tr>
           <tr>
               <td>Date&Time</td>
               <td><input type="text"  name="DateAndTime" /></td>
           </tr>
           <tr>
               <td>URL</td>
               <td><input  type="text" name="url" /></td>
           </tr>
           <tr>
               <td>Description</td>
               <td><input  type="text" name="description" /></td>
           </tr>
            <tr>
               <td>Phone</td>
               <td><input  type="text" name= "phone"  /></td>
           </tr>
           <tr>
               <td>Image</td>
               <td><input type="text" name="image"  /></td>
           </tr>
            <tr>
               <td>E-mail</td>
               <td><input  type="text" name= "email"  /></td>
           </tr>
             <tr>
               <td>Address</td>
               <td><input  type="text" name= "address"  /></td>
           </tr>
           <tr>
               <td><br><button type ="submit" style="background-color: rgb(255,80,80); color: rgb(154,0,154); font-weight:bold;">Insert</button></td>
               <td><br><a href= "admin_website14.php"><button type="button" style="background-color: rgb(255,80,80); color: rgb(154,0,154); font-weight:bold;">Back</button></a></td>
           </tr>
       </table></b>
   </form>

</fieldset >

</div>

<footer>

  <div id="footer_div1">
  </div>

  <div id="footer_div2">
    <div class="footer_logo">&#169;Stadtevents</div>
  </div>

  </footer>

</body>
</html>