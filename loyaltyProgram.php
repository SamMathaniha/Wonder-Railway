<?php
session_start();	

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

        // Fetching payment details from the database
        $select = "SELECT * FROM loyalty_program";
        $result = mysqli_query($conn, $select);

        // Initialize payment array
        $payment = array();

        if ($result) {
            // Store the fetched data in the payment array
            while ($row = mysqli_fetch_assoc($result)) {
                $payment[] = $row;
            }
        }

        // Calculate total points
        $totalPoints = 0;
        foreach ($payment as $paymentDone) {
            if (isset($paymentDone['points'])) {
                $totalPoints += intval($paymentDone['points']);
        }
    }
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
            background-image: url('img/paymentBg.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: relative; /* Add position relative for the ::before pseudo-element */
            overflow-x: hidden;
            background-repeat: no-repeat;
        }
        
        .content {
            margin-top: 10px; /* Add margin to push content below the navigation bar */
            z-index: 0; /* Set the z-index to position the content below the navigation bar */
            display: flex;
            flex-wrap: wrap;

        }

        .overlay-text .heading{
            color: #fff;
            font-size: 36px;
            margin-top: -100px;
            margin-right: 350px;
            position: relative; /* Add position relative for the ::before pseudo-element */
            z-index: 1; /* Set z-index to position the text above the ::before pseudo-element */
        }

        .overlay-text .a{
            color: #fff;
            font-size: 36px;
            margin-top: -100px;
            margin-right: 400px;
            position: relative; /* Add position relative for the ::before pseudo-element */
            z-index: 1; /* Set z-index to position the text above the ::before pseudo-element */
        }
        
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Increase opacity to 0.7 */
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

        /*cheer points*/
        .points {
            display: flex;
            height: 400px;
            position: relative; 
            top: 10px;
        }

        .points a {
            color: white;
            font-size: 20px;
            position: relative; 
            left: 80px;
            font-weight: bold;
        }

        .progress-bar-container {
            width: 1000px; /* Increased the width */
            border: 1px solid black;
            border-radius: 5px;
            margin: 50px auto;
            padding: 10px;
            position: relative;
            background-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: -220px;
            
        }

        .progress-bar {
            background-color: #f1f1f1;
            border-radius: 5px;
            height: 20px;
            width: 100%;
            position: relative;
            overflow: hidden; /* This hides the overflowing segments */
            box-shadow: 0 2px 4px  inset;
            margin-top: 20px;
        }

        .progress-segment-silver {
            background-color: #C0C0C0;
            width: 16.67%;
        }

        .progress-segment-gold {
            background-color: #FFD700;
            width: 16.67%; /* Change the width to match the silver segment */
        }

        .progress-segment-platinum {
            background-color: #E5E4E2;
            width: 33.33%; /* Change the width to match the gold segment */
        }

        .progress-segment-diamond {
            background-color: #B9F2FF;
            width: 33.33%; /* Change the width to match the platinum segment */
        }

        .progress-bar-text {
            margin-top: -10px;
            font-weight: bold;
            font-size: 18px;
            color: lightblue;
        }

        .progress-markers {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            font-size: 12px;
            color: #777;
        }

        .progress-marker {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            opacity: 0.5;
            
        }

        .progress-marker-label {
            margin-top: 15px;
            color: black;
            font-size: 20px;
        }

        .active {
            opacity: 1;
        }

        .progress-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-weight: bold;
            z-index: 1;
            font-size: 14px;
            color: black;
            
        }

        .progress-bar-fill {
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 5px;
            width: 0;
            background-color: #4CAF50; /* Add this line to set the fill color to green */
        }
        
        
          .progress-container {
            width: 80%;
            margin: 20px auto;
            position: relative;
        }

        .progress-bar {
            width: 0;
            height: 20px;
            background-color: #3498db;
            transition: width 0.5s;
        }

        .stages {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-weight: bold;
        }

        .stage {
            flex: 1;
            text-align: center;
            transition: color 0.5s;
        }

        .stage.reached {
            color: #27ae60;
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
                <a class="active">Loyalty Programs</a>
                <a href="trackTrain.php">Find Your Train</a>
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

    <div class="content">
        <div class="overlay-text">
            <div class="heading">
                <a>Thank you for being a loyal customer of Wonder!</a>
            </div>

            <!--Cheer points-->
            <div class="points">
                <a><br>What is your Wonder Cheer Points?</a>
            </div>
        </div>
    </div>


    <!-- Loyalty Program -->
    <div class="progress-bar-container">
        <div class="progress-markers" id="progressMarkers">
            <div class="progress-marker">
                <div class="progress-marker-label">SILVER (500)</div>
                <div class="progress-marker-line"></div>
            </div>
            <div class="progress-marker">
                <div class="progress-marker-label">GOLD (1000)</div>
                <div class="progress-marker-line"></div>
            </div>
            <div class="progress-marker">
                <div class="progress-marker-label">PLATINUM (2000)</div>
                <div class="progress-marker-line"></div>
            </div>
            <div class="progress-marker">
                <div class="progress-marker-label">DIAMOND (3000)</div>
            </div>
        </div>

        <div class="progress-container">
        <div class="progress-bar" id="progress-bar" style="width: <?php echo ($totalPoints / 3000) * 100; ?>%"></div>
        <div class="stages">
            <div class="stage" data-percentage="25">Silver</div>
            <div class="stage" data-percentage="50">Gold</div>
            <div class="stage" data-percentage="75">Platinum</div>
            <div class="stage" data-percentage="100">Diamond</div>
        </div>
        </div>

        <script>
        function updateProgressBar() {
        const pointsInput = document.getElementById('points-input');
        const progressBar = document.getElementById('progress-bar');
        const stages = document.querySelectorAll('.stage');

        const points = parseFloat(pointsInput.value);
        if (isNaN(points)) {
            alert('Please enter a valid number of points.');
            return;
        }

        let percentage = (points / 100) * 100; // Assuming 100 points is the max

        if (percentage > 100) {
            percentage = 100;
        }

        progressBar.style.width = percentage + '%';

        stages.forEach(stage => {
            const stagePercentage = parseInt(stage.getAttribute('data-percentage'));
            if (percentage >= stagePercentage) {
            stage.classList.add('reached');
            } else {
            stage.classList.remove('reached');
            }
        });
        }
        </script>

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
            <div id="logout-text" onclick="logout()"><img src="img/box-arrow-right.svg" style="display: inline-block; "><a href="logOut.php" style="text-decoration: none; ">&nbsp; Logout</a></div>   
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
