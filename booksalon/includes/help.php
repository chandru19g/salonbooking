<?php
    $id = $_SESSION['shop_id'];
    $ret = mysqli_query($conn, "SELECT * FROM admin WHERE id='$id' ");
    $row = mysqli_fetch_array($ret);
    $name = $row['shop_name'];
    
?>