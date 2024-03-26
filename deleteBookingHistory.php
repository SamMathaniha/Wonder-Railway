<?php
    include("db/dbconnection.php");

    if (isset($_GET['DELETE'])){
        $tik_id=$_GET['DELETE'];

        $sql2="DELETE from ticket where tik_id=$tik_id";
        $query_run=mysqli_query($conn,$sql2);

        if($query_run) {
        echo "<script> alert ('Booking Cancel successfully')</script>";
        echo "<script> window.location = 'bookinghistory.php';</script>";
        }
        else {
            die(mysqli_error($conn));
        } 
    }

?>