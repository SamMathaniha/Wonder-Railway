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

        if (isset($_POST['insert-user'])) 
        {
            $name = $_POST['name'];
            $nic_no = $_POST['nic_no'];
            $con_no = $_POST['con_no'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $user_type = $_POST['user_type'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "INSERT into user (name, nic_no, con_no, address, gender, user_type, email, password) values 
            ('$name', '$nic_no', '$con_no', '$address', '$gender', '$user_type', '$email', '$password')";

            if($conn ->query ($sql)==TRUE){
            echo "<script> alert ('New Record inserted successfully')</script>";
            echo "<script> window.location = 'userRegister.php';</script>";
            
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

        .column .toggle-password {
        position: absolute;
        top: 79.5%;
        right: 120px;
        transform: translateY(-50%);
        cursor: pointer;
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
            <button><a href="adminOtherExpensesR.php">Other Expenses Records</a></button>
            <button><a href="adminClientView.php">Customer View</a></button>
            <button><a href="adminBookingHistoryView.php">Booking History</a></button>
            <button><a class="active">User Management</a></button>
        </div>
    </div>


    <!-- Right Panel -->
    <div class="train-container">
        <h2>User Management</h2>
        <form action="userRegister.php" method="post">
        
        <div class="row">
            <div class="column">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"  required>
            </div>
        </div>

        <div class="row">
            <div class="column">
            <label for="nic_no">NIC No:</label>
            <input type="text" id="nic_no" name="nic_no" required >
            </div>
            <div class="column">
            <label for="con_no">Contact No:</label>
            <input type="text" id="con_no" name="con_no" required>
            </div>
        </div>

        <div class="row">
            <div class="column">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address"  required>
            </div>
        </div>

        <div class="row">
            <div class="column">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            </div>
            <div class="column">
            <label for="user_type">User Type:</label>
            <select id="user_type" name="user_type" required>
                <option value="">Select Type</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
            </select>
            </div>
        </div>

        <div class="row">
            <div class="column">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required >
            </div>
            <div class="column">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <span class="toggle-password" id="toggle-icon" onclick="togglePassword()">&#x1F441;</span>
            </div>
        </div>
        <br>
        <button type="submit" name="insert-user">Insert</button>
        </form>
    </div>

    <script>
    // function for show the password
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const toggleIcon = document.getElementById("toggle-icon");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.innerHTML = "&#x1F441;";
      } else {
        passwordInput.type = "password";
        toggleIcon.innerHTML = "&#x1F441;";
      }
    }
    </script>
        

    <div class="view-container">
        <h1>User Management</h1>

        <div class="search-bar">
            <form action="userRegister.php" method="post">
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
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("db/dbconnection.php");

                    if (isset($_POST['search_btn'])) {
                        $search = $_POST['search'];
                        $sql = "SELECT * FROM user WHERE concat(name,nic_no) LIKE '%$search%' ";
                    } else {
                        $sql = "SELECT * FROM user";

                    }
                    $query_run = mysqli_query($conn,$sql);

                    $Staff_id = 1;

                    while($row = mysqli_fetch_array($query_run))
                    {
                        $name = $row['name'];
                        $nic_no = $row['nic_no'];
                        $con_no = $row['con_no'];
                        $address = $row['address'];
                        $gender = $row['gender'];
                        $user_type = $row['user_type'];
                        $email = $row['email'];
                        $password = $row['password'];
                    
                    ?>
                    <tr>
                        <td><?php echo $name  ?></td>
                        <td><?php echo $nic_no ?></td>
                        <td><?php echo $con_no?></td>
                        <td><?php echo $address ?></td>
                        <td><?php echo $gender ?></td>
                        <td><?php echo $user_type ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $password ?></td>
                        <td>
                            <button class="update-btn"><a href="updateUser.php?UPDATE=<?php echo $u_id?>" class="update-link">Update</a></button>
                            <button class="delete-btn"><a href="deleteUser.php?DELETE=<?php echo $u_id?>" class="delete-link">Delete</a></button>
                        </td>
                    </tr>
                <?php $Staff_id ++; } ?>
            </tbody>    
        </table>
    </div>
</body>
</html>
