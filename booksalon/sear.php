<?php
    session_start();
    #cheking if the search button clicked
    if (isset($_POST['search'])) {
        if(!empty($_POST['area'])){
            $area = $_POST['area'];
            $host ="localhost";
            $dbusename ="root";
            $dbpassword="";
            $dbname="salonbook";
                            
            $conn =new mysqli ($host, $dbusename, $dbpassword, $dbname);
            if($conn->connect_error){
                die('Connect Error ('. mysql_connect_errno() .') '. mysqli_connect_error());
            }
            else{ 
            $sql = "SELECT * FROM admin where area = '$area' ";
            $result =$conn->query($sql);

            if($result->num_rows > 0){
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <!--<script>
            $(function(){
                $(document).on("click", ".book", function(){
                    var getselectedvalues = $(".restab input:checked").parents("input").clone().appendTo($(".booclass tbody").add(getselectedvalues))
                })
            })
        </script>-->
        <link href="css/style3.css" rel="stylesheet">
        <!--<script>
            function removeSpaces(string) {
                return string.split(' ').join('');
            }
        </script>-->
    </head>
    <body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Book Salon</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="test.php">Home</a>
                    <a class="nav-link" href="feature.php">Features</a>
                    <a class="nav-link" href="contact.php">Contact</a><br>
                </nav>
            </div>
        </header>
        <main role="main" class="inner cover">
            <center>
                <hr>
              <h3 class="cover-heading" id="high" >Your search result</h3><a href="cusreg.php">Click to Search Other Area</a><br>
                
                <table id="table">
                    <tr>
                        <th>Salon name</th>
                        <th>Contact</th>
                    </tr>
                    <?php
                        while($row = $result->fetch_assoc()){
                    ?>
                    <tr>
                        <td>
                    <?php
                                    # $sname = $row['shop_name'];
                                        echo $row['shop_name'];
                                    
                    ?>
                            </a>
                        </td>
                        <td>
                    <?php
                                        echo $row["contact"];
                    ?>
                        </td>
                    </tr>
                    <?php
                                    }
                                }
                            }
                            $conn->close();
                        }
                        else{
                            echo "All fields must be filled";
                            die();
                        }
                    }
                    ?>
                </table><br>
               <!-- <button type="submit" class="book" >Book</button>-->
                <hr>
                <h3 class="cover-heading" id="high" >Enter your details</h3>
                <!-- <p>click the name of the salon to book the salon</p> 
                <a href="cusreg.php">Search Other Area</a>-->
            
                <form action="book.php" method="post" class="form-signin">
                    <div class="form-group row">
                        <label for="sname" class="sr-only">Salon Name</label>
                        <input type="text" id="sname" name="sname" class="form-control" onblur="this.value=removeSpaces(this.value);" placeholder="Salon name" required readonly>(click on the above table to fill) After filling click in this feild
                    </div>
                    <div class="form-group row">
                        <label for="cname" class="sr-only">Name</label>
                        <input type="text" id="cname" name="cname" class="form-control" placeholder="Enter the name" required>
                    </div>
                    <div class="form-group row">
                        <label for="work" class="sr-only">work</label>
                        <select type="text" id="work" name="work" class="form-control" required>
                            <option value="All">All</option>
                            <option value="Haircut">Haircut</option>
                            <option value="Clean-Shave">Clean-Shave</option>
                            <option value="Drimming">Drimming</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="mobile" class="sr-only">Mobile Number</label>
                        <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="eg:6378909876 " required>
                    </div>
                    <div class="form-group row">
                        <label for="apttime" class="sr-only">Mobile Number</label>
                        <input type="datetime-local" id="apttime" name="apttime" class="form-control" placeholder="dd-mm-yyyy --:-- " required>
                    </div>
                    <button name="cusbook" class="btn btn-lg btn-primary btn-block" type="submit">Book</button>
                </form>
                <script>
                    var table = document.getElementById('table');

                    for(var i=1 ; i<table.rows.length; i++){
                        table.rows[i].onclick = function(){
                            rIndex = this.rowIndex;
                            document.getElementById("sname").value = this.cells[0].innerHTML;
                        }
                    }

                    function removeSpaces(string) {
                        return string.split(' ').join('');
                    }
                
                </script>
            </center>
        </main>
       
    </div>
    </body>
</html>