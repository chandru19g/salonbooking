<?php
    session_start();

    $shop_name = $_POST['shop_name'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //password vrification
    if( $password==$cpassword){
        #Field checking
        if ( !empty($shop_name) || !empty($contact) || !empty($city) || !empty($area) || !empty($password)) {
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "salonbook";
                
            #dbconnection
            $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
            if ($conn === false) {
                die('Connect error('.mysqli_connect_errorno().')'.mysqli_connect_error());
            }
            else{
                $select = "SELECT shop_name FROM admin WHERE shop_name = ? LIMIT 1";
                $sql = "INSERT INTO admin(shop_name, contact, city, area, password) VALUES(?, ?, ?, ?, ?)";

                #statement connection
                $stmt = $conn->prepare($select);
                $stmt->bind_param("s",$shop_name);
                $stmt->execute();
                $stmt->bind_result($shop_name);
                $stmt->store_result();
                $rnum = $stmt->num_rows;

                if ($rnum==0) {
                    $stmt->close();
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sisss", $shop_name, $contact, $city, $area, $password);
                    $stmt->execute();
                    echo '<script type=text/javascript>alert("You are registered")</script>';
                    header("Location:adlog.php");
                    exit();
                }
                else{
                    echo '<script type=text/javascript>alert("Username already exists")</script>';
                }
                $stmt->close();
                $conn->close();
            }
        }
        else {
            echo '<script type=text/javascript>alert("All fields must be filled")</Script>';
            die();

        }
    }
    else{
        echo '<script type=text/javascript>alert("Password Does not match")</script>';
        die();
    }

?>