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
            <button><a href="managerOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a class="active">Customer View</a></button>
            <button><a href="managerBookingHistoryView.php">Booking History</a></button>  
            <button><a href="managerPaymentHistoryView.php">Payment History</a></button> 
            <button><a href="proftAndLoss.php">Profit & Loss Report</a></button> 
        </div>

    <!-- Right Panel -->
    <div class="A-container">
        <h1>Passenger Records</h1>
        <div class="search-bar">
            <form action="managerClientView.php" method="post">
              <input type="text" name="search" placeholder="Search...">
              <button type="submit" name="search_btn" >Search</button>
            </form>
        </div>
      
        <table>
            <thead>
                <tr>
                    <th>Passager ID</th>
                    <th>Name</th>
                    <th>Nic or Passport No</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Hint</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  include("db/dbconnection.php");

                if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM passenger WHERE concat(name,nic_or_pp_no)  LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM passenger";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $PASS_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                    $Pass_id=$row['pas_id'];
                    $Name=$row['name'];
                    $Nic_or_PP_No=$row['nic_or_pp_no'];
                    $Contact_No=$row['con_no'];
                    $Email=$row['email'];
                    $Password=$row['password'];
                    $Hint=$row['hint'];
                ?>   
                <tr>
                    <td><?php echo $PASS_id ?></td>
                    <td><?php echo $Name ?></td>
                    <td><?php echo $Nic_or_PP_No ?></td>
                    <td><?php echo $Contact_No ?></td>
                    <td><?php echo $Email ?></td>
                    <td><?php echo $Password ?></td>
                    <td><?php echo $Hint ?></td>
                </tr>

                <?php $PASS_id++; } ?>
            </tbody> 
        </table>
        <br><br>
        <button class="report-btn"><a href="managerClientViewPDF.php" class="report-link">Report</a></button>
    </div>
</body>
</html>
