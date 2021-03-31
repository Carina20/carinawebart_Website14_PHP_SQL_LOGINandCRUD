<?php
ob_start();
session_start();
require_once 'dbconnectWebsite14.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: index_website14.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Get in touch</title>
  <meta charset="UTF-8" author="Carina" content= "Eventpage">
  <meta name="viewport" content ="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../styles_website14.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
 </head>

 <body>

<header>
  
    <div class="container-fluid top_container">
      <div class="row" style="background-color: rgb(255,80,80); color:rgb(154,0,154)">
        
          <div id="Welcome_field"> Get in touch, <?php echo $userRow['userName' ]; ?></div> <div><a id="Signout_field" style="color:rgb(154,0,154);" href="logout_website14.php?logout">Sign Out</a></div>
    
      </div>
    </div>

  <nav class="navbar navbar-expand navbar-light">
    <li class="navbar-brand" style="color: rgb(154,0,154); font-weight:bold;">StadtEvents</li>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" style="color: rgb(154,0,154);" id="home" href="home_website14.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: rgb(154,0,154);" id="API" href="api_website14.php">Contact us</a>
      </li>
    </ul>
  </div>
  
  </nav>

  </header>




    <div class="container-fluid main_container">

     


        <div id="map"></div>

  

      
   
     </div>   <!--------------  end of main_container -------------------------->
     



<footer>

  <div id="footer_div1">
  </div>

  <div id="footer_div2">
    <div class="footer_logo">&#169;Stadtevents</div>
  </div>

  </footer>


        <script>
         var map;
         function initMap() {
           map = new google.maps.Map(document.getElementById('map'), {
             center: {lat: 48.20849, lng: 16.37208},
             zoom: 8
           });
         }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap"
        async defer></script>

      <script>
       var map;
       function initMap() {
           var vienna = {
               lat: 48.30694,
               lng: 14.28583
           };
           map = new google.maps.Map(document.getElementById('map'), {
               center: vienna,
               zoom: 8
           });
           var pinpoint = new google.maps.Marker({
               position: vienna,
               map: map
           });
       }
      </script>


 </body>
</html>
<?php ob_end_flush(); ?>