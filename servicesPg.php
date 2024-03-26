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
       

        .service-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        }

        .services {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 50px;
        }

        .service-card {
        flex: 0 0 calc(33.33% - 20px);
        width: 700px;
        height: 500px;
        padding: 10px;
        box-sizing: border-box;
        text-align: center;
        background-color: rgba(255, 255, 255, 0.5);
        margin-bottom: 20px;
        }

        .service-card img {
        width: 300px;
        height: 290px;
        }

        .service-card p {
        margin-top: 30px;
        font-size: 15px;
        }
        .title{
            text-align: center;
            margin-top: 40px;
            color: white;
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
                font-size: 8px;
                margin: 2px; /* margin to separate buttons */
                width: auto; /* buttons width */
            }

            
            .service-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 1000px;
            }

            .services {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 50px;
            flex-direction: column; /* Stack buttons vertically */

            }

            .service-card {
            flex: 0 0 calc(33.33% - 20px);
            width: 400px;
            height: 500px;
            padding: 10px;
            box-sizing: border-box;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.5);
            margin-bottom: 20px;
            }

            .title{
            text-align: center;
            margin-top: 40px;
            color: white;
            white-space: nowrap; /* Prevent line breaks */

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
                <a href="aboutPg.php">About</a>
                <a class="active">Services</a>  <!-- Add the 'active' class to the Home link -->
                <a href="contactPg.php">Contact</a>
                <a href="passengerPromotionPg.php">Promotions</a>
            </div>
        </li>
        <li class="navbar-right">
            <a href="passengerRegister.php"><button class="reg">Register</button></a>
            <a href="passengerLogin.php"><button>Login</button></a>
        </li>
    </ul>

    <div class="service-container">
    <h1 class="title">Our Services</h1>
    <div class="services">
      <div class="service-card">
        <img src="img/booking.jpg" alt="Service 1">
        <h3>Online Ticket Booking</h3>
        <p>This is one of the core services, allowing users to browse train schedules, check seat availability, and book tickets for their desired journeys.</p>
      </div>
      <div class="service-card">
        <img src="img/lotalty.jpg" alt="Service 2">
        <h3>Railway Loyalty Programs</h3>
        <p>Rewards and loyalty programs for frequent travelers, offering benefits such as discounts or priority booking.</p>
      </div>
      <div class="service-card">
        <img src="img/contact.png" alt="Service 3">
        <h3>Customer Support Hotline</h3>
        <p>A dedicated phone number that passengers can call for inquiries, ticket booking assistance, refunds, and other related queries.</p>
      </div>
      <!-- Add more service cards here -->
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
