<?php

    include("db/dbconnection.php");

    if (isset($_GET['DELETE'])){
        $Staff_id=$_GET['DELETE'];

        $sql2="delete from staff where stf_id=$Staff_id";
        $query_run=mysqli_query($conn,$sql2);

        if($query_run) {
        echo "<script> alert ('Delete successfully')</script>";
        echo "<script> window.location = 'adminStaffRecords.php';</script>";
        }
        else {
            die(mysqli_error($conn));
        }  
    }

?>