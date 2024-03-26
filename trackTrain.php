<?php
    @include 'config.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">  <!--for other icons-->
    
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        
        /* Basic styling for the navigation bar */
        ul.navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: rgba(0, 0, 0, 0.54); /* Black background with opacity 54% */
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            height: 60px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1; /* Ensure the navigation bar stays on top */
        }
        
        .menu {
            margin-top: 20px; /* Apply margin to the menu container */
        }

        .menu a {
            text-decoration: none;
            border-bottom: none; /* Remove the line under the menu items */
            padding: 14px 16px;
            color: #fff; /* Set text color to white */
            font-weight: bold;
            font-size: 14px;
        }
        
        .navbar-logo {
            margin-left: 80px; /* Add left margin to the logo */
            margin-top: 20px;
            color: #fff; /* Set text color to white */
            font-size: 25px;
        }
        
        .navbar-right {
            margin-right: 50px; /* Apply margin to the right-aligned items */
            margin-top: 10px;

        }
        
        .navbar-right i{
            color: #ffffff;
            cursor: pointer;
            font-weight: bold;
            word-spacing: 10px;
            position: relative; 
            font-size: 40px;
            height: 100px;
        }
        
        
        button {
            width: 90px;
            height: 30px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.2); /* White background with opacity 20% */
            color: #fff; /* Set the text color to white */
        }
        
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
            background-image: url('img/Track.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            animation: movingBackground 20s infinite linear;
        }

        @keyframes movingBackground {
            0% {
                background-position: 0% 100%;
            }
            50% {
                background-position: 100% 0%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
                
        .content {
            margin-top: 10px; /* Add margin to push content below the navigation bar */
            z-index: 0; /* Set the z-index to position the content below the navigation bar */
            display: flex;
            flex-wrap: wrap;

        }
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Increase opacity to 0.7 */
            z-index: -1;
        }

        
        @media (max-width: 768px) {
            /* Add responsive styles for screens with a maximum width of 768px (e.g., tablets and smaller devices) */
            .navbar-logo {
                margin-left: 20px;
                font-size: 20px;
            }

            .menu a {
                font-size: 8px;
            }

            .navbar-right {
                margin-right: 20px;
            }
             
            .navbar-right i {
               height: 60px;
                width: 40px;
            }
             
            h3 {
                font-size: 25px;
            }
        }
            
        @media (max-width: 480px) {
            /* Additional responsive styles for screens with a maximum width of 480px (e.g., smartphones) */
            h3 {
                font-size: 25px;
            }
        }
        
        /* CSS animation for fade-in effect */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        /* Add this CSS rule to highlight the active link */
        .menu a.active {
            border-bottom: 2px solid #52da58; /* Add a white underline to the active link */
            color: #52da58;
        }

       /*-------------Profile panel styles-------------*/
       #profile-panel {
            display: none;
            position: fixed;
            top: 60px;
            right: 55px;
            background-color: white;
            border: 1px solid black;
            padding: 10px;
            height: 420px;
            width: 300px;
            text-align: center;
            border-color: #000000;
            border-radius: 10px;
        }

        #profile-pic {
            width: 30%;
            height: 30%;
            border-radius: 50%;
            position: relative;
            left: 10px;
            margin-top: 0%;
        }

        #profile-details {
            display: flex;
            flex-direction: column;
            margin-left: 20px;
        }

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

        /* Tracking Search */ 

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 0px 20px white;
            padding: 30px;
            text-align: left; /* Align text to the left */
            width: 80%;
            max-width: 400px;
            height: 400px;
            margin-top: 50px;
        }
        h1 {
            color: #333333;
            margin-bottom: 10px;
            text-align: center; 
            margin-top: 30px;
           
        }
        form {
            margin-top: 50px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555555;
            font-weight: bold;
            text-align: left;
            margin-top: 20px;
        }
        input[type="text"] {
            width: 380px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            font-size: 16px;
            color: #555555;
            margin-left: 0; /* Adjust margin-left to 0 to align with label */
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 50px;
            margin-top: 20px;
            width: 300px;
            
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

    <ul class="navbar">
        <li class="navbar-logo">Wonder</li>
        <li class="navbar-item">
            <div class="menu">
                <a href="ticketBooking.php">Tickets</a>
                <a href="bookinghistory.php">Booking History</a>
                <a href="loyaltyProgram.php">Loyalty Programs</a>
                <a class="active">Find Your Train</a>
            </div>
        </li>
        <li class="navbar-right">
            <i class="bi bi-person-circle"></i>
        </li>
    </ul>

    <script>
        // JavaScript to handle the click event and activate the "active" class
        document.addEventListener("DOMContentLoaded", function () {
            const links = document.querySelectorAll(".menu a");

            links.forEach(link => {
                link.addEventListener("click", function () {
                    // Remove "active" class from all links
                    links.forEach(link => link.classList.remove("active"));

                    // Add "active" class to the clicked link
                    this.classList.add("active");
                });
            });
        });
    </script>

    <!-- Train Tracking -->
    <div class="container">
        <h1>Find Your Railway Route</h1>
        <form action="" method="post">
            <label for="start">Start Point:</label>
            <input type="text" id="start" name="start" required>
            
            <label for="end">End Point:</label>
            <input type="text" id="end" name="end" required>
            
            <input type="submit" value="Find Route">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $servername = "localhost";
            $username = "Hazz_Wondor";
            $password = "Hazz@2023";
            $dbname = "hazz_wonder";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }  

            // Get user inputs
            $start = $_POST['start'];
            $end = $_POST['end'];

            // Query the database for the hint URL based on start and end points
            $sql = "SELECT link FROM schedule WHERE departure_station = '$start' AND arrival_station = '$end'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $linkUrl = $row['link'];
                echo "<script>window.open('$linkUrl', '_blank');</script>";
            } else {
                echo "Route not found in the database.";
            }

            $conn->close();
        }
        ?>
    </div>

    <!----------------------------------- Profile panel ----------------------------------->
    <div id="profile-panel"><br>
        <?php
            include("db/dbconnection.php");

                $sql = "SELECT * FROM passenger";

                $query_run = mysqli_query($conn,$sql);

                $passenger_id = 1;

                while($row = mysqli_fetch_array($query_run))
                {
                    $pas_id=$row['pas_id'];
                    $name=$row['name'];
                    $nic_or_pp_no=$row['nic_or_pp_no'];
                    $con_no=$row['con_no'];
                    $email=$row['email'];
                    $hint=$row['hint'];                 
        ?>
        
        <?php $passenger_id ++; } ?>

        <div id="profile-details">
            <p class="profile-name" ><span id="profile-name"></span>&nbsp; <a href="passengerProfileEdit.php?UPDATE=<?php echo $pas_id?>" class="update-link"><img src="img/pencil-square.svg" style="display: inline-block; height: 20px; width: 20px; cursor: pointer;"></a></p>
        </div>
        <img src="img/person-circle.svg" alt="Profile Picture" id="profile-pic">
        <div id="profile-details">
            <p style="color: #818181;"><?php echo $email?><span id="profile-email"></span></p><br><br>
            <p>NIC <?php echo $nic_or_pp_no?><span id="profile-nic"></span></p><br>
            <p>Contact No <?php echo $con_no?><span id="profile-contact"></span></p>
            <!-- Add the "Logout" text at the bottom of the profile panel -->
            <div id="logout-text" onclick="logout()"><img src="img/box-arrow-right.svg" style="display: inline-block; ">&nbsp; Logout</div>   
        </div>
    </div>

    <script>
        // JavaScript to handle the click event and show/hide the profile panel
        document.addEventListener("DOMContentLoaded", function () {
            const profileIcon = document.querySelector(".bi-person-circle");
            const profilePanel = document.getElementById("profile-panel");
            const profileName = document.getElementById("profile-name");
            const profileEmail = document.getElementById("profile-email");
            const profileNic = document.getElementById("profile-nic");
            const profileDob = document.getElementById("profile-dob");
            const profileContact = document.getElementById("profile-contact");
            const profilePic = document.getElementById("profile-pic");

            profileIcon.addEventListener("click", function () {
                if (profilePanel.style.display === "block") {
                    profilePanel.style.display = "none";
                } else {
                    // Fetch profile data from API (replace with your API endpoint)
                    fetch("https://your-api-endpoint.com/profile")
                        .then(response => response.json())
                        .then(data => {
                            profileName.textContent = data.name;
                            profileNic.textContent = data.nic;
                            profileDob.textContent = data.dob;
                            profileContact.textContent = data.contact;
                            profilePic.src = data.profilePicUrl;
                        })
                        .catch(error => console.error("Error fetching profile data:", error));

                    profilePanel.style.display = "block";
                }
            });

            // Close the profile panel when clicking anywhere else on the page
            document.addEventListener("click", function (event) {
                if (event.target !== profileIcon && !profilePanel.contains(event.target)) {
                    profilePanel.style.display = "none";
                }
            });
        });

        // Logout function to be executed when clicking on the "Logout" text
        function logout() {
            // Perform logout functionality here if needed
            // For demonstration purposes, we will simply hide the profile panel
            const profilePanel = document.getElementById("profile-panel");
            profilePanel.style.display = "none";
        }
    </script>    
</body>
</html>
