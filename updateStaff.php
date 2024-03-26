<?php
    include("db/dbconnection.php");

    $UPDATE = $_GET['UPDATE'];
    $sql = "SELECT * FROM staff WHERE stf_id='$UPDATE' ";

    $query_run = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($query_run)) {
        $STF_id=$row['stf_id'];
        $StaffName=$row['name'];
        $NicNo=$row['nic_no'];
        $Address=$row['address'];
        $ContactNo=$row['con_no'];
        $Gender=$row['gender'];
        $Role=$row['role'];
    }

    if (isset($_POST['update-staff'])) {
        $StaffName = $_POST['StaffName'];
        $NicNo = $_POST['NicNo'];
        $Address = $_POST['Address'];
        $ContactNo = $_POST['ContactNo'];
        $Gender = $_POST['Gender'];
        $Role = $_POST['Role'];

        $sql = "UPDATE staff SET name='$StaffName', nic_no='$NicNo', address='$Address', con_no='$ContactNo', gender='$Gender', role='$Role' WHERE stf_id='$STF_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script> alert ('Record updated successfully')</script>";
            echo "<script> window.location = 'adminStaffRecords.php';</script>";
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
            <button><a class="active">Staff Records</a></button>
            <button><a href="adminTrainRecords.php">Train Records</a></button>
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
            <h2>Update Staff Details</h2>
            <form action="updateStaff.php?UPDATE=<?php echo $STF_id; ?>" method="post">
                <div class="row">
                    <div class="column">
                        <label for="StaffName">Staff Name:</label>
                        <input type="text" id="StaffName" name="StaffName" value="<?php echo $StaffName;?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="NicNo">NIC No:</label>
                        <input type="number" id="NicNo" name="NicNo" value="<?php echo $NicNo;?>" required >
                    </div>
                    <div class="column">
                        <label for="ContactNo">Contact No:</label>
                        <input type="number" id="ContactNo" name="ContactNo" value="<?php echo $ContactNo;?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="Address">Address:</label>
                        <input type="text" id="Address" name="Address" value="<?php echo $Address;?>"  required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="Gender">Gender:</label>
                        <input type="text" id="Gender" name="Gender" value="<?php echo $Gender;?>" required>
                    </div>
                    <div class="column">
                        <label for="Role">Role:</label>
                        <input type="text" id="Role" name="Role" value="<?php echo $Role;?>" required>
                    </div>
                </div>
                <br>
                <button type="submit" name="update-staff" value="update-staff">Update</button>
            </form>
        </div>
</body>
</html>