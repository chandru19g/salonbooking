<?php
            #starting session
    session_start();
    error_reporting(0);
            #checking the click of the button
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "salonbook";
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                        
                        #checking db connection
    if($conn === false){
        die('Connect Error('.mysql_connect-errno().')'.mysqli_connect_error());
    }
    else{
        if(isset($_POST['submit'])){
                    #checking whether the fields are filled
            // $host = "localhost";
            // $dbusername = "root";
            // $dbpassword = "";
            // $dbname = "salonbook";
            // $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                        
            //             #checking db connection
            // if($conn === false){
            //     die('Connect Error('.mysql_connect-errno().')'.mysqli_connect_error());
            // }
            
            $id = $_GET['viewid'];
            $status = $_POST['status'];

            $query=mysqli_query($conn, "UPDATE  customer SET status='$status' WHERE id='$id' ");
            if ($query) {
                $msg="All remark has been updated.";
            }
            else
            {
                $msg="Something Went Wrong. Please try again";
            }
        }
        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Salon Booking System</title>
        <!-- <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
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
        <?php include_once('includes/dash.php'); ?>
        <?php include_once('includes/header.php'); ?>
        <div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">View Appointment</h3>
					
					
				
					<div class="table-responsive bs-example widget-shadow">
                    <!-- <div class="inner">
                    <h3 class="masthead-brand">Admin page</h3>
                        <nav class="nav nav-masthead justify-content-center">
                            <a class="nav-link active" href="loconn.php">Appointments</a>
                            <a class="nav-link" href="feature.php">Feature</a>
                            <a class="nav-link" href="contact.php">Contact</a>
                            <a class="nav-link" href="adlog.php">Logout</a><br>
                        </nav>
                    </div><br> -->
                    <h4>View Appoitment:</h4>
                    <p style="font-size:16px; color:red" align="center"><?php if($msg){
                        echo $msg;
                        }?>
                    </p>
                    <?php
                        $id=$_GET['viewid'];
                        $ret=mysqli_query($conn,"select * from customer where id='$id'");
                        while ($row=mysqli_fetch_array($ret)) {
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td><?php  echo $row['customername'];?></td>
                        </tr>          
                        <tr>
                            <th>Mobile Number</th>
                            <td><?php  echo $row['mobile'];?></td>
                        </tr>
                        <tr>
                            <th>Appointment Date</th>
                            <td><?php  echo $row['apttime'];?></td>
                        </tr>
                        <tr>
                            <th>Services</th>
                            <td><?php  echo $row['work'];?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td> <?php  
                                if($row['status']=="1")
                                {
                                echo "Accept";

                                include_once("includes/msg.php");
                                }

                                if($row['status']=="2")
                                {
                                echo "Reject";
                                include_once("includes/msgr.php");
                            }

                            ;?></td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <?php if($row['status']==""){ ?>


                        <form name="submit" method="post" enctype="multipart/form-data"> 

                            <tr>
                                <th>Status :</th>
                                <td>
                                <select name="status" class="form-control wd-450" required="true" >
                                    <option value="1" selected="true">Selected</option>
                                    <option value="2">Rejected</option>
                                </select></td>
                            </tr>

                            <tr align="center">
                                <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
                            </tr>
                        </form>
                        <?php } ?>
						<?php } ?>
                    </table>
                        </div>
                </div>
                </div>
                </div>
                </div>
            </header>
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