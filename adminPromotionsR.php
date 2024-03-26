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

        if (isset($_POST['insert-promotion_ad'])) 
        {
        
            $Title = $_POST['Title'];
            $Discount = $_POST['Discount'];
            $Description = $_POST['Description'];
        
           
        
            $sql = "insert into promotion (title, discount, description) values ('$Title', '$Discount', ' $Description')";
        
            if($conn ->query ($sql)==TRUE){
              echo "<script> alert ('New Record inserted successfully')</script>";
              echo "<script> window.location = 'adminPromotionsR.php';</script>";
            
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
            <button><a href="adminInventoryM.php">Inventory Handle</a></button>
            <button><a class="active">Promotions Records</a></button>
            <button><a href="adminOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="adminClientView.php">Customer View</a></button>
            <button><a href="adminBookingHistoryView.php">Booking History</a></button>
            <button><a href="userRegister.php">User Management</a></button>
        </div>
    </div>


    <!-- Right Panel -->
    <div class="train-container">
        <h2>Insert promotion Details</h2>
        <form action="adminPromotionsR.php" method="post">
            <div class="row">
                <div class="column">
                    <label for="Title">Title:</label>
                    <input type="text" id="Title" name="Title" required >
                </div>
                <div class="column">
                    <label for="Discount">Discount:</label>
                    <input type="double" id="Discount" name="Discount"  required>
                </div>
            </div>

            <div class="row">
                <div class="column">
                <label for="Description">Description:</label>
                <input type="textarea" id="Description" name="Description" required>
                </div>
            </div>
        
            <button type="submit" name="insert-promotion_ad">Insert</button>
        </form>
    </div>

    <div class="view-container">
        <h1>Promotion Management</h1>

        <div class="search-bar">
            <form action="adminPromotionsR.php" method="post">
                <input type="text" name="search" placeholder="Search...">
                <button type="submit" name="search_btn" >Search</button>
            </form>
        </div>
  
        <table>
            <thead>
                <tr>
                    <th>Promotion ID</th>
                    <th>Title</th>
                    <th>Discount</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("db/dbconnection.php");

                    if (isset($_POST['search_btn'])) {
                        $search = $_POST['search'];
                        $sql = "SELECT * FROM promotion WHERE title LIKE '%$search%' ";
                    } else {
                        $sql = "SELECT * FROM promotion";

                    }
                    $query_run = mysqli_query($conn,$sql);

                    $P_id = 1;

                    while($row = mysqli_fetch_array($query_run))
                    {
                        $pro_id=$row['pro_id'];
                        $Title=$row['title'];
                        $Discount=$row['discount'];
                        $Description=$row['description'];  
                ?>

                <tr>

                    <td><?php echo $P_id ?></td>
                    <td><?php echo $Title ?></td>
                    <td><?php echo $Discount ?></td>
                    <td><?php echo $Description ?></td>
                    <td>
                        <button class="update-btn"><a href="updatePromotion.php?UPDATE=<?php echo $pro_id?>" class="update-link">Update</a></button>
                        <button class="delete-btn"><a href="deletePromotion.php?DELETE=<?php echo $pro_id?>" class="delete-link">Delete</a></button>
                    </td>
                
                </tr>

                <?php $P_id++; } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
