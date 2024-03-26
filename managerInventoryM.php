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
            <button><a class="active">Inventory Handle</a></button>
            <button><a href="managerPromotionsR.php">Promotions Records</a></button>
            <button><a href="managerOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="managerClientView.php">Customer View</a></button>
            <button><a href="managerBookingHistoryView.php">Booking History</a></button>  
            <button><a href="managerPaymentHistoryView.php">Payment History</a></button> 
            <button><a href="proftAndLoss.php">Profit & Loss Report</a></button> 
        </div>

    <!-- Right Panel -->
    <div class="A-container">
        <h1>Inventory Management</h1>
        <div class="search-bar">
            <form action="managerInventoryM.php" method="post">
              <input type="text" name="search" placeholder="Search...">
              <button type="submit" name="search_btn" >Search</button>
              <button class="report-btn"><a href="managerInventoryMPDF.php" class="report-link">Report</a></button>
            </form>
        </div>
      
        <table>
            <thead>
                <tr>
                    <th>Seat ID</th>
                    <th>Seat No</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  include("db/dbconnection.php");

                  if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM seat WHERE seat_no  LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM seat";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $SEAT_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                    $seat_id = $row['seat_id']; //want complete the code from here.
                    $SeatNo = $row['seat_no'];
                    $Status = $row['status'];
                ?>   
                <tr>
                    <td><?php echo $SEAT_id ?></td>
                    <td><?php echo $SeatNo?></td>
                    <td><?php echo $Status?></td>
                </tr>

                <?php $SEAT_id++; } ?>
            </tbody> 
        </table>
        <br><br>
    </div>
</body>
</html>
