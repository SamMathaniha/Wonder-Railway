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

        if (isset($_POST['insert-train'])) 
        {
            $trainName = $_POST['trainName'];
            $totalSeats = $_POST['totalSeats'];
            $trainCategory = $_POST['trainCategory'];
        
           
        
            $sql = "insert into train (name, total_seats, train_category) values (' $trainName',' $totalSeats','  $trainCategory')";
        
            if($conn ->query ($sql)==TRUE){
              echo "<script> alert ('New Record inserted successfully')</script>";
              echo "<script> window.location = 'adminTrainRecords.php';</script>";
            
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
            <button><a class="active">Train Records</a></button>
            <button><a href="adminScheduling.php">Scheduling</a></button>
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
        <h2>Insert Train Details</h2>
        <form action="adminTrainRecords.php" method="post">
        <div class="row">
            <div class="column">
            <label for="trainName">Train Name:</label>
            <input type="text" id="trainName" name="trainName" required >
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label for="totalSeats">Total Seats:</label>
                <input type="number" id="totalSeats" name="totalSeats" min="1" required>
            </div>
            <div class="column">
                <label for="trainCategory">Train Category:</label>
                <select id="trainCategory" name="trainCategory" required>
                    <option value="">Select Category</option>
                    <option value="express">Local</option>
                    <option value="local">Express</option>
                </select>
            </div>
        </div>
        <br>
        <button type="submit" name="insert-train">Insert</button>
        </form>
    </div>
        

    <div class="view-container">
        <h1>Train Management</h1>

        <div class="search-bar">
            <form action="adminTrainRecords.php" method="post">
              <input type="text" name="search" placeholder="Search...">
              <button type="submit" name="search_btn" >Search</button>
            </form>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Train ID</th>
                    <th>Train Name</th>
                    <th>Total Seats</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("db/dbconnection.php");

                    if (isset($_POST['search_btn'])) {
                        $search = $_POST['search'];
                        $sql = "SELECT * FROM train WHERE name LIKE '%$search%' ";
                    } else {
                        $sql = "SELECT * FROM train";
    
                    }
                      $query_run = mysqli_query($conn,$sql);
    
                      $id = 1;
    
                      while($row = mysqli_fetch_array($query_run))
                      {
                          $T_id=$row['trn_id'];
                          $trainName=$row['name'];
                          $totalSeats=$row['total_seats'];
                          $trainCategory=$row['train_category'];
                    
                    ?>

                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $trainName ?></td>
                        <td><?php echo $totalSeats ?></td>
                        <td><?php echo $trainCategory ?></td>
                        <td>
                            <button class="update-btn"><a href="updateTrain.php?UPDATE=<?php echo $T_id?>" class="update-link">Update</a></button>
                            <button class="delete-btn"><a href="deleteTrain.php?DELETE=<?php echo $T_id?>" class="delete-link">Delete</a></button>
                        </td>  
                    </tr>
    
                <?php $id++; } ?>
            </tbody>    
        </table>
    </div>
</body>
</html>
