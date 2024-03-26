<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: relative; /* Add position relative for the ::before pseudo-element */
        }
        
        .container {
            margin-top: 60px; /* Add margin to push content below the navigation bar */
            z-index: 0; /* Set the z-index to position the content below the navigation bar */
            height: 350px;
            border-radius: 20px;
            width: 1000px;
            background-color: rgba(255, 255, 255, 0.25); /* White background with opacity 25% */
            box-shadow: 0px 0px 20px 0px white;
            position: relative;
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
        
        .title1 {
            text-align: center;
            font-size: 50px;
            background: transparent; /* Set the background to transparent */
            margin-top: 30px;
            color: white;
            font-family: "Tahoma", sans-serif; /* Use Tahoma font */
        }
        
        .details {
            text-align: center;
            font-size: 20px;
            background: transparent; /* Set the background to transparent */
            margin-top: 30px;
            color: white;
            font-family: "Tahoma", sans-serif; /* Use Tahoma font */
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

            .container {
                width: 90%;
                height:200px;
            }

            .title1 {
                font-size: 25px;
            }

            .details {
                font-size: 10px;
            }
        }

        @media (max-width: 480px) {
            /* Additional responsive styles for screens with a maximum width of 480px (e.g., smartphones) */
            .title1 {
                font-size: 25px;
            }

            .details {
                font-size: 10px;
            }
        }
               /* Add this CSS rule to highlight the active link */
        .menu a.active {
            border-bottom: 2px solid #52da58; /* Add a white underline to the active link */
            color: #52da58;
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

            .container {
                height: 200px;
                width: 420px;
            }

            .container pre{
                font-size: 10px;
                margin-left: -20px;
            }
        }
    </style>
</head>
<body>
    <ul class="navbar">
        <li class="navbar-logo">Wonder</li>
        <li class="navbar-item">
            <div class="menu">
                <a href="index.php">Home</a> 
                <a class="active">About</a> <!-- Add the 'active' class to the Home link -->
                <a href="servicesPg.php">Services</a>
                <a href="contactPg.php">Contact</a>
                <a href="passengerPromotionPg.php">Promotions</a>
            </div>
        </li>
    </ul>

    <div>
        <a href="passengerRegister.php"><button class="reg" style="background-color: black; ">Register</button></a>
        <a href="passengerLogin.php"><button style="background-color: black; ">Login</button></a>
    </div>

    <div class="container">
        <h3 class="title1">About us</h3>
        <pre class="details">
        Trains have their roots in wagonways, which used railway tracks and were powered by 
        horses or pulled by cables. Following the invention of the steam locomotive in the United
        Kingdom in 1804, trains rapidly spread around the world, allowing freight and
        passengers to move over land faster and cheaper than ever possible before. 
        </pre>
    </div>
</body>
</html>
