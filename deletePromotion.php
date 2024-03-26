<?php
    include("db/dbconnection.php");

    if (isset($_GET['DELETE'])){
        $P_id=$_GET['DELETE'];

        $sql2="delete from promotion where pro_id=$P_id";
        $query_run=mysqli_query($conn,$sql2);

        if($query_run) {
        echo "<script> alert ('Delete successfully')</script>";
        echo "<script> window.location = 'adminPromotionsR.php';</script>";
        }
        else {
            die(mysqli_error($conn));
        } 
    }

?>