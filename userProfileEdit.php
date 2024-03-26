<?php
    include("db/dbconnection.php");

    $UPDATE = $_GET['UPDATE'];
    $sql = "SELECT * FROM user WHERE u_id='$UPDATE' ";

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
        $u_id=$_POST['u_id'];
        $name=$_POST['name'];
        $nic_no=$_POST['nic_no'];
        $address=$_POST['address'];
        $con_no=$_POST['con_no'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $user_type=$_POST['user_type'];

        $sql = "UPDATE user SET name='$name', nic_no='$nic_no', address='$address', con_no='$con_no', gender='$gender', email='$email', user_type='$user_type' WHERE u_id='$u_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script> alert ('Record updated successfully')</script>";
            if ($user_type = 'admin') {
                echo "<script> window.location = 'adminDashboard.php';</script>";
            } else {
                echo "<script> window.location = 'managerDashboard.php';</script>";
            }
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
        <div class="navbar-logo">Edit Your Profile Here :)</div>
    </div>

    <!-- Main Content -->
    <div style="display: flex;">

        <!-- Right Panel -->
        <div class="A-container">
            <form action="userProfileEdit.php?UPDATE=<?php echo $u_id; ?>" method="post">
                <div class="row">
                    <div class="column">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $name;?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="nic_no">NIC No:</label>
                        <input type="text" id="nic_no" name="nic_no" value="<?php echo $nic_no;?>" required >
                    </div>
                    <div class="column">
                        <label for="con_no">Contact No:</label>
                        <input type="text" id="con_no" name="con_no" value="<?php echo $con_no;?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" value="<?php echo $address;?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                            <label for="gender">Gender:</label>
                            <input type="text" id="gender" name="gender" value="<?php echo $gender;?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" value="<?php echo $email;?>"  required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="user_type">User Type:</label>
                        <input type="text" id="user_type" name="user_type" value="<?php echo $user_type;?>" required>
                    </div>
                </div>
                <br>
                <button type="submit" name="update-user" value="update-user">Update</button>
            </form>
        </div>
</body>
</html>