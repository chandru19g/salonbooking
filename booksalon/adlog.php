<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['admlog']))
  {
    $shop_name=$_POST['shop_name'];
    $password=$_POST['password'];
    $query=mysqli_query($conn,"SELECT id from admin WHERE  shop_name='$shop_name' && password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['shop_id']=$ret['id'];
     header('location:profile.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Salon Booking System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <!-- <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>-->
    <!-- Custom styles for this template -->
    <link href="css/style1.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">Book Salon</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" href="test.php">Home</a>
        <a class="nav-link" href="feature.php">Features</a>
        <a class="nav-link" href="contact.php">Contact</a>
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
    <h3 class="cover-heading">Login</h3>
    <form role="form" method="post" action="">
        <div class="form-group row">
          <label for="sname" class="col-sm-2 col-form-label">ShopName</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="sname" name="shop_name" placeholder="Shop Name" required>
          </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" name="admlog" class="btn btn-primary">Login</button>
          </div>
        </div>
    </form>
    <div class="inner">
      <p>Don't have an account? <a href="adminreg.php">Register Here</a> &nbsp;&nbsp; You are a customer?<a href="cusreg.php">Click here</a></p>
    </div> 
  </main>


  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Book your salon , by chandru.</p>
    </div>
  </footer>
</div>
</body>
</html>