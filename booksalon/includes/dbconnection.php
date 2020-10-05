<?php
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "salonbook";

        #dbconnection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if ($conn === false) {
        die('Connect error('.mysqli_connect_errorno().')'.mysqli_connect_error());
    }
?>