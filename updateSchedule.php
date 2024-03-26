<?php
    include("db/dbconnection.php");

    $UPDATE = $_GET['UPDATE'];
    $sql = "SELECT * FROM schedule WHERE sche_id='$UPDATE' ";
    
    $query_run = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_array($query_run)) {
        $sche_id = $row['sche_id'];
        $Departure_Station = $row['departure_station'];
        $Arrival_Station = $row['arrival_station'];
        $Departure_Time = $row['departure_time'];
        $Arrival_Time = $row['arrival_time'];
        $Date = $row['date'];
        $Train_Status = $row['train_status'];
        $Link = $row['link'];
        $Cls_id = $row['class'];
        $Cost = $row['cost'];
        $Train_id = $row['trn_id'];
    }
    
    if (isset($_POST['update-schedule'])) {
        $Departure_Station = $_POST['Departure_Station'];
        $Arrival_Station = $_POST['Arrival_Station'];
        $Departure_Time = $_POST['Departure_Time'];
        $Arrival_Time = $_POST['Arrival_Time'];
        $Date = $_POST['Date'];
        $Train_Status = $_POST['Train_Status'];
        $Link = $_POST['Link'];
        $Cls_id = $_POST['class'];
        $Cost = $_POST['Cost'];
        $Train_id = $_POST['Train_id'];
    
    
        $sql = "UPDATE schedule SET departure_station='$Departure_Station ', arrival_station='$Arrival_Station', 
        departure_time='$Departure_Time', arrival_time='$Arrival_Time',  date='$Date',  train_status='$Train_Status',
        link='$Link', class='$Cls_id', cost='$Cost', trn_id='$Train_id' WHERE sche_id='$sche_id'";
    
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert ('Record updated successfully')</script>";
            echo "<script> window.location = 'adminScheduling.php';</script>";
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
            <button><a class="active">Scheduling</a></button>
            <button><a href="adminInventoryM.php">Inventory Handle</a></button>
            <button><a href="adminPromotionsR.php">Promotions Records</a></button>
            <button><a href="adminOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="adminClientView.php">Customer View</a></button>
            <button><a href="adminBookingHistoryView.php">Booking History</a></button>
            <button><a href="userRegister.php">User Management</a></button>
        </div>

        <!-- Right Panel -->
        <div class="A-container">
            <h2>Update schedule Details</h2>
            <form action="updateSchedule.php?UPDATE=<?php echo $sche_id; ?>" method="post">
                <div class="row">
                    <div class="column">
                        <label for="Departure_Station">Departure Station:</label>
                        <input type="text" id="Departure_Station" name="Departure_Station"  value="<?php echo $Departure_Station;?>" required >
                    </div>
                    <div class="column">
                        <label for="Arrival_Station">Arrival Station:</label>
                        <input type="text" id="Arrival_Station" name="Arrival_Station" value="<?php echo $Arrival_Station;?>" required >
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="Departure_Time">Departure Time:</label>
                        <input type="time" id="Departure_Time" name="Departure_Time" value="<?php echo $Departure_Time;?>" required >
                    </div>
                    <div class="column">
                        <label for="Arrival_Time">Arrival Time:</label>
                        <input type="time" id="Arrival_Time" name="Arrival_Time" value="<?php echo $Arrival_Time;?>" required >
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="Date">Date:</label>
                        <input type="date" id="Date" name="Date" value="<?php echo $Date;?>" required >
                    </div>
                    <div class="column">
                        <label for="Train_Status">Train Status:</label>
                        <input type="text" id="Train_Status" name="Train_Status" value="<?php echo $Train_Status;?>" required >
                        <select id="Train_Status" name="Train_Status" required>
                            <option value="">Select Train Status</option>
                            <option value="Available">Available</option>
                            <option value="Delay">Delay</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="Link">Link:</label>
                        <input type="text" id="Link" name="Link" value="<?php echo $Link;?>"  required>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="Cls_id">Class id:</label>
                        <input type="text" id="Cls_id" name="Cls_id" value="<?php echo $Cls_id;?>" required >
                        <select id="Cls_id" name="Cls_id"  required>
                            <option value="">Select Class id</option>
                                <?php
                                    include("db/dbconnection.php");

                                    $sql ="select * from class";
                                    $query_run= mysqli_query($conn,$sql);

                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        foreach ($query_run as $row) {
                                            ?>
                                            <option value="<?= $row['cls_type'];?>"><?= $row['cls_type'];?></option>
                                            <?php 
                                        }    
                                    }
                                    else
                                    {
                                    ?>
                                    <option value="">No Record Found</option>
                                    <?php
                                }
                                ?>
                        </select>
                    </div>

                    <div class="column">
                        <label for="Train_id">Train id:</label>
                        <input type="text" id="Train_id" name="Train_id" value="<?php echo $Train_id;?>" required >
                        <select id="Train_id" name="Train_id" required>
                            <option value="">Select train name</option>
                            <?php
                            include("db/dbconnection.php");

                            $sql ="select * from train";
                            $query_run= mysqli_query($conn,$sql);

                            if(mysqli_num_rows($query_run)>0)
                            {
                                foreach ($query_run as $row) {
                                    ?>
                                    <option value="<?= $row['trn_id'];?>"><?= $row['name'];?></option>
                                    <?php
                                }    
                            }
                            else
                            {
                            ?>
                            <option value="">No Record Found</option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="Cost">Cost:</label>
                        <input type="text" id="Cost" name="Cost" value="<?php echo $Cost;?>" required>
                    </div>
                </div>
      
                <button type="submit" name="update-schedule" value="update-schedule">Update</button>
            </form>
        </div>
</body>
</html>