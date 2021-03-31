<?php
ob_start();
session_start();
require_once 'dbconnectWebsite14.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin' ]) && !isset($_SESSION['user']) ) {
 header("Location: index_website14.php");
 exit;
}
if(isset($_SESSION['user' ]) ) {
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
	<meta charset="UTF-8" author="Carina" content= "Eventpage">
	<meta name="viewport" content ="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../styles_website14.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Welcome - <?php echo $userRow['userName' ]; ?></title>
</head>

<body>

<header>
	
		<div class="header_hero">
			<div class="row">
				<div class="col-sm-12">
					<div id="Welcome_field"> Hi, <?php echo $userRow['userName' ]; ?></div> <div><a id="Signout_field" href="logout_website14.php?logout">Sign Out</a></div>
				</div>
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
        <a class="nav-link" id="home" href="home_website14.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" style="color: rgb(154,0,154);" id="link_insert" href="create_website14.php"> Add event</a>
      </li>
    </ul>
  </div>

</nav>

	</header>

<main>


  <div class="container-fluid main_container">

    <div class="card-deck">

      <div class="row" id="main_row">
      

    
  <?php

      $db = mysqli_connect("localhost","root","","eventpage_php"); 
      $sql = "SELECT image, name, description, DateAndTime, capacity, url, email, phone, address FROM the_event";
      $result = $db->query($sql);
      while ($row=mysqli_fetch_assoc($result)) {


      echo ' <div class="col-xs-8 col-sm-10 col-md-8 col-lg-8">
      <div id="img_div"><img src='; printf ($row['image']); echo' </div>
      <div class="card border-light">
      <div class="card-body card_body">
                  
            <h5 class="card-title">'; printf ("<b> %s </b>", $row["name"]); echo '</h5>

        <p class="card-text">'; printf ($row["description"]); echo '</p>
        <p class="card-text DateAndTime">'; printf ("<span style='color: purple;'>Date&Time:</span> %s", $row["DateAndTime"]); echo '</p>
        <p class="card-text capacity">'; printf ("<span style='color: purple;'> Capacity:</span> %s", $row["capacity"]); echo '</p>
        <p class="card-text address">'; printf ("<span style='color: purple;'> Address:</span> %s", $row["address"]); echo '</p>
       <p class="card-text more_info">'; printf ("<span style='color: purple;'> More information:</span> %s", $row["url"]); echo '</p>
       <p class="card-text phone">'; printf ("<span style='color: purple;'> More information:</span> %s", $row["phone"]); echo '</p>
       <p class="card-text email">'; printf ("<span style='color: purple;'> E-mail:</span> %s", $row["email"]); echo '</p>
        <p class="card-text buttons">'; printf ("<a href='update_website14.php?name=" .$row['id']."'><button type='button'>Update</button></a><a href='delete_website14.php?name=" .$row['id']."'><button type='button'>Delete</button></a><br>"); echo '</p>
      </div>
         </div>
         </div>';
    
      }

    ?>

    </div> <!--------------  end of main_row -------------------------->
      </div> <!--------------  end of card-deck -------------------------->
     </div>   <!--------------  end of container -------------------------->

     
</main>

 <footer>

  <div id="footer_div1">
  </div>

  <div id="footer_div2">
    <div class="footer_logo">&#169;Stadtevents</div>
  </div>

  </footer>




</body>
</html>
<?php ob_end_flush(); ?>