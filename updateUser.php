<?php
    include("db/dbconnection.php");

    $UPDATE = $_GET['UPDATE'];
    $sql = "SELECT * FROM user WHERE stf_id='$UPDATE' ";

    $query_run = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($query_run)) {
        $u_id=$row['u_id'];
        $name=$row['name'];
        $nic_no=$row['nic_no'];
        $address=$row['address'];
        $con_no=$row['con_no'];
        $gender=$row['gender'];
        $email=$row['email'];
        $user_type=$row['user_type']; 
    }

    if (isset($_POST['update-user'])) {
        $name = $_POST['name'];
        $nic_no = $_POST['nic_no'];
        $con_no = $_POST['con_no'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $user_type = $_POST['user_type'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "UPDATE user SET name='$name', nic_no='$nic_no', con_no='$con_no', address='$address', gender='$gender', user_type='$user_type', email='$email', password='$password' WHERE u_id='$u_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script> alert ('Record updated successfully')</script>";
            echo "<script> window.location = 'userRegister.php';</script>";
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
            <button><a href="adminOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="adminClientView.php">Customer View</a></button>
            <button><a href="adminBookingHistoryView.php">Booking History</a></button>
            <button><a class="active">User Management</a></button>
        </div>

        <!-- Right Panel -->
        <div class="A-container">
            <h2>Update Staff Details</h2>
            <form action="updateUser.php?UPDATE=<?php echo $u_id; ?>" method="post">
                <div class="row">
                    <div class="column">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name"  value="<?php echo $name;?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                    <label for="nic_no">NIC No:</label>
                    <input type="text" id="nic_no" name="nic_no"  value="<?php echo $nic_no;?>" required >
                    </div>
                    <div class="column">
                    <label for="con_no">Contact No:</label>
                    <input type="text" id="con_no" name="con_no"  value="<?php echo $con_no;?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address"  value="<?php echo $address;?>"  required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender"  value="<?php echo $gender;?>" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    </div>
                    <div class="column">
                    <label for="user_type">User Type:</label>
                    <select id="user_type" name="user_type"  value="<?php echo $user_type;?>" required>
                        <option value="">Select Type</option>
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                    </select>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email"  value="<?php echo $email;?>"  required >
                    </div>
                    <div class="column">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"  value="<?php echo $password;?>" required>
                    </div>
                </div>                    
                <br>
                <button type="submit" name="update-user" value="update-user">Update</button>
            </form>
        </div>
</body>
</html>