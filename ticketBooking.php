<?php
    session_start();

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
            background-image: url('img/homeBg.jpg');
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
            flex-direction: row;
            justify-content: space-between;

        }

        .overlay-text {
            color: #fff;
            font-size: 36px;
            text-align: center;
            margin-top: -100px;
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
            background-color: rgba(0, 0, 0, 0.2); /* Increase opacity to 0.2 */
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

        /* Apply the animation to the overlay-text class */
        .overlay-text h3 {
            animation: fadeIn 1.5s ease-in-out; /* Animation duration and easing function */
            margin-top: 300px;
            margin-bottom:-250px;
            font-size: 30px;
        }

        
        /* Add this CSS rule to highlight the active link */
        .menu a.active {
            border-bottom: 2px solid #52da58; /* Add a white underline to the active link */
            color: #52da58;
        }
        
        /***********booking fields***********/
        .container-booking {
            display: flex;  
            width: 1000px;
            justify-content: space-between;
            align-items: center;
            justify-content: center;
            position: relative; 
            margin-left: 40px;
            margin-top: 260px;
            background-color: rgb(255,255,255,0.7);        
        }
        
        .left-side {
            padding: 20px;
        }
        
        .form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            height: 120px; /* Set a maximum height for the form */
            overflow-y: auto; /* Enable vertical scrolling when content overflows */
        }

        .form-row {
            display: flex;
            align-items: center;
        }

        .selected-seats {
            display: flex;
            align-items: center;
        }
        
        label {
            width: 120px;
            text-align: right;
            color: #ffffff;
            font-weight: bold;
            font-size: 20px;
            margin-right: 10px;
            margin: 0 10px;
        }
        
        select {
            width: 200px;
        }

        .selected-seats-display{
            list-style-type:none ;
            background-color: #ffffff;
            height: 100px;
            width: 200px;
        }
        
        img {
            margin-top: 20px;
            max-width: 100%;
            display: block;
        }
        
        .book-now-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #029c0d;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            position: relative; left: 400px;
            width: 180px;
            height: 40px;
            margin-left: 220px;
            font-size: 18px;
            font-family: timesnewroman
        }
        
        /* Style the button on hover and focus */
        .book-now-button:hover,
        .book-now-button:focus {
            background-color: #029c0d;
        }

        /*-------------Train seat booking-------------*/ 
        .ticket-container {
        margin: 20px 0;
        }

        .ticket-container select {
        background-color: #fff;
        border: 0;
        border-radius: 5px;
        font-size: 16px;
        margin-left: 10px;
        padding: 5px 15px 5px 15px;
        -moz-appearance: none;
        -webkit-appearance: none;
        appearance: none;
        }

        .container {
        perspective: 1000px;
        margin-bottom: 30px;
        margin-left: 250px;
        }

        .seat {
        background-color: white;
        height: 26px;
        width: 32px;
        margin: 3px;
        font-size: 50px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        margin-bottom: 10px;
        font-size: 20px;
        text-align: center;
            
        }

        small {
            color:black;
            font-size:15px;
        }

        .seat.selected {
        background-color: green;
        }

        .seat.sold {
        background-color: red;
        }

        .seat:nth-of-type(4) {
        margin-right: 40px;
        }

        .seat:nth-last-of-type(4) {
        margin-left: 40px;
        }

        .seat:not(.sold):hover {
        cursor: pointer;
        transform: scale(1.2);
        }

        .showcase .seat:not(.sold):hover {
        cursor: default;
        transform: scale(1);
        }

        .showcase {
        background: rgba(0, 0, 0, 0.1);
        padding: 5px 10px;
        border-radius: 5px;
        color: #777;
        list-style-type: none;
        display: flex;
        justify-content: space-between;
        }

        .showcase li {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 10px;
        }
        .showcase li small {
        margin-left: 2px;
        }

        .row {
        display: flex;
        }

        p.text{
            margin: 5px 0;
        }

        p.text span{
            color: green;
            font-weight: bold;
            font-size: 18px;
        }

        /*-------------Table View-------------*/
        .btn-sm{
            color: black;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            background-color: #f2f2f2;            
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
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
            left: 110px;
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

        @media(max-width:700px){
            .navbar-logo{
                font-size: 15px;
                margin-right: 2px;
            }
            .navbar-right {
                display: flex;
                align-items: center; /* Center buttons horizontally */
            }
            .navbar-right a{
                font-size: 12px; /* Adjust the font size for better visibility */
                margin: 5px; /* margin to separate buttons */
                width: auto; /* buttons width */
            }
            
            .login-box {
                width: 350px;
                padding: 40px;
                background-color: rgba(0, 0, 0, 0.5);
                border: 1px solid #ffffff;
                border-radius: 5px;
                padding-bottom: 1px;
                margin-top: 80px;
            }

            /* Apply the animation to the overlay-text class */
            .overlay-text h3 {
                margin-top: 500px;
            }

            .container-booking {
                display: flex;  
                width: 1000px;
                justify-content: space-between;
                align-items: center;
                justify-content: center;
                position: relative; 
                margin-left: 40px;
                margin-top: 260px;
                background-color: rgb(255,255,255,0.7);        
            }
        }

    </style>
</head>
<body>

    <ul class="navbar">
        <li class="navbar-logo">Wonder</li>
        <li class="navbar-item">
            <div class="menu">
                <a class="active">Tickets</a>
                <a href="bookinghistory.php">Booking History</a>
                <a href="loyaltyProgram.php">Loyalty Programs</a>
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
    
    <div class="overlay-text">
        <h3>Book My Ticket</h3>
    </div>

    <!-- Booking Form  Start -->
    <form method="post" action="payment.php" class="ticketBookingForm"> 
        <div class="content">
                <!--booking fields-->
                <div class="container-booking">
                    <div class="left-side">
                    <div class="form">
                        <!--Table View -->
                        <table border="0">
                            <tr>
                            <th>ID</th>
                            <th>Start Point</th>
                            <th>End Point</th>
                            <th>Departure Time</th>
                            <th>Arrival Time</th>
                            <th>Date</th>
                            <th>Train</th>
                            <th>Schedule Status</th>
                            <th>Class</th>
                            <th>Cost</th>
                            </tr>
                            <?php
                                // Prepare the query to retrieve all data from the schedule table
                                $sql = "SELECT * FROM schedule";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row["sche_id"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["departure_station"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["arrival_station"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["departure_time"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["arrival_time"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["date"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["trn_id"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["train_status"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["class"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["cost"]) . "</td>";
                                        echo "</tr>";
                                    }
                                } 
                                else {
                                    echo "No records found.";
                                }
                            ?>
                        </table>
                    </div>

                    <br>
                    
                    <p style="font-weight: bold; ">Select each field according to your selected ID by using above schedule</p>

                    <!-- Retrieve data from database to combo boxes to process ticket Booking -->
                    <div class="ticket-container">

                        <!-- Retrieve DATA TO SELECT ID -->
                        <select id="ticket" name="selected_id">
                            <option value=""  disabled selected>Select ID</option>
                            <?php
                                // Retrieve unique sche_id and cost pairs from the schedule table
                                $sql = "SELECT * FROM schedule";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row["cost"]) . "'>" . htmlspecialchars($row["sche_id"]) . "</option>";
                                    }
                                } else {
                                    echo "<option disabled>No records found.</option>";
                                }
                            ?>
                        </select>

                        <!-- Retrieve DATA TO SELECT Departure Station -->
                        <select id="selected_depStation" name="selected_depStation">
                            <option value="" disabled selected>Departure Station</option>
                            <?php
                                // Retrieve unique departure stations from the schedule table
                                $sql = "SELECT DISTINCT departure_station FROM schedule";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row["departure_station"]) . "'>" . htmlspecialchars($row["departure_station"]) . "</option>";
                                    }
                                } else {
                                    echo "<option disabled>No records found.</option>";
                                }
                            ?>
                        </select>
                        <input type="hidden" id="departure_station" name="departure_station" value="">

                        <!-- Retrieve DATA TO SELECT Arrival Station -->
                        <select id="selected_ArrivalStation" name="selected_ArrivalStation">
                            <option value="" disabled selected>Arrival Station</option>
                            <?php
                                // Retrieve unique Arrival stations from the schedule table
                                $sql = "SELECT DISTINCT arrival_station FROM schedule";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row["arrival_station"]) . "'>" . htmlspecialchars($row["arrival_station"]) . "</option>";
                                    }
                                } else {
                                    echo "<option disabled>No records found.</option>";
                                }
                            ?>
                        </select>
                        <input type="hidden" id="arrival_station" name="arrival_station" value="">

                        <!-- Retrieve DATA TO SELECT Date -->
                        <select id="selected_date" name="selected_date">
                            <option value="" disabled selected>Date</option>
                            <?php
                                // Retrieve unique Date from the schedule table
                                $sql = "SELECT DISTINCT date FROM schedule";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row["date"]) . "'>" . htmlspecialchars($row["date"]) . "</option>";
                                    }
                                } else {
                                    echo "<option disabled>No records found.</option>";
                                }
                            ?>
                        </select>
                        <input type="hidden" id="date" name="date" value="">

                        <br><br>

                        <!-- Retrieve DATA TO SELECT Departure Time -->
                        <select id="selected_depTime" name="selected_depTime">
                            <option value="" disabled selected>Departure Time</option>
                            <?php
                                // Retrieve unique Departure Time from the schedule table
                                $sql = "SELECT DISTINCT departure_time FROM schedule";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row["departure_time"]) . "'>" . htmlspecialchars($row["departure_time"]) . "</option>";
                                    }
                                } else {
                                    echo "<option disabled>No records found.</option>";
                                }
                            ?>
                        </select>
                        <input type="hidden" id="departure_time" name="departure_time" value="">

                        <!-- Retrieve DATA TO SELECT Arrival Time -->
                        <select id="selected_arrivalTime" name="selected_arrivalTime">
                            <option value="" disabled selected>Arrival Time</option>
                            <?php
                                // Retrieve unique Arrival Time from the schedule table
                                $sql = "SELECT DISTINCT arrival_time FROM schedule";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row["arrival_time"]) . "'>" . htmlspecialchars($row["arrival_time"]) . "</option>";
                                    }
                                } else {
                                    echo "<option disabled>No records found.</option>";
                                }
                            ?>
                        </select>
                        <input type="hidden" id="arrival_time" name="arrival_time" value="">


                        <!-- Retrieve DATA TO SELECT Train -->
                        <select id="selected_train" name="selected_train">
                            <option value="" disabled selected>Train</option>
                            <?php
                                // Retrieve unique Train Time from the schedule table
                                $sql = "SELECT DISTINCT trn_id FROM schedule";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row["trn_id"]) . "'>" . htmlspecialchars($row["trn_id"]) . "</option>";
                                    }
                                } else {
                                    echo "<option disabled>No records found.</option>";
                                }
                            ?>
                        </select>
                        <input type="hidden" id="trn_id" name="trn_id" value="">


                        <!-- Retrieve DATA TO SELECT passenger -->
                        <input type="hidden" id="pas_id" name="pas_id" value="">

                    </div>



                    <script>
                        //To echo data to text box

                        // Attach an event listener to the select element --- for Departure Station
                        document.getElementById('selected_depStation').addEventListener('change', function() {
                            var selectedDepStation = this.value; // Get the selected value

                            // Set the selected departure station in the text box
                            document.getElementById('departure_station').value = selectedDepStation;
                        });


                        // Attach an event listener to the select element --- for Arrival Station
                        document.getElementById('selected_ArrivalStation').addEventListener('change', function() {
                            var selectedArrivalStation = this.value; // Get the selected value

                            // Set the selected Arrival Station in the text box
                            document.getElementById('arrival_station').value = selectedArrivalStation;
                        });


                        // Attach an event listener to the select element --- for Date
                        document.getElementById('selected_date').addEventListener('change', function() {
                            var selecteddate = this.value; // Get the selected value

                            // Set the selected Date in the text box
                            document.getElementById('date').value = selecteddate;
                        });

                        
                        // Attach an event listener to the select element --- for Departure Time
                        document.getElementById('selected_depTime').addEventListener('change', function() {
                            var selectedDepTime = this.value; // Get the selected value

                            // Set the selected Departure Time in the text box
                            document.getElementById('departure_time').value = selectedDepTime;
                        });


                        // Attach an event listener to the select element --- for Arrival Time
                        document.getElementById('selected_arrivalTime').addEventListener('change', function() {
                            var selectedArrivalTime = this.value; // Get the selected value

                            // Set the selected  Arrival Time in the text box
                            document.getElementById('arrival_time').value = selectedArrivalTime;
                        });

                        // Attach an event listener to the select element --- for Train
                        document.getElementById('selected_train').addEventListener('change', function() {
                            var selectedArrivalTime = this.value; // Get the selected value

                            // Set the selected Train in the text box
                            document.getElementById('trn_id').value = selectedArrivalTime;
                        });



                    </script>


                    <!-- TO SHOWCASE THE SEATS -->
                        <ul class="showcase">
                        <li>
                            <div class="seat"></div>
                            <small>Available</small>
                        </li>
                        <li>
                            <div class="seat selected"></div>
                            <small>Selected</small>
                        </li>
                        </ul>

                       <p style="font-weight: bold; ">Select Seats as you prefer</p>


                        <div class="container">
                            <div class="row">
                                <div class="seat" id="a1">A1</div>
                                <div class="seat" id="a2">A2</div>
                                <div class="seat" id="a3">A3</div>
                                <div class="seat" id="a4">A4</div>
                                <div class="seat" id="a5">A5</div>
                                <div class="seat" id="a6">A6</div>
                                <div class="seat" id="a7">A7</div>
                                <div class="seat" id="a8">A8</div>
                            </div>

                            
                            <div class="row">
                                <div class="seat" id="b1">B1</div>
                                <div class="seat" id="b2">B2</div>
                                <div class="seat" id="b3">B3</div>
                                <div class="seat" id="b4">B4</div>
                                <div class="seat" id="b5">B5</div>
                                <div class="seat" id="b6">B6</div>
                                <div class="seat" id="b7">B7</div>
                                <div class="seat" id="b8">B8</div>
                            </div>

                            <div class="row">
                                <div class="seat" id="c1">C1</div>
                                <div class="seat" id="c2">C2</div>
                                <div class="seat" id="c3">C3</div>
                                <div class="seat" id="c4">C4</div>
                                <div class="seat" id="c5">C5</div>
                                <div class="seat" id="c6">C6</div>
                                <div class="seat" id="c7">C7</div>
                                <div class="seat" id="c8">C8</div>
                            </div>
                            <div class="row">
                                <div class="seat" id="d1">D1</div>
                                <div class="seat" id="d2">D2</div>
                                <div class="seat" id="d3">D3</div>
                                <div class="seat" id="d4">D4</div>
                                <div class="seat" id="d5">D5</div>
                                <div class="seat" id="d6">D6</div>
                                <div class="seat" id="d7">D7</div>
                                <div class="seat" id="d8">D8</div>
                            </div>
                            <div class="row">
                                <div class="seat" id="e1">E1</div>
                                <div class="seat" id="e2">E2</div>
                                <div class="seat" id="e3">E3</div>
                                <div class="seat" id="e4">E4</div>
                                <div class="seat" id="e5">E5</div>
                                <div class="seat" id="e6">E6</div>
                                <div class="seat" id="e7">E7</div>
                                <div class="seat" id="e8">E8</div>
                            </div>
                            <div class="row">
                                <div class="seat" id="f1">F1</div>
                                <div class="seat" id="f2">F2</div>
                                <div class="seat" id="f3">F3</div>
                                <div class="seat" id="f4">F4</div>
                                <div class="seat" id="f5">F5</div>
                                <div class="seat" id="f6">F6</div>
                                <div class="seat" id="f7">F7</div>
                                <div class="seat" id="f8">F8</div>
                            </div>
                            <div class="row">
                                <div class="seat" id="g1">G1</div>
                                <div class="seat" id="g2">G2</div>
                                <div class="seat" id="g3">G3</div>
                                <div class="seat" id="g4">G4</div>
                                <div class="seat" id="g5">G5</div>
                                <div class="seat" id="g6">G6</div>
                                <div class="seat" id="g7">G7</div>
                                <div class="seat" id="g8">G8</div>
                            </div>
                        </div>

                        <p class="text">
                        You have selected <span id="count">0</span> seat for a price of Rs.<span
                            id="total"
                            >0</span
                        >
                        </p>


                        

                        <!-- Add hidden input fields to store the selected data -->
                        <input type="hidden" id="selected_count" name="count" value=10>
                        <input type="hidden" id="seats_selected" name="seats_selected" value="">
                        <input type="hidden" id="total_amount" name="total">

                        <button class="book-now-button" type="submit" name="submit" value="Book Now">Book Now</button>


                        <script>

                            // Get the hidden input fields
                            const selectedCountInput = document.getElementById("selected_count");
                            const seatsSelected = document.getElementById("seats_selected");
                            const totalAmountInput = document.getElementById("total_amount");

                            const container = document.querySelector(".container");
                            const seats = document.querySelectorAll(".row .seat:not(.sold)");
                            const count = document.getElementById("count");
                            const total = document.getElementById("total");
                            const ticketSelect = document.getElementById("ticket");

                            populateUI();

                            let ticketPrice = +ticketSelect.value;

                            // Save selected ticket index and price
                            function setticketData(ticketIndex, ticketPrice) {
                            localStorage.setItem("selectedticketIndex", ticketIndex);
                            localStorage.setItem("selectedticketPrice", ticketPrice);
                            }

                            // Update total and count
                            function updateSelectedCount() {
                                const selectedSeats = document.querySelectorAll(".row .seat.selected");
                                console.log(selectedSeats);
                                const selectedSeatsCount = selectedSeats.length;
                                const totalPrice = selectedSeatsCount * ticketPrice;

                                count.innerText = selectedSeatsCount;
                                total.innerText = totalPrice;
                                var idString = "";
                                
                                selectedSeats.forEach(function(element) {
                                    var id = element.id;
                                    idString += id + ", ";
                                });

                                // Remove the trailing comma if it exists
                                if (idString.endsWith(", ")) {
                                    idString = idString.slice(0, -2); // Remove the last two characters
                                }

                                console.log("All IDs: " + idString);
                                
                                
                                
                                seatsSelected.value = idString;
                                selectedCountInput.value = selectedSeatsCount;
                                totalAmountInput.value = totalPrice;
                            }


                            // Get data from localstorage and populate UI
                            function populateUI() {
                            const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));

                            if (selectedSeats !== null && selectedSeats.length > 0) {
                                seats.forEach((seat, index) => {
                                if (selectedSeats.indexOf(index) > -1) {
                                    console.log(seat.classList.add("selected"));
                                }
                                });
                                departureStationInput.value = departureStation;
                                arrivalStationInput.value = arrivalStation;
                                dateInput.value = selectedDate;
                                departureTimeInput.value = selectedDepartureTime;
                                arrivalTimeInput.value = selectedArrivalTime;
                                trnIdInput.value = selectedTrnId;
                            }

                            const selectedticketIndex = localStorage.getItem("selectedticketIndex");

                            if (selectedticketIndex !== null) {
                                ticketSelect.selectedIndex = selectedticketIndex;
                                console.log(selectedticketIndex)
                            }
                            }
                            console.log(populateUI())
                            
                            // ticket select event
                            ticketSelect.addEventListener("change", (e) => {
                            ticketPrice = +e.target.value;
                            setticketData(e.target.selectedIndex, e.target.value);
                            updateSelectedCount();
                            });

                            // Seat click event
                            container.addEventListener("click", (e) => {
                            if (
                                e.target.classList.contains("seat") &&
                                !e.target.classList.contains("sold")
                            ) {
                                e.target.classList.toggle("selected");

                                updateSelectedCount();
                            }
                            });

                            // Initial count and total set
                            updateSelectedCount();

                            // Clear selected seat data from localStorage on page load
                            window.addEventListener('load', function () {
                                localStorage.removeItem('selectedticketIndex');
                                localStorage.removeItem('selectedticketPrice');
                            });
                            
                        </script>
                </div>
        </div>
    </form>

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
