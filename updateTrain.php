<?php
    include("db/dbconnection.php");

    $UPDATE = $_GET['UPDATE'];
    $sql = "SELECT * FROM train WHERE trn_id='$UPDATE' ";

    $query_run = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($query_run)) {
        $T_id = $row['trn_id'];
        $trainName = $row['name'];
        $totalSeats = $row['total_seats'];
        $trainCategory = $row['train_category'];
    }
    
    if (isset($_POST['update-train'])) {
        $trainName = $_POST['trainName'];
        $totalSeats = $_POST['totalSeats'];
        $trainCategory = $_POST['trainCategory'];
    
        $sql = "UPDATE train SET name='$trainName', total_seats='$totalSeats', train_category='$trainCategory' WHERE trn_id='$T_id'";
    
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert ('Record updated successfully')</script>";
            echo "<script> window.location = 'adminTrainRecords.php';</script>";
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
            <button><a class="active">Train Records</a></button>
            <button><a href="adminScheduling.php">Scheduling</a></button>
            <button><a href="adminInventoryM.php">Inventory Handle</a></button>
            <button><a href="adminPromotionsR.php">Promotions Records</a></button>
            <button><a href="adminOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="adminClientView.php">Customer View</a></button>
            <button><a href="adminBookingHistoryView.php">Booking History</a></button>
            <button><a href="userRegister.php">User Management</a></button>
        </div>

        <!-- Right Panel -->
        <div class="A-container">
            <h2>Update Train Details</h2>
            <form action="updateTrain.php?UPDATE=<?php echo $T_id; ?>" method="post">
                <div class="row">
                    <div class="column">
                        <label for="trainName">Train Name:</label>
                        <input type="text" id="trainName" name="trainName" value="<?php echo $trainName;?>">
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="totalSeats">Total Seats:</label>
                        <input type="text" name="totalSeats" min="1" value="<?php echo $totalSeats;?>">
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="trainCategory">Train Category:</label>
                        <input type="text" name="trainCategory" min="1" value="<?php echo $trainCategory;?>">
                    </div>
                </div>

                <button type="submit" name="update-train" value="update-train">Update</button>
            </form>
        </div>
</body>
</html>