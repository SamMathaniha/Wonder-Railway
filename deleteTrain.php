<?php
    include("db/dbconnection.php");

    if (isset($_GET['DELETE'])){
        $id=$_GET['DELETE'];

        $sql2="delete from train where trn_id=$id";
        $query_run=mysqli_query($conn,$sql2);

        if($query_run) {
        echo "<script> alert ('Delete successfully')</script>";
        echo "<script> window.location = 'adminTrainRecords.php';</script>";
        }
        else {
            die(mysqli_error($conn));
        }
    }

?>