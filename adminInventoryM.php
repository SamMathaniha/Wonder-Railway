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

        if (isset($_POST['insert-schedule'])) 
        {
            $Departure_Station = $_POST['Departure_Station'];
            $Arrival_Station = $_POST['Arrival_Station'];
            $Departure_Time = $_POST['Departure_Time'];
            $Arrival_Time = $_POST['Arrival_Time'];
            $Date = $_POST['Date'];
            $Train_Status = $_POST['Train_Status'];
            $Link = $_POST['Link'];
            $Cls_id = $_POST['Cls_id'];
            $Cost = $_POST['Cost'];
            $Train_id = $_POST['Train_id'];

        

            $sql = "insert into schedule (departure_station, arrival_station , departure_time, arrival_time, date, train_status, link, cls_id, cost, trn_id) values
            ('$Departure_Station','$Arrival_Station','$Departure_Time',' $Arrival_Time', '$Date', '$Train_Status', ' $Link', '$Cls_id', '$Cost', ' $Train_id')";

            if($conn ->query ($sql)==TRUE){
            echo "<script> alert ('New Record inserted successfully')</script>";
            echo "<script> window.location = '../presentation/schedule.php';</script>";
            
            }
            else {
                echo "ERROR: ".$sql."<br>".$conn->error;

            }

            $conn->close();
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
            <button><a class="active">Inventory Handle</a></button>
            <button><a href="adminPromotionsR.php">Promotions Records</a></button>
            <button><a href="adminOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="adminClientView.php">Customer View</a></button>
            <button><a href="adminBookingHistoryView.php">Booking History</a></button>
            <button><a href="userRegister.php">User Management</a></button>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="M-container">
        <h1>Seat Management</h1>
        <div class="search-bar">
            <form action="adminInventoryM.php" method="post">
              <input type="text" name="search" placeholder="Search...">
              <button type="submit" name="search_btn" >Search</button>
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
                    $seat_id=$row['seat_id']; //want complete the code from here.
                    $SeatNo=$row['seat_no'];
                    $Status=$row['status'];                
                ?>

                    
                  <tr>
                    <td><?php echo $SEAT_id ?></td>
                    <td><?php echo $SeatNo?></td>
                    <td><?php echo $Status?></td>
                  </tr>
                  <?php $SEAT_id++; } ?>
            </tbody>           
        </table>
    </div> 
</body>
</html>
