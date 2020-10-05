<?php
session_start();
#error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['shop_id']==0)) {
  header('location:logout.php');
}else{ 
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Salon Booking System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="css/design.css" rel='stylesheet' type='text/css' />
        <!-- font CSS -->
        <!-- font-awesome icons -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- //font-awesome icons -->
        <!-- js-->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href="css/admin.css" rel="stylesheet" type="text/css" media="all"> 
        <!-- Custom styles for this template -->
        <!-- <style>
            tr:nth-child(even){
                background-color: #eee;
            }
            tr:nth-child(odd){
                background-color: #fff;
            }
            th{
                background-color: #eeee99;
                color: black;
                font-size: 10px;
            }
        </style> -->
        <script src="js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
        <!--//end-animate-->
        <!-- Metis Menu -->
        <script src="js/metisMenu.min.js"></script>
        <script src="js/custom.js"></script>
        <link href="css/style2.css" rel="stylesheet">
  </head>
  <body class="cbp-spmenu-push">
	<div class="main-content">      
        <?php include('includes/dash.php'); ?>
        <?php include('includes/header.php'); ?>
        <?php include('includes/help.php'); ?>
        <?php 
            $sql = "SELECT * FROM customer WHERE shop_name='$name' && status=' '";
            $result =$conn->query($sql);

            
        ?>
         <div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
                <h3 class="title1">New Appointment</h3>
                <div class="table-responsive bs-example widget-shadow">
        
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
                <h4>New Appoitment:</h4>
                <table  class="table table-bordered">
                    <tr>
                        <th>Customer Name</th>
                        <th>Work</th>
                        <th>Mobile</th>
                        <th>Appointment Time</th>
                        <th>Action</th>
                       <!-- <th>Book</th>-->
                    </tr>
                   
                <?php
                   if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                                    
                    echo "<tr><td>".$row['customername']."</td><td>".$row['work']."</td><td>".$row['mobile']."</td><td>".$row['apttime']."</td><td>";
                ?>
                
                <a href="check.php?viewid=<?php echo $row['id']; ?>">View</a>
                <?php
                          } } ?>
                </td></tr></table>
                                
                                
                            
                        
                    

              
                </center>
            <!-- </header> -->
          <!--  <main role="main" class="inner cover">
               
            </main>-->
        </div>
        </div>
    </div>
    <script src="js/classie.js"></script>
    <script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
    </script>
    <script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
    </body>
</html>
        <?php } ?>     