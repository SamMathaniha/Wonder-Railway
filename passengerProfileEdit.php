<?php
    include("db/dbconnection.php");

    $UPDATE = $_GET['UPDATE'];
    $sql = "SELECT * FROM passenger WHERE pas_id='$UPDATE' ";

    $query_run = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($query_run)) {
        $pas_id=$row['pas_id'];
        $name=$row['name'];
        $nic_or_pp_no=$row['nic_or_pp_no'];
        $con_no=$row['con_no'];
        $email=$row['email'];
        $hint=$row['hint'];
    }

    if (isset($_POST['update-passenger'])) {
        $pas_id = $_POST['pas_id'];
        $name = $_POST['name'];
        $nic_or_pp_no = $_POST['nic_or_pp_no'];
        $con_no = $_POST['con_no'];
        $email = $_POST['email'];
        $hint = $_POST['hint'];

        $sql = "UPDATE passenger SET name='$name', nic_or_pp_no='$nic_or_pp_no', con_no='$con_no', email='$email', hint='$hint' WHERE pas_id='$pas_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script> alert ('Record updated successfully')</script>";
            echo "<script> window.location = 'ticketBooking.php';</script>";
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
            <form action="passengerProfileEdit.php?UPDATE=<?php echo $pas_id; ?>" method="post">
                <div class="row">
                    <div class="column">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $name;?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="nic_or_pp_no">NIC or Passport No:</label>
                        <input type="text" id="nic_or_pp_no" name="nic_or_pp_no" value="<?php echo $nic_or_pp_no;?>" required >
                    </div>
                    <div class="column">
                        <label for="con_no">Contact No:</label>
                        <input type="text" id="con_no" name="con_no" value="<?php echo $con_no;?>" required>
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
                        <label for="hint">Hint:</label>
                        <input type="text" id="hint" name="hint" value="<?php echo $hint;?>" required>
                    </div>
                </div>
                <br>
                <button type="submit" name="update-passenger" value="update-passenger">Update</button>
            </form>
        </div>
</body>
</html>