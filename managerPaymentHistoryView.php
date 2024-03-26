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
        
        .search-bar .report-btn{
            margin-left: 590px;
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
            <button><a href="managerOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="managerClientView.php">Customer View</a></button>
            <button><a href="managerBookingHistoryView.php">Booking History</a></button>  
            <button><a class="active">Payment History</a></button> 
            <button><a href="proftAndLoss.php">Profit & Loss Report</a></button> 
        </div>

    <!-- Right Panel -->
    <div class="A-container">
        <h1>Payment History Records</h1>
        <div class="search-bar">
            <form action="managerPaymentHistoryView.php" method="post">
              <input type="text" name="search" placeholder="Search...">
              <button type="submit" name="search_btn" >Search</button>
              <button class="report-btn"><a href="managerPaymentHistoryViewPDF.php" class="report-link">Report</a></button>
            </form>
        </div>
      
        <table>
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Passenger</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  include("db/dbconnection.php");

                if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM payment WHERE concat(tik_id,pas_id,date)  LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM payment";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $Payment_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                    $Payment_id=$row['pay_id'];
                    $date=$row['date'];
                    $amount=$row['amount'];
                    $pay_status=$row['pay_status'];
                    $pas_id=$row['pas_id'];
                ?>   
                <tr>
                    <td><?php echo $Payment_id ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $amount ?></td>
                    <td><?php echo $pay_status ?></td>
                    <td><?php echo $pas_id ?></td>
                </tr>

                <?php $Payment_id ++; } ?>
            </tbody> 
        </table>
        <br><br>
    </div>
</body>
</html>
