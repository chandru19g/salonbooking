<?php
session_start();
error_reporting(0);
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
            <?php include_once('includes/dash.php'); ?>
            <?php include_once('includes/header.php'); ?>
            <?php include('includes/help.php'); ?>
            <div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<center><h3 class="title1"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg> Admin Profile</h3></center>
                        <div class="table-responsive bs-example widget-shadow">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Shop Name<b></td>
                                    <td><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Contact</b></td>
                                    <td><?php echo $row['contact']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Area</b></td>
                                    <td><?php echo $row['area']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>City</b></td>
                                    <td><?php echo $row['city']; ?></td>
                                </tr>
                            </table>
                        </div>
                </div>
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