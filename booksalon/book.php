<?php

    #starting the session
    session_start();
    #declaring variables
    $shop_name = $_POST['sname'];
    $customername = $_POST['cname'];
    $work = $_POST['work'];
    $mobile = $_POST['mobile'];
    $apttime = $_POST['apttime'];

    #checking the fields
    if(!empty($shop_name) || !empty($customer) || !empty($work) || !empty($mobile) || !empty($apttime)){
       
        #db variables 
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
        
            $sql = "INSERT INTO customer(shop_name, customername, work, mobile, apttime) VALUES (?, ?, ?, ?, '$apttime') ";

            #statement preparing
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $shop_name, $customername, $work, $mobile);
            $stmt->execute();
            echo '<script type=text/javascript>alert("Thank you for registering")</script>';
            header("Location: thankyou.php");
            #Closing statement and connection
            $stmt->close();
            $conn->close();
        }
    }
?>