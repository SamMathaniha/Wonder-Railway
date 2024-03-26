<?php
    include("db/dbconnection.php");

    $UPDATE = $_GET['UPDATE'];
    $sql = "SELECT * FROM promotion WHERE pro_id='$UPDATE' ";
    
    $query_run = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_array($query_run)) {
        $pro_id=$row['pro_id'];
        $Title=$row['title'];
        $Discount=$row['discount'];
        $Description=$row['description'];
    }
    
    if (isset($_POST['update-promotion_ad'])) {
        $Title=$_POST['Title'];
        $Discount=$_POST['Discount'];
        $Description=$_POST['Description'];
    
        $sql = "UPDATE promotion SET title='$Title', discount='$Discount', description='$Description' WHERE pro_id='$pro_id'";
    
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert ('Record updated successfully')</script>";
            echo "<script> window.location = 'adminPromotionsR.php';</script>";
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
            <button><a class="active">Promotions Records</a></button>
            <button><a href="adminOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="adminClientView.php">Customer View</a></button>
            <button><a href="adminBookingHistoryView.php">Booking History</a></button>
            <button><a href="userRegister.php">User Management</a></button>
        </div>

        <!-- Right Panel -->
        <div class="A-container">
            <h2>Update promotion Details</h2>
            <form action="adminPromotionsR.php?UPDATE=<?php echo $pro_id?>" method="post">
                <div class="row">
                    <div class="column">
                        <label for="Title">Title:</label>
                        <input type="text" id="Title" name="Title" value="<?php echo $Title?>" required >
                    </div>
                    <div class="column">
                        <label for="Discount">Discount:</label>
                        <input type="double" id="Discount" name="Discount" value="<?php echo $Discount?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="Description">Description:</label>
                        <input type="textarea" id="Description" name="Description" value="<?php echo $Description ?>" required>
                    </div>
                </div>
      
                <button type="submit" name="update-promotion_ad">update</button>
            </form>
        </div>
</body>
</html>