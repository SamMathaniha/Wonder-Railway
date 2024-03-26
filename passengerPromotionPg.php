<?php
include("db/dbconnection.php")
?>

<!DOCTYPE html>
<html>
<head>
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

                
        /* Add this CSS rule to highlight the active link */
        .menu a.active {
            border-bottom: 2px solid #52da58; /* Add a white underline to the active link */
            color: #52da58;
        }

        .promotion-banner {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50vh;
        background-color: #f0f0f0;
        margin-top: 70px;
        width: 100%;
        }

        .banner-content {
        flex: 1;
        padding: 20px;
        text-align: center;
        }

        .banner-content h1 {
        font-size: 36px;
        margin-bottom: 10px;
        }

        .banner-content h2 {
        font-size: 24px;
        color: #45a049;
        margin-bottom: 20px;
        }

        .banner-content p {
        font-size: 18px;
        margin-bottom: 30px;
        }

        .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #45a049;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        }

        .btn:hover {
        background-color: #0056b3;
        }

        .banner-image {
        flex: 1;
        text-align: center;
        }

        .banner-image img {
        max-width: 600px;
        width: 100%;
        height: 300px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
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
                width: auto; /* buttons width */
            }

        }
    </style>
</head>
<body>
    <ul class="navbar">
        <li class="navbar-logo">Wonder</li>
        <li class="navbar-item">
            <div class="menu">
                <a href="index.php">Home</a> <!-- Add the 'active' class to the Home link -->
                <a href="aboutPg.php">About</a>
                <a href="servicesPg.php">Services</a>
                <a href="contactPg.php">Contact</a>
                <a class="active">Promotions</a>
            </div>
        </li>
        <li class="navbar-right">
            <a href="passengerRegister.php"><button class="reg">Register</button></a>
            <a href="passengerLogin.php"><button>Login</button></a>
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



    <?php
        if (isset($_POST["Roomno"])){
        $rno= $_POST["Roomno"];
        $sql1 = "select * from room where Roomno='$rno'";
        $r1 = $conn->query($sql1);
                    
        while($row1 = $r1 -> fetch_assoc()){
                
            $rno = $row1["Roomno"];
            $Roomname = $row1["Roomname"];
            $Roomcategory = $row1["Roomcategory"];
            $Location = $row1["Location"];
            $Availability = $row1["Availability"];
            $Other = $row1["Other"];
            $Patientid = $row1["Patientid"]; 
        }
    }
    ?>

    <!-- Promtoion Disisplay -->
    <div class="promotion-banner">
        <div class="banner-content">
        <h1>Special Promotion!</h1><br>
        <?php
            $sql1 = "select discount from promotion";
            $r1 = $conn->query($sql1);

            $discount = 10; // Example discount value
            
            echo '<div>' . $discount . '% Discount</div><br>';
        ?>
        <p>Book your train tickets now and enjoy the discount on all routes. Limited time offer.</p><br>
        <a href="passengerLogin.php" class="btn">Book Now</a>
        </div>
        <div class="banner-image">
        <img src="img/train.jpeg" alt="Special Promotion">
        </div>
    </div>
</body>
</html>
