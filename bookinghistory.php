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

    // Retrieve the logged-in passenger's pas_id from the session
    $pas_id = $_SESSION['pas_id'];

    // Modify the SQL query to retrieve only the records for the logged-in passenger
    $sql = "SELECT * FROM ticket WHERE pas_id = '$pas_id'";
    $query_run = mysqli_query($conn, $sql);
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
        
        
        button {
            width: 90px;
            height: 30px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.2); /* White background with opacity 20% */
            color: #fff; /* Set the text color to white */
            cursor: pointer;
        }
        
        body {
            background-image: url('img/homeBg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: relative; /* Add position relative for the ::before pseudo-element */
            background-repeat: no-repeat;
        }
        
        .content {
            margin-top: 60px; /* Add margin to push content below the navigation bar */
            z-index: 0; /* Set the z-index to position the content below the navigation bar */
        }
        
        .overlay-text {
            color: #fff;
            font-size: 36px;
            text-align: center;
            position: relative; /* Add position relative for the ::before pseudo-element */
            top: 35px;
            right: 550px;
            z-index: 1; /* Set z-index to position the text above the ::before pseudo-element */
        }
        
        body::before { /* Create the pseudo-element for the black overlay */
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.54); /* Black background with opacity 54% */
            z-index: -1; /* Set z-index to position the pseudo-element behind the content */
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

        /* Apply the animation to the overlay-text class */
        .overlay-text h3 {
            animation: fadeIn 1.5s ease-in-out; /* Animation duration and easing function */
            margin-left: 150px;
            margin-top: 20px;
        }

                
        /* Add this CSS rule to highlight the active link */
        .menu a.active {
            border-bottom: 2px solid #52da58; /* Add a white underline to the active link */
            color: #52da58;
        }


        /*View Schedule table*/
        /* Additional styles for the table */
        .container-schedule-view {
            background-color: white;
            overflow: auto;
            margin-top: 20px;
            padding: 10px;
            position: relative; top: -250px;
            height: 600px;
            overflow: auto;
            margin-top: 340px;
            width: 1200px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            overflow: auto;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
                
        .cancel-button{
            color: white;
            background-color: red;
            border: none;
            display: block; /* Make the button a block element */
            margin: 0 auto; /* Center horizontally */
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
    </style>
</head>
<body>
    <ul class="navbar">
        <li class="navbar-logo">Wonder</li>
        <li class="navbar-item">
            <div class="menu">
                <a href="ticketBooking.php">Tickets</a>
                <a class="active">Booking History</a>
                <a href="loyaltyProgram.php">Loyalty Programs</a>
                <a href="trackTrain.php">Find Your Train</a>
            </div>
        </li>
        <li class="navbar-right">
            <i class="bi bi-person-circle"></i>
        </li>
    </ul>

    <div class="content">
        <div class="overlay-text">
            <h3>Booking history</h3>
        </div>
    </div>

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


    <!-- View table -->
    <div class="container-schedule-view">
        <table>
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Departure Station</th>
                    <th>Arrival Station</th>
                    <th>Date</th>
                    <th>Departure Time</th>
                    <th>Payment Amount</th>
                    <th>No of seats</th>
                    <th>Train</th>
                    <th>Cancel</th> <!-- New "Cancel" column header -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    
                        while($row = mysqli_fetch_assoc($query_run))
                        {

                    ?>
                        <td><?php echo $row['tik_id']?></td>
                        <td><?php echo $row['departure_station']?></td>
                        <td><?php echo $row['arrival_station']?></td>              
                        <td><?php echo $row['date']?></td>                   
                        <td><?php echo $row['departure_time']?></td>                  
                        <td><?php echo $row['payment']?></td> 
                        <td><?php echo $row['no_seat']?></td>              
                        <td><?php echo $row['trn_id']?></td>                   
                        <td>
                        <button type="button" class="cancel-button"><a href="deleteBookingHistory.php?DELETE=<?php echo $row['tik_id'];?>" class="delete-link" style="color: white; text-decoration: none;">Cancel</a></button>
                        </td>
                </tr>

                    <?php }
                    ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <script>
        // JavaScript for handling the cancel button click event
        document.addEventListener("DOMContentLoaded", function () {
            const cancelButtonList = document.querySelectorAll(".cancel-button");

            cancelButtonList.forEach(button => {
                button.addEventListener("click", function () {
                    // Handle cancellation logic for this row
                    // For example, you can mark the row as cancelled or perform other actions
                });
            });
        });
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
            <p class="profile-name" ><span id="profile-name"></span>&nbsp; <a href="passengerProfileEdit.php?UPDATE=<?php echo $pas_id?>" class="update-link"><img src="img/pencil-square.svg" style="display: inline-block; height: 20px; width: 20px; cursor: pointer; margin-left: 200px;"></a></p>
        </div><br>
        <img src="img/person-circle.svg" alt="Profile Picture" id="profile-pic">
        <div id="profile-details">
            <p style="color: #818181;"><?php echo $email?><span id="profile-email"></span></p><br><br>
            <p>NIC <?php echo $nic_or_pp_no?><span id="profile-nic"></span></p><br>
            <p>Contact No <?php echo $con_no?><span id="profile-contact"></span></p><br>
            <!-- Add the "Logout" text at the bottom of the profile panel -->
            <div id="logout-text" onclick="logout()"><img src="img/box-arrow-right.svg" style="display: inline-block; margin-top: 20px; margin-left: -120px;"><a href="logOut.php" style="text-decoration: none; color: black; ">&nbsp; Logout</a></div>   
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
