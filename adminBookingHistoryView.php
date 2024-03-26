<?php
session_start();	

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //database connection details
        $servername = "localhost";
        $username = "Hazz_Wondor";
        $password = "Hazz@2023";
        $dbname = "hazz_wonder";

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }


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
        
        .M-container{
            Max-height: 800px;
            width: 1100px;
            margin: 0 auto;
            margin-top: -1000px;
            margin-right: 50px;
            padding: 60px;
            background-color:#fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            align-items: center;
            justify-content: center;
            box-shadow: 1px solid #555;
            overflow-y: auto;
            overflow-x: auto;
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-logo">Wonder</div>
        <p>WELCOME ADMIN</p>
        <i class="bi bi-person-circle"></i>
    </div>

    <!-- Main Content -->
    <div style="display: flex;">
        <!-- Left Panel -->
        <div class="left-panel">
            <button><a href="adminDashboard.php">Dashboard</a></button>
            <button><a href="adminStaffRecords.php">Staff Records</a></button>
            <button><a href="adminTrainRecords.php">Train Records</a></button>
            <button><a href="adminScheduling.php">Scheduling</a></button>
            <button><a href="adminInventoryM.php">Inventory Handle</a></button>
            <button><a href="adminPromotionsR.php">Promotions Records</a></button>
            <button><a href="adminOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="adminClientView.php">Customer View</a></button>
            <button><a class="active">Booking History</a></button>
            <button><a href="userRegister.php">User Management</a></button>
        </div>
    </div>


    <!-- Right Panel -->
    <div class="M-container">
        <h1>Booking History Management</h1>

          <div class="search-bar">
            <form action="adminBookingHistoryView.php" method="post">
              <input type="text" name="search" placeholder="Search...">
              <button type="submit" name="search_btn" >Search</button>
            </form>
         </div>
      
        <table>
            <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Departure Time</th>
                <th>Date</th>
                <th>Departure Station</th>
                <th>Arrival Station</th>
                <th>Redeem Points</th>
                <th>Promotion</th>
                <th>Payment</th>
                <th>Passager id</th>
                <th>Train id</th>
                <th>Seat id</th>
                <th>No Seat</th>
            </tr>
            </thead>
            <tbody>
                <?php
                  include("db/dbconnection.php");

                  if (isset($_POST['search_btn'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM ticket WHERE concat(departure_station,arrival_station,date)  LIKE '%$search%' ";
                } else {
                    $sql = "SELECT * FROM ticket ";

                }
                  $query_run = mysqli_query($conn,$sql);

                  $Ticket_id = 1;

                  while($row = mysqli_fetch_array($query_run))
                  {
                      $Tik_id=$row['tik_id'];
                      $Departure_Time=$row['departure_time'];
                      $Date=$row['date'];
                      $Departure_Station=$row['departure_station'];
                      $Arrival_Station=$row['arrival_station'];
                      $Redeem_Points=$row['redeem_points'];
                      $Promotion=$row['promotion'];
                      $Payment=$row['payment'];
                      $Pas_id=$row['pas_id'];
                      $Trn_id=$row['trn_id'];
                      $Seat_id=$row['seat_no'];
                      $No_seat=$row['no_seat'];
                
                ?>

                  <tr>
                    <td><?php echo $Ticket_id ?></td>
                    <td><?php echo $Departure_Time ?></td>
                    <td><?php echo $Date ?></td>
                    <td><?php echo $Departure_Station ?></td>
                    <td><?php echo $Arrival_Station ?></td>
                    <td><?php echo $Redeem_Points ?></td>
                    <td><?php echo $Promotion ?></td>
                    <td><?php echo $Pas_id ?></td>
                    <td><?php echo $Trn_id ?></td>
                    <td><?php echo $Seat_id ?></td>
                    <td><?php echo $No_seat ?></td>
                  </tr>

                <?php $Ticket_id++; } ?>
            </tbody>          
        </table>       
    </div>

</body>
</html>
