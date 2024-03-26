<?php
    include("db/dbconnection.php");

    $UPDATE = $_GET['UPDATE'];
    $sql = "SELECT * FROM other_expenses WHERE oex_id='$UPDATE' ";
    
    $query_run = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_array($query_run)) {
        $oex_id = $row['oex_id'];
        $Name = $row['name'];
        $Type = $row['type'];
        $Amount = $row['amount'];
        $date = $row['date'];
        $Description = $row['description'];
    }
    
        if (isset($_POST['update-other_expense'])) {
            $Name = $_POST['Name'];
            $Type = $_POST['Type'];
            $Amount = $_POST['Amount'];
            $date = $_POST['date'];
            $Description = $_POST['Description'];
    
            $sql = "UPDATE other_expenses SET name='$Name', type='$Type', amount='$Amount', date='$date', description='$Description' WHERE oex_id='$oex_id'";
    
            if ($conn->query($sql) === TRUE) {
                echo "<script> alert ('Record updated successfully')</script>";
                echo "<script> window.location = 'adminOtherExpensesR.php';</script>";
            } else {
                echo "ERROR: " . $sql . "<br>" . $conn->error;
            }

        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
   <!-- Navbar -->
   <div class="navbar">
        <div class="navbar-logo">Wonder</div>
        
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

        <!-- Right Panel -->
        <div class="A-container">
            <h2>Update Other Expenses Details</h2>
            <form action="adminOtherExpensesR.php?UPDATE=<?php echo $oex_id; ?>" method="post">
                <div class="row">
                    <div class="column">
                        <label for="Name">Name:</label>
                        <input type="text" id="Name" name="Name" value="<?php echo $Name;?>" required >
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="Type">Type:</label>
                        <input type="text" id="Type" name="Type" value="<?php echo $Type;?>" required>
                    </div>
                    <div class="column">
                        <label for="Amount">Amount:</label>
                        <input type="number" id="Amount" name="Amount" min="1" value="<?php echo $Amount;?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" value="<?php echo $date;?>" required >
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="Description">Description:</label>
                        <input type="text" id="Description" name="Description"value="<?php echo $Description;?>" required >
                    </div>
                </div>
  
                <button type="submit" name="update-other_expense" value="update-other_expense">Update</button>
            </form>
        </div>
</body>
</html>