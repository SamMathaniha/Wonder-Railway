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

        

            $sql = "INSERT into schedule (departure_station, arrival_station , departure_time, arrival_time, date, train_status, link, class, cost, trn_id) values
            ('$Departure_Station','$Arrival_Station','$Departure_Time',' $Arrival_Time', '$Date', '$Train_Status', ' $Link', '$Cls_id', '$Cost', ' $Train_id')";

            if($conn ->query ($sql)==TRUE){
            echo "<script> alert ('New Record inserted successfully')</script>";
            echo "<script> window.location = 'adminScheduling.php';</script>";
            
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
            <button><a class="active">Scheduling</a></button>
            <button><a href="adminInventoryM.php">Inventory Handle</a></button>
            <button><a href="adminPromotionsR.php">Promotions Records</a></button>
            <button><a href="adminOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="adminClientView.php">Customer View</a></button>
            <button><a href="adminBookingHistoryView.php">Booking History</a></button>
            <button><a href="userRegister.php">User Management</a></button>
        </div>
    </div>


    <!-- Right Panel -->
    <div class="train-container">
        <h2>Insert Schedule Details</h2>
        <form action="adminScheduling.php" method="post">
    
            <div class="row">
                <div class="column">
                    <label for="Departure_Station">Departure Station:</label>
                <input type="text" id="Departure_Station" name="Departure_Station" required >
                </div>
                <div class="column">
                    <label for="Arrival_Station">Arrival Station:</label>
                <input type="text" id="Arrival_Station" name="Arrival_Station" required >
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="Departure_Time">Departure Time:</label>
                    <input type="time" id="Departure_Time" name="Departure_Time" required >
                </div>
                <div class="column">
                    <label for="Arrival_Time">Arrival Time:</label>
                    <input type="time" id="Arrival_Time" name="Arrival_Time" required >
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="Date">Date:</label>
                    <input type="date" id="Date" name="Date" required >
                </div>
                <div class="column">
                    <label for="Train_Status">Train Status:</label>
                    <select id="Train_Status" name="Train_Status" required>
                        <option value="">Select Train Status</option>
                        <option value="Available">Available</option>
                        <option value="Delay">Delay</option>
                        <option value="Cancel">Cancel</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="Link">Link:</label>
                    <input type="text" id="Link" name="Link"  required>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="Cls_id">Class id:</label>
                    <select id="Cls_id" name="Cls_id" required>
                        <option value="">Select Class id</option>
                        <?php
                            include("db/dbconnection.php");

                            $sql ="select * from class";
                            $query_run= mysqli_query($conn,$sql);

                            if(mysqli_num_rows($query_run)>0)
                            {
                                foreach ($query_run as $row) {
                                ?>
                                <option value="<?= $row['cls_type'];?>"><?= $row['cls_type'];?></option>
                                <?php 
                                }    
                            }
                            else
                            {
                        ?>
                                <option value="">No Record Found</option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="column">
                    <label for="Train_id">Train id:</label>
                    <select id="Train_id" name="Train_id" required>
                        <option value="">Select train name</option>
                        <?php
                            include("db/dbconnection.php");

                            $sql ="select * from train";
                            $query_run= mysqli_query($conn,$sql);

                            if(mysqli_num_rows($query_run)>0)
                            {
                                foreach ($query_run as $row) {
                                ?>
                                <option value="<?= $row['trn_id'];?>"><?= $row['name'];?></option>
                                <?php
                                }    
                            }
                            else
                            {
                        ?>
                            <option value="">No Record Found</option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="Cost">Cost:</label>
                    <input type="text" id="Cost" name="Cost"  required>
                </div>
            </div>
            <br>                    
            <button type="submit" name="insert-schedule">Insert</button>
        </form>
    </div>


    <div class="view-container">
        <h1>Schedule Management</h1>

        <div class="search-bar">
            <form action="adminScheduling.php" method="post">
                <input type="text" name="search" placeholder="Search...">
                <button type="submit" name="search_btn" >Search</button>
            </form>
        </div>
  
        <table>
            <thead>
                <tr>
                    <th>Schedule ID</th>
                    <th>Departure Station</th>
                    <th>Arrival Station</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Date</th>
                    <th>Train Status</th>
                    <th>Link</th>
                    <th>Class</th>
                    <th>Train id</th>
                    <th>Cost</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("db/dbconnection.php");

                    if (isset($_POST['search_btn'])) {
                        $search = $_POST['search'];
                        $sql = "SELECT * FROM schedule WHERE concat(departure_station,arrival_station,train_status,departure_time,arrival_time,date) LIKE '%$search%' "; 
                        // have the work small work to do here later
                    } else {
                        $sql = "SELECT * FROM schedule";

                    }
                    $query_run = mysqli_query($conn,$sql);

                    $SCHE_id = 1;

                    while($row = mysqli_fetch_array($query_run))
                    {
                        $sche_id = $row['sche_id'];
                        $Departure_Station = $row['departure_station'];
                        $Arrival_Station = $row['arrival_station'];
                        $Departure_Time = $row['departure_time'];
                        $Arrival_Time = $row['arrival_time'];
                        $Date = $row['date'];
                        $Train_Status = $row['train_status'];
                        $Link = $row['link'];
                        $Cls_id = $row['class'];
                        $Cost = $row['cost'];
                        $Train_id = $row['trn_id'];
                    ?>     
                <tr>

                    <td><?php echo $SCHE_id ?></td>
                    <td><?php echo $Departure_Station ?></td>
                    <td><?php echo $Arrival_Station ?></td>
                    <td><?php echo $Departure_Time?></td>
                    <td><?php echo $Arrival_Time ?></td>
                    <td><?php echo $Date?></td>
                    <td><?php echo $Train_Status ?></td>
                    <td style="max-width: 100px; overflow: auto;"><?php echo $Link ?></td>
                    <td><?php echo $Cls_id ?></td>
                    <td><?php echo $Train_id ?></td>
                    <td><?php echo $Cost ?></td>

                    <td>
                        <button class="update-btn"><a href="updateSchedule.php?UPDATE=<?php echo $sche_id?>" class="update-link">Update</a></button>
                        <button class="delete-btn"><a href="deleteSchedule.php?DELETE=<?php echo $sche_id?>" class="delete-link">Delete</a></button>
                    </td>
                
                </tr>

                <?php $SCHE_id++; } ?>
            </tbody>  
        </table>
    </div>
</body>
</html>
