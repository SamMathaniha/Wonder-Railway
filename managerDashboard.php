<?php
session_start();	
include("db/dbconnection.php");

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Your Webpage</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-y: hidden;
        }

        /* Navbar styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: black;
            color: #fff;
            padding: 10px;
            height: 50px;
        }

        .navbar-logo {
            font-size: 30px;
            margin-left: 50px;
        }

        /* Left panel styles */
        .left-panel {
            width: 200px;
            height: 1000px;
            background-color: black;
            padding: 10px;
        }

        .left-panel button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 5px;
            cursor: pointer;
        }

        .left-panel button a{
            text-decoration: none !important;
            font-size: 18px;
            color: black;
            font-family: 'Times New Roman', Times, serif;
        }

        .left-panel button:hover {
            background-color: #e0e0e0;
        }

        /* Right panel styles */
        .right-panel {
            flex: 1;
            padding: 20px;
        }

        .right-panel label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        .right-panel {
            border: 1px solid #ccc;
            padding: 20px;
            background: #f9f9f9;
            height: 100vh;
        }

        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 4px;
            background: #f9f9f9;
            box-shadow: 0px 0px 10px 0px black;
        }

        .right-panel input,
        .right-panel select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Submit button style */
        .right-panel input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            cursor: pointer;
        }

        .right-panel input[type="submit"]:hover {
            background-color: #444;
        }

        /* Clearfix for flex layout */
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .title {
            margin-top: 10px;
            color: #444;
        }

        /* Increase size of Bootstrap icon */
        .bi-person-circle {
            font-size: 38px;
            margin-right: 20px;
        }

        /* Flex container for three divs in one row */
        .flex-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        /* Style for the inner divs */
        .flex-item {
            flex: 0 0 30%; /* Each inner div occupies 30% of the container */
            padding: 10px;
            border: 1px solid #45a049;
            border-radius: 4px;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 10px 0px #45a049;
            margin-bottom: 20px;
        }

        
        .flex-item h2{
            text-align: right;
        }

        .left-panel a.active {
            color: #45a049;
        }

        /* Styling for the "Logout" text */
        #logout-text {
            cursor: pointer;
            margin-top: 18px;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.2); /* White background with opacity 20% */
            color: #000000; /* Set the text color to white */
            border-radius: 10px;
            width: 100px;
            margin-left: 100px; /* Adjust the margin-left value to center the text */
            font-size: large;
            position: relative; 
            left: -100px;

        }

        #profile-panel .profile-name{
            font-size: 30px; 
            font-weight: bold; 
            text-align: right; 
            display: inline-block; 
        }   

    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-logo">Wonder</div>
        <p>WELCOME MANAGER</p>
        <i class="bi bi-person-circle"></i>
    </div>

    <!-- Main Content -->
    <div style="display: flex;">
        <!-- Left Panel -->
        <div class="left-panel">
            <button><a class="active">Dashboard</a></button>
            <button><a href="managerStaffRecords.php">Staff Records</a></button>
            <button><a href="managerTrainRecords.php">Train Records</a></button>
            <button><a href="managerScheduling.php">Scheduling</a></button>
            <button><a href="managerInventoryM.php">Inventory Handle</a></button>
            <button><a href="managerPromotionsR.php">Promotions Records</a></button>
            <button><a href="managerOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="managerClientView.php">Customer View</a></button>
            <button><a href="managerBookingHistoryView.php">Booking History</a></button>  
            <button><a href="managerPaymentHistoryView.php">Payment History</a></button> 
            <button><a href="proftAndLoss.php">Profit & Loss Report</a></button> 
        </div>

        <!-- Right Panel -->
        <div class="right-panel">
            <div class="flex-container">
                <!-- Container 1 -->
                <div class="flex-item">
                    <!-- Content for Container 1 -->
                    <h1>Staff</h1>
                    <?php
                    $sql = "select * from staff";
                    $query_run = mysqli_query($conn,$sql);

                    if($total_staff= mysqli_num_rows($query_run))
                    {
                        echo'<h2> '.$total_staff.' </h2>';
                    }
                    else{
                        echo'<h2> No Data </h2>';
                    }
                    ?>
                    <!-- <p>10</p> -->
                </div>

                <!-- Container 2 -->
                <div class="flex-item">
                    <!-- Content for Container 2 -->
                    <h1>Customer</h1>
                    <?php
                    $sql = "select * from passenger";
                    $query_run = mysqli_query($conn,$sql);

                    if($total_passenger= mysqli_num_rows($query_run))
                    {
                        echo'<h2> '.$total_passenger.' </h2>';
                    }
                    else{
                        echo'<h2> No Data </h2>';
                    }
                    ?>
                    <!-- <p>10</p> -->
                </div>

                <!-- Container 3 -->
                <div class="flex-item">
                    <!-- Content for Container 3 -->
                    <h1>Total Trains</h1>
                    <?php
                    $sql = "select * from train";
                    $query_run = mysqli_query($conn,$sql);

                    if($total_train= mysqli_num_rows($query_run))
                    {
                        echo'<h2> '.$total_train.' </h2>';
                    }
                    else{
                        echo'<h2> No Data </h2>';
                    }
                    ?>
                    <!-- <p>1</p> -->
                </div>

                <!-- Container 4 -->
                <div class="flex-item">
                    <!-- Content for Container 4 -->
                    <h1>Ongoing Trains</h1>
                     <?php
                    $sql = "select * from train";
                    $query_run = mysqli_query($conn,$sql);

                    if($total_train= mysqli_num_rows($query_run))
                    {
                        echo'<h2> '.$total_train.' </h2>';
                    }
                    else{
                        echo'<h2> No Data </h2>';
                    }
                    ?>
                    <!-- <p>0</p> -->
                </div>

                <!-- Container 5 -->
                <div class="flex-item">
                    <!-- Content for Container 5 -->
                    <h1>Revenue</h1>
                     <?php
                    $sql = "SELECT SUM(amount) AS total_expense FROM  payment";
                    $query_run = mysqli_query($conn,$sql);

                    $totalExpense = 0;
                    if ($query_run && $query_run->num_rows > 0) 
                    {
                        $row = $query_run->fetch_assoc();
                        $totalExpense = $row['total_expense'];

                         echo'<h2> '.$totalExpense.' </h2>';
                    }
                    else {
                        echo'<h2> No Data </h2>';
                    }
                    ?>
                    <!-- <p>0.</p> -->
                </div>

                <!-- Container 6 -->
                <div class="flex-item">
                    <!-- Content for Container 6 -->
                    <h1>Monthly Expences</h1>
                     <?php
                    $sql = "SELECT SUM(amount) AS total_expense FROM  other_expenses";
                    $query_run = mysqli_query($conn,$sql);

                    $totalExpense = 0;
                    if ($query_run && $query_run->num_rows > 0) 
                    {
                        $row = $query_run->fetch_assoc();
                        $totalExpense = $row['total_expense'];

                         echo'<h2> '.$totalExpense.' </h2>';
                    }
                    else {
                        echo'<h2> No Data </h2>';
                    }
                    ?>
                    <!-- <p>0.</p> -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
