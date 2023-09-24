<?php require_once('../zvinodiwa/database.php');
      require_once('../zvinodiwa/session.php');
      require_once('mazvi.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Climacast | Dashboard </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../vendor/Jquery-ui/jquery-ui.min.css">
<!--===============================================================================================-->
<style>
     /* Top Navigation Menu */
     .topnav {
      background-color: #333;
      overflow: hidden;
    }

    .topnav a {
      float: left;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 18px;
      transition: background-color 0.3s, color 0.3s;
    }

    .topnav a:hover {
      background-color: lightgreen;
      color: black;
    }

    /* Responsive design for small screens */
    @media screen and (max-width: 600px) {
      .topnav a {
        float: none;
        display: block;
        text-align: left;
      }
    }

    .active {
      background-color:green;
    }
  </style>
</head>
    <body>
      <!-- Top Navigation Menu -->
 <div class="topnav">
    <a href="farmer_dashboard.php" class="active">Farmer dashboard</a>
    <a href="index.html">Search weather forecast</a>
    <a href="farmer_pest_view.php">pest control tips</a>
   
  </div>

    <br><hr>
    <div class="wrapper">
        <!-- Sidebar  -->
     <?php  include_once ('farmer_page-headers.php'); ?>
            <div class="row">
           
    <div class="col-md-3">
      <div class="card-counter warning">
        <i class="fa fa-user-circle-o"></i>
        <span class="count-numbers"></span>
        <span class="count-name"></span>
      </div>
    </div>
 <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-info"></i>
        <span class="count-numbers"><?php echo $sammac1;?></span>
        <span class="count-name">Pest Control Tips</span>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-thermometer-half"></i>
        <span class="count-numbers"><?php echo $sammac2;?></span>
        <span class="count-name">Weather records</span>
      </div>
    </div>
     <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
        <span class="count-numbers"></span>
        <span class="count-name">Users</span>
      </div>
    </div>
  
           
            </div>
           
            <div class="line"></div>
            
             <div class="line"></div>
                <footer>
            <p class="text-center sm-sys">
          Climacast- <?php echo date('Y');?> &copy; All Rights Reserved 
            </footer>
           <div class="line"></div> 
        
        </div>
    </div>
  
       
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
    <script src="../vendor/Jquery-ui/jquery-ui.min.js"></script>
   
</body>
</html>