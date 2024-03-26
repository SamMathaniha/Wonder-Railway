<?php
@include 'config.php';

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

        if (isset($_POST['insert-contact'])) 
        {
            $subject = $_POST['subject'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $sql = "insert into customer_support (type, email, description) values 
            ('$subject', '$email', '$message')";

            if($conn ->query ($sql)==TRUE){
            echo "<script> alert ('New Record inserted successfully')</script>";
            echo "<script> window.location = 'contactPg.php';</script>";
            
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
        
        .content {
            margin-top: 60px; /* Add margin to push content below the navigation bar */
            z-index: 0; /* Set the z-index to position the content below the navigation bar */
        }
        
        .overlay-text {
            color: #fff;
            font-size: 36px;
            text-align: center;
            position: relative; /* Add position relative for the ::before pseudo-element */
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
        }

                
        /* Add this CSS rule to highlight the active link */
        .menu a.active {
            border-bottom: 2px solid #52da58; /* Add a white underline to the active link */
            color: #52da58;
        }

        /*contact form*/
        .contact-container {
            max-width: 500px;
            margin: 20px auto;
            padding: 50px;
            background-color:rgba(255, 255, 255, 0.5);
            border-radius: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-right: 100px;
            margin-top: 200px;
        }
        
        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .contact-form textarea {
            resize: vertical;
        }
        
        .contact-form button {
            background-color: #333;
            color: #fff;
            width: 70%;
            padding: 10px 0px;
            margin-top: 10px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-left: 80px;
            height: 40px;
            font-size: 20px;
            font-family: serif;
        }
        
        .contact-form button:hover {
            background-color: gold;
        }

        /*contact infor box*/
        .container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: flex-end; /* Align the container to the right */
        justify-content: center; /* Center the container vertically */
        width: 500px; /* Set the container width */
        height: 200px; /* Set the container height */
        background-color:rgba(255, 255, 255, 0.5);
        padding: 50px;
        top: -300px;
        margin-right: 780px;
        }

        .inner-rectangle {
        width: 100%;
        padding: 10px;
        margin-bottom: 5px;
        border: 1px solid black;
        }

        .contact-number {
        background-color: #CBC3C3;
        }

        .email {
        background-color: #CBC3C3;
        }

        .mess{
            height: 100px;
        }
                
        .contact-form select {
            width: 520px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color:  grey;
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
                margin: 15px; /* margin to separate buttons */
                width: auto; /* buttons width */
            }

            /*contact form*/
            .contact-container {
                max-width: 300px;
                margin: 20px auto;
                padding: 50px;
                background-color:rgba(255, 255, 255, 0.5);
                border-radius: none;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin-right: 50px;
                margin-top: 600px;
                
            }

            .contact-form select {
                width: 108%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            
            .contact-form input,
            .contact-form textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            
            .contact-form textarea {
                resize: vertical;
            }
            
            .contact-form button {
                background-color: #333;
                color: #fff;
                width: 70%;
                padding: 10px 0px;
                margin-top: 10px;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                margin-left: 50px;
                height: 40px;
                font-size: 20px;
                font-family: serif;
            }
            
            .contact-form button:hover {
                background-color: gold;
            }

            /*contact infor box*/
            .container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: flex-end; /* Align the container to the right */
            justify-content: center; /* Center the container vertically */
            width: 300px; /* Set the container width */
            height: 200px; /* Set the container height */
            background-color:rgba(255, 255, 255, 0.5);
            padding: 50px;
            top: -650px;
            margin-right: 10px;
            }

            .inner-rectangle {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid black;
            }

            .contact-number {
            background-color: #CBC3C3;
            }

            .email {
            background-color: #CBC3C3;
            }

            .mess{
                height: 100px;
            }
        }
    </style>
</head>
<body>
<header>
    <ul class="navbar">
        <li class="navbar-logo">Wonder</li>
        <li class="navbar-item">
            <div class="menu">
                <a href="index.php">Home</a> 
                <a href="aboutPg.php">About</a>
                <a href="services.html">Services</a>
                <a class="active">Contact</a>   <!-- Add the 'active' class to the Home link -->
                <a href="passengerPromotionPg.php">Promotions</a>
            </div>
        </li>
    </ul>
</header>

    <div>
        <a href="passengerRegister.php"><button class="reg">Register</button></a>
        <a href="passengerLogin.php"><button>Login</button></a>
    </div>

    <div class="contact-container">
        <form class="contact-form" action="#" method="post">  
            <select id="subject" name="subject" required>
                <option value="" disabled selected>Select an option</option>
                <option value="comment">Comment</option>
                <option value="feedback">Feedback</option>
                <option value="inquire">Inquire</option>
                <option value="complain">Complain</option>
                <option value="request">Request</option>
            </select>

            <input type="text" id="email" name="email" placeholder="Your email" required>

            <input type="text" id="message" name="message" placeholder="Message" class="mess" required>

            <button type="submit" name="insert-contact">Contact us</button>
        </form>
    </div>

    <div class="container">
    <div class="inner-rectangle contact-number">
        Contact us: 077-5482658
    </div>
    <div class="inner-rectangle email">
        Email: chaduru1@gamil.com
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
    
</body>
</html>
