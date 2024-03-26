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

        if (isset($_POST['insert-other_expense'])) 
        {
            $Name = $_POST['Name'];
            $Type = $_POST['Type'];
            $Amount = $_POST['Amount'];
            $date = $_POST['date'];
            $Description = $_POST['Description'];
        
            $sql = "insert into other_expenses (name, type, amount, date, description) values ('$Name',' $Type', '$Amount', '$date', '$Description')";
        
            if($conn ->query ($sql)==TRUE){
              echo "<script> alert ('New Record inserted successfully')</script>";
              echo "<script> window.location = 'adminOtherExpensesR.php';</script>";
            
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
            <button><a href="adminPromotionsR.php">Promotions Records</a></button>
            <button><a class="active">Other Expenses Records</a></button>
            <button><a href="adminClientView.php">Customer View</a></button>
            <button><a href="adminBookingHistoryView.php">Booking History</a></button>
            <button><a href="userRegister.php">User Management</a></button>
        </div>
    </div>


    <!-- Right Panel -->
    <div class="train-container">
        <h2>Insert Other Expense Details</h2>
        <form action="adminOtherExpensesR.php" method="post">
            <div class="row">
                <div class="column">
                <label for="Name">Name:</label>
                <input type="text" id="Name" name="Name" required >
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="Type">Type:</label>
                    <input type="text" id="Type" name="Type" required>
                </div>
                <div class="column">
                    <label for="Amount">Amount:</label>
                    <input type="number" id="Amount" name="Amount" min="1" required>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="date">date:</label>
                    <input type="date" id="date" name="date" required>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="Description">Description:</label>
                    <input type="text" id="Description" name="Description" required >
                </div>
            </div>
        
            <button type="submit" name="insert-other_expense">Insert</button>
        </form>
    </div>

    <div class="view-container">
        <h1>Other Expense Management</h1>

        <div class="search-bar">
            <form action="../presentation/other_expense.php" method="post">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit" name="search_btn" >Search</button>
            </form>
        </div>
  
        <table>
            <thead>
                <tr>
                    <th>Expense ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Actions</th>
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
                    <td>
                        <button class="update-btn"><a href="updateOtherExpense.php?UPDATE=<?php echo $oex_id?>" class="update-link">Update</a></button>
                        <button class="delete-btn"><a href="deleteOtherExpense.php?DELETE=<?php echo $oex_id?>" class="delete-link">Delete</a></button>
                    </td>
                </tr>

                <?php  $OEX_id ++; } ?>
            </tbody>        
        </table>
    </div>
</body>
</html>
