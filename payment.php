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
    die("Connection Failed: " . $conn->connect_error);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">  <!--for other icons-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Payments</title>
  <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
  <style>
      * {
            padding: 0;
            margin: 0;
      }

      body {
            margin: 0;
            padding: 0;
            background-image: url('img/paymentBg.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            position: relative;
            background-repeat: no-repeat;
            overflow-x: hidden;
            position: relative;
      }

        /* Add the black overlay */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 900px;
            background-color: rgba(0, 0, 0, 0.5); /* Black with 50% opacity */
            z-index: -1; /* Place the overlay behind the content */
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

        /* Add this CSS rule to highlight the active link */
        .menu a.active {
            border-bottom: 2px solid #52da58; /* Add a white underline to the active link */
            color: #52da58;
        }


        .container {
          width: 500px;
          height: 500px;
          margin: 0 auto;
          padding: 20px;
          border: 10px solid lightblue;
          border-radius: 5px;
          background-color: rgba(255, 255, 255, 0.8); 
          box-shadow: 0 2px 10px 0px white;
          float: right;
          margin-top: 120px;
          margin-right: 200px;
        }

        h1 {
          text-align: center;
          color: #007bff;
          margin-bottom: 20px;
        }

        label {
          display: block;
          margin-bottom: 5px;
          font-weight: bold;
        }

        .card-options {
          display: flex;
          align-items: center; /* Vertical alignment */
          margin-bottom: 15px;
        }

        .card-options label {
          margin-right: 15px;
        }

        input[type="radio"] {
          margin: 0; /* Remove default margin */
        }

        input[type="text"] {
          width: 95%;
          padding: 10px;
          margin-bottom: 15px;
          border: 1px solid #ccc;
          border-radius: 5px;
        }
        
        button {
          width: 100%;
          padding: 10px;
          margin-bottom: 15px;
          border: 1px solid #ccc;
          border-radius: 5px;
        }

        button {
          background-color: green;
          color: #fff;
          cursor: pointer;
          font-size: 16px;
          margin-top: 20px;
        }

        button:hover {
          background-color: #043927;
        }

        /* Additional styling for the payment summary */
        .payment-summary {
          float: left;
          width: 430px;
          padding: 20px;
          border: 5px solid green;
          border-radius: 5px;
          background-color: rgba(255, 255, 255, 0.8); 
          margin-right: 20px;
          box-shadow: 0 2px 10px 0px white;
          margin-left: 540px;
          margin-top: 100px;
          height: 620px;
        }

        .payment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .payment-item label {
            font-weight: bold;
        }

        .payment-value {
            flex: 1;
            text-align: right;
        }

        .payment-summary h1 {
          color: green;
          margin-bottom: 30px;
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
        
        /* Additional styling for the combo box */
        #combo-box {
          width: 380px; /* Adjust the width of the combo box */
          padding: 10px;
          margin-bottom: 15px;
          border: 1px solid #ccc;
          border-radius: 5px;
          background-color: #fff;
          appearance: none; /* Remove default arrow for some browsers */
          -webkit-appearance: none; /* Remove default arrow for Safari */
          -moz-appearance: none; /* Remove default arrow for Firefox */
          background-image: url('path_to_your_custom_arrow_icon.png'); /* Replace with your custom arrow icon */
          background-repeat: no-repeat;
          background-position: right center;
          background-size: 20px; /* Adjust the size of the custom arrow icon */
          cursor: pointer;
        }

        /* Style the options within the combo box */
        #combo-box option {
          padding: 10px;
          background-color: #fff;
          color: #333;
        }

        /* Style the selected option */
        #combo-box option:checked {
          background-color: #007bff;
          color: #fff;
        }

        /* Additional styles for the payment summary */
        .payment-summary label {
          font-weight: normal; /* Remove bold style from labels inside payment-summary */
        }

        .payment-summary input[type="text"],
        .payment-summary input[type="number"],
        .payment-summary select {
          width: 360px; /* Adjust the width of the textboxes */
          padding: 10px;
          margin-bottom: 15px;
          border: 1px solid #ccc;
          border-radius: 5px;
        }

        /* Additional styles for the container */
        .container label {
          font-weight: bold; /* Keep the bold style for labels inside the container */
        }

        /* Additional styles for the promotion textbox */
        #promotion {
          width: 360px; /* Adjust the width of the promotion textbox */
          padding: 10px;
          margin-bottom: 15px;
          border: 1px solid #ccc;
          border-radius: 5px;
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

    <?php
        // Retrieve the sent data from the hidden input fields
        $departureStation = $_POST['departure_station'];
        $arrivalStation = $_POST['arrival_station'];
        $date = $_POST['date'];
        $departureTime = $_POST['departure_time'];
        //$seatNo = $_POST['seat_no'];
        // $seatNo = $_POST['selected_count'];
        $seats_selected = $_POST['seats_selected'];
        $selectedCount = $_POST['count'];
        $totalAmount = $_POST['total'];
        $merchant_secret = "MjY2MzQxNjkxNTQxMzE1MTk2OTg4MTE1MDgwNzI2MDM4MTAwMjQ=";
        $hash = strtoupper(
            md5(
                1223699 . 
                10 . 
                number_format($totalAmount, 2, '.', '') . 
                "LKR" .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );        

    ?>

<div class="payment-summary">
      <h1>Payment Summary</h1><br>
      <div class="payment-item">
        <label for="start-point">Start Point:</label>
        <div id="start-point"><?php echo $departureStation; ?></div>
      </div>

      <div class="payment-item">
      <label for="end-point">End Point:</label>
      <div id="end-point"><?php echo $arrivalStation; ?></div>
      </div>

      <div class="payment-item">
      <label for="date">Date:</label>
      <div id="date"><?php echo $date; ?></div>
      </div>

      <div class="payment-item">
      <label for="departureTime">Departure Time:</label>
      <div id="departureTime"><?php echo $departureTime; ?></div>
      </div>

      <div class="payment-item">
      <label for="seat-number">Seat No:</label>
      <div id="seat-number"><?php echo $seats_selected; ?></div>
      </div>

      <div class="payment-item">
      <label for="no-of-number">No of Seats:</label>
      <div id="no-of-number"><?php echo $selectedCount; ?></div>
      </div>

      <br>

      <br>
      
      <label for="points">Redeem points:</label>
      <input type="number" id="points" name="points" min="0" max="3000" step="1" >
      <br>
      <label for="combo-box">Promotion:</label>
            <select id="pro_id" name="pro_id" >
                <option value="" disabled selected>Add promotion</option>
                    <?php
                        include("db/dbconnection.php");

                        $sql ="SELECT * from promotion";
                        $query_run= mysqli_query($conn,$sql);

                        if(mysqli_num_rows($query_run)>0)
                        {
                            foreach ($query_run as $row) {
                            ?>
                            <option value="<?= $row['pro_id'];?>"><?= $row['discount'];?></option>
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
      <br><br>
      <div class="payment-item">
      <label for="payment-info">Payment:</label>
      <div id="payment-info"><?php echo $totalAmount; ?></div>
      </div>
      <br>

        <!-- Use the _cc field to specify comma-separated email addresses for BCC
        <input type="hidden" name="_cc" value="hadesgate88@gmail.com,cc_hadesgate88@gmail.com,narutoxuzumaki88@gmail.com">

        <input type="hidden" name="_captcha" value="false"> -->
        
      <!-- <button type="button" onclick="paynow()">Pay Now</button> -->
      <button type="submit" id="payhere-payment" name="submit">Pay Now</button>
      <!-- <button type="submit" id="payhere-payment" >PayHere Pay</button> -->

    </div>

    
 <script>
    // Called when user completed the payment. It can be a successful payment or failure
    payhere.onCompleted = function onCompleted(orderId) {
        alert("Payment completed!");
        document.location ='bookinghistory.php';
       
    // Reset payment summary data
    document.getElementById("start-point").textContent = "";
    document.getElementById("end-point").textContent = "";
    document.getElementById("date").textContent = "";
    document.getElementById("departureTime").textContent = "";
    document.getElementById("seat-number").textContent = "";
    document.getElementById("no-of-number").textContent = "";
    document.getElementById("payment-info").textContent = "";
    document.getElementById("points").value = "";
    document.getElementById("pro_id").value = ""; // Reset the promotion select box
        
        //Note: validate the payment and show success or failure page to the customer

    };

    // Called when user closes the payment without completing
    payhere.onDismissed = function onDismissed() {
        // Reset payment summary data
        document.getElementById("start-point").textContent = "";
        document.getElementById("end-point").textContent = "";
        document.getElementById("date").textContent = "";
        document.getElementById("departureTime").textContent = "";
        document.getElementById("seat-number").textContent = "";
        document.getElementById("no-of-number").textContent = "";
        document.getElementById("payment-info").textContent = "";
        document.getElementById("points").value = "";
        document.getElementById("pro_id").value = ""; // Reset the promotion select box
        //Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Called when error happens when initializing payment such as invalid parameters
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };
    const merchant_secret="MjY2MzQxNjkxNTQxMzE1MTk2OTg4MTE1MDgwNzI2MDM4MTAwMjQ=";

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": "1223699",    // My Merchant ID
        "return_url": "http://localhost/Project%20Wonder%20Railway%20Management%20System/Member/bookinghistory",     // Important
        "cancel_url": "http://localhost/Project%20Wonder%20Railway%20Management%20System/Member/bookinghistory",     // Important
        "notify_url": "http://localhost/Project%20Wonder%20Railway%20Management%20System/Member/bookinghistory",
        "order_id": 10,
        "items": "Wonder Ticket Booking",
        "amount": "<?php echo $totalAmount; ?>",
        "currency": "LKR",
        "hash": "<?php echo $hash; ?>", // *Replace with generated hash retrieved from backend
        "first_name": "",
        "last_name": "",
        "email": "",
        "phone": "",
        "address": "No.1, Galle Road",
        "city": "Colombo",
        "country": "Sri Lanka",
        "delivery_address": "No. 46, Galle road, Kalutara South",
        "delivery_city": "Kalutara",
        "delivery_country": "Sri Lanka",
        "custom_1": "",
        "custom_2": ""
    };

     // Show the payhere.js popup, when "PayHere Pay" is clicked
     document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
    };

 
</script>

    <!-- <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script> -->


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

    <?php

        $_SESSION['pas_id'] = $pas_id; // Assuming $pas_id is the logged-in passenger's pas_id

        if (isset($_POST['submit'])) {
            $departureStation = $_POST['departure_station'];
            $arrivalStation = $_POST['arrival_station'];
            $date = $_POST['date'];
            $departureTime = $_POST['departure_time'];
            $selectedTrain = $_POST['trn_id'];
            $seatsSelected = $_POST['seats_selected'];
            $selectedCount = $_POST['count'];
            $totalAmount = $_POST['total'];
            $pas_id = $_SESSION['pas_id'];
            //$pointsRedeemed = $_POST['points'];
            //$promotionId = $_POST['pro_id'];
            $paymentStatus = "Live";

            // Build the multi-query
            $insertQuery = "
                INSERT INTO ticket (departure_time, date, departure_station, arrival_station, seat_no, no_seat, payment, pas_id, trn_id) 
                VALUES ('$departureTime', '$date', '$departureStation', '$arrivalStation', '$seatsSelected', '$selectedCount', '$totalAmount', '$pas_id', '$selectedTrain');

                INSERT INTO payment (date, amount, pas_id, pay_status) 
                VALUES ('$date', '$totalAmount', '$pas_id', '$paymentStatus');
            ";

            // Execute the multi-query
            if ($conn->multi_query($insertQuery)) {
                //echo "Data inserted into both tables successfully.";
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();
        }
?>


</body>
</html>