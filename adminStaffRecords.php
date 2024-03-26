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

        if (isset($_POST['insert-staff'])) 
        {
            $StaffName = $_POST['StaffName'];
            $NicNo = $_POST['NicNo'];
            $Address = $_POST['Address'];
            $ContactNo = $_POST['ContactNo'];
            $Gender = $_POST['Gender'];
            $Role = $_POST['Role'];

            $sql = "insert into staff (name, nic_no, address, con_no, gender, role) values 
            ('$StaffName', '$NicNo', '$Address', '$ContactNo', '$Gender', '$Role')";

            if($conn ->query ($sql)==TRUE){
            //echo "<script> alert ('New Record inserted successfully')</script>";
            //echo "<script> window.location = 'adminStaffRecords.php';</script>";
            
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
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    </div>


    <!-- Right Panel -->
    <div class="train-container">
        <h2>Insert Staff Details</h2>
        <form action="adminStaffRecords.php" method="post">
        
        <div class="row">
            <div class="column">
            <label for="StaffName">Staff Name:</label>
            <input type="text" id="StaffName" name="StaffName"  required>
            </div>
        </div>

        <div class="row">
            <div class="column">
            <label for="NicNo">NIC No:</label>
            <input type="number" id="NicNo" name="NicNo" required >
            </div>
            <div class="column">
            <label for="ContactNo">Contact No:</label>
            <input type="number" id="ContactNo" name="ContactNo" required>
            </div>
        </div>

        <div class="row">
            <div class="column">
            <label for="Address">Address:</label>
            <input type="text" id="Address" name="Address"  required>
            </div>
        </div>

        <div class="row">
            <div class="column">
            <label for="Gender">Gender:</label>
            <select id="Gender" name="Gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            </div>
            <div class="column">
            <label for="Role">Role:</label>
            <input type="text" id="Role" name="Role" required>
            </div>
        </div>
        <br>
        <button type="submit" name="insert-staff" id="insertButton">Insert</button>
        </form>
    </div>
        

    <div class="view-container">
        <h1>Staff Management</h1>

        <div class="search-bar">
            <form action="adminStaffRecords.php" method="post">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit" name="search_btn" >Search</button>
            </form>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>NIC No</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("db/dbconnection.php");

                    if (isset($_POST['search_btn'])) {
                        $search = $_POST['search'];
                        $sql = "SELECT * FROM staff WHERE concat(name,nic_no) LIKE '%$search%' ";
                    } else {
                        $sql = "SELECT * FROM staff";

                    }
                    $query_run = mysqli_query($conn,$sql);

                    $Staff_id = 1;

                    while($row = mysqli_fetch_array($query_run))
                    {
                        $STF_id=$row['stf_id'];
                        $StaffName=$row['name'];
                        $NicNo=$row['nic_no'];
                        $Address=$row['address'];
                        $ContactNo=$row['con_no'];
                        $Gender=$row['gender'];
                        $Role=$row['role'];
                    
                    ?>
                    <tr>
                        <td><?php echo $Staff_id  ?></td>
                        <td><?php echo $StaffName ?></td>
                        <td><?php echo $NicNo?></td>
                        <td><?php echo $Address ?></td>
                        <td><?php echo $ContactNo ?></td>
                        <td><?php echo $Gender ?></td>
                        <td><?php echo $Role ?></td>
                        <td>
                            <button class="update-btn"><a href="updateStaff.php?UPDATE=<?php echo $STF_id?>" class="update-link">Update</a></button>
                            <button class="delete-btn"><a href="deleteStaff.php?DELETE=<?php echo $STF_id?>" class="delete-link">Delete</a></button>
                        </td>
                    </tr>
                <?php $Staff_id ++; } ?>
            </tbody>    
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#insertButton").click(function() {
                var name = $("#StaffName").val();
                var nic_no = $("#NicNo").val();
                var address = $("#Address").val();
                var con_no = $("#ContactNo").val();
                var gender = $("#Gender").val();
                var role = $("#Role").val();

                $.ajax({
                    url: "", // Leave it empty if the PHP code is included in this file
                    method: "POST",
                    data: { name: name, nic_no: nic_no, address: address, con_no: con_no, gender: gender, role: role },
                    success: function(response) {
                        swal({
                            title: "Successfully Inserted!",
                            icon: "success",
                            button: "Ok"
                        });
                    },
                    error: function(xhr, status, error) {
                        swal({
                            title: "Error",
                            icon: "error",
                            button: "Ok"
                        });
                    }
                });
            });
        });
    </script>

</body>
</html>
