<?php
session_start();	
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Your Webpage</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <style>
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
            <button><a href="managerDashboard.php">Dashboard</a></button>
 	        <button><a href="managerStaffRecords.php">Staff Records</a></button>
            <button><a href="managerTrainRecords.php">Train Records</a></button>
            <button><a href="managerScheduling.php">Scheduling</a></button>
            <button><a href="managerInventoryM.php">Inventory Handle</a></button>
            <button><a href="managerPromotionsR.php">Promotions Records</a></button>
            <button><a class="active">Other Expenses Records</a></button>
            <button><a href="managerClientView.php">Customer View</a></button>
            <button><a href="managerBookingHistoryView.php">Booking History</a></button>  
            <button><a href="managerPaymentHistoryView.php">Payment History</a></button> 
            <button><a href="proftAndLoss.php">Profit & Loss Report</a></button> 
        </div>

    <!-- Right Panel -->
    <div class="A-container">
        <h1>Other Expenses Management</h1>
        <div class="search-bar">
            <form action="managerOtherExpensesR.php" method="post">
              <input type="text" name="search" placeholder="Search...">
              <button type="submit" name="search_btn" >Search</button>
            </form>
        </div>
      
        <table>
            <thead>
                <tr>
                    <th>Oex ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  include("db/dbconnection.php");

                  if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM other_expenses WHERE name LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM other_expenses";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $OEX_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                    $oex_id=$row['oex_id'];
                    $Name=$row['name'];
                    $Type=$row['type'];
                    $Amount=$row['amount'];
                    $date=$row['date'];
                    $Description=$row['description'];
                ?>   
                <tr>
                    <td><?php echo $OEX_id  ?></td>
                    <td><?php echo $Name ?></td>
                    <td><?php echo $Type ?></td>
                    <td><?php echo $Amount ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $Description ?></td>
                </tr>

                <?php  $OEX_id ++; } ?>
            </tbody> 
        </table>
        <br><br>
        <button class="report-btn"><a href="managerOtherExpensesRPDF.php" class="report-link">Report</a></button>
    </div>
</body>
</html>
