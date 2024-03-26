<?php
    include("db/dbconnection.php");

    if (isset($_GET['DELETE'])){
        $oex_id=$_GET['DELETE'];

        $sql2="delete from other_expenses where oex_id=$oex_id";
        $query_run=mysqli_query($conn,$sql2);

        if($query_run) {
        echo "<script> alert ('Delete successfully')</script>";
        echo "<script> window.location = 'adminOtherExpensesR.php';</script>";
        }
        else {
            die(mysqli_error($conn));
        }
    }

?>