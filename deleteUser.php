<?php

    include("db/dbconnection.php");

    if (isset($_GET['DELETE'])){
        $Staff_id=$_GET['DELETE'];

        $sql2="delete from user where u_id=$u_id";
        $query_run=mysqli_query($conn,$sql2);

        if($query_run) {
        echo "<script> alert ('Delete successfully')</script>";
        echo "<script> window.location = 'userRegister.php';</script>";
        }
        else {
            die(mysqli_error($conn));
        }  
    }

?>