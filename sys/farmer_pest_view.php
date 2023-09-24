<?php require_once('../zvinodiwa/database.php');
      require_once('../zvinodiwa/session.php');

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
     <link rel="stylesheet" type="text/css" href="../vendor/DataTables/datatables.min.css">
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
    <a href="farmer_dashboard.php">Farmer dashboard</a>
    <a href="index.html">Search weather forecast</a>
    <a href="farmer_pest_view.php" class="active">pest control tips</a>
   
  </div>


    <br><hr>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php  include_once ('farmer_page-headers.php'); ?>
            <div class="line"></div>
            <div class="line"></div>
            <div class="row">
            <div class="col-md-12 ssm">
            <div class="card">
            <p class="card-header sammac-media">All Tips</p>    
            <div class="card-body">
              <div id="tabs-4"><table class="table table-striped thead-dark table-bordered table-hover" id="mhishi">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Region</th>
                    <th>Date Added</th>
                    <th>ACTION</th>
                    </tr>
                </thead>
                    <?php
                     $a=1;
                    $query=mysqli_query($db,"select *from `agri_tips` ");
                     while($row=mysqli_fetch_array($query))
                        {
                          
                          ?>
                          <tr>
                              <td><?php echo $a;?></td>
                            <td><?php echo $row['type'];?></td>    
                            <td><?php echo $row['description'];?></td> 
                            <td><?php echo $row['region'];?></td>   
                            <td><?php echo $row['date_t'];?></td>
                             <td>    

                              </td>  
                          </tr>
                          <?php
                       
                            $a++;
                      }
                                          
                       if (isset($_GET['idx']) && is_numeric($_GET['idx']))
                      {
                          $id = $_GET['idx'];
                          if ($stmt = $db->prepare("DELETE FROM agri_tips WHERE id = ? LIMIT 1"))
                          {
                              $stmt->bind_param("i",$id);
                              $stmt->execute();
                              $stmt->close();
                               ?>
                    <div class="alert alert-warning " >
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Successfully! </strong><?php echo'Record Successfully Deleted';?></div>
                   <script>
                       setTimeout(function () {
                        window.location.href = "pest_view.php";
                        }, 5000); 
                      
                    </script>
            
                    <?php
                          }
                          

                      }
                
                      ?>
                </table> </div>
            </div>
            </div>    
            </div>
           
            </div>
             <div class="line"></div>
                <footer>
            <p class="text-center sm-sys">
         Climacast - <?php echo date('Y');?> &copy; All Rights Reserved Made with 
            </p>
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
    <script src="../vendor/DataTables/datatables.min.js"></script> 
        <script>
    $(document).ready( function () {
    $('#mhishi').DataTable();
           
    } );
        </script>
       
   
</body>
</html>