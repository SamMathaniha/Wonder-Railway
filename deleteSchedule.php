<?php
 include("db/dbconnection.php");

 if (isset($_GET['DELETE'])){
    $sche_id=$_GET['DELETE'];

     $sql2="delete from schedule where sche_id=$sche_id";
     $query_run=mysqli_query($conn,$sql2);

     if($query_run) {
      echo "<script> alert ('Delete successfully')</script>";
      echo "<script> window.location = 'adminScheduling.php';</script>";
     }
     else {
        die(mysqli_error($conn));
     }

   
 }

?>