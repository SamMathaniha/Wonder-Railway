<?php
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

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT user_type FROM user WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $user_type = $row["user_type"];
            if ($user_type === "admin") {
                $_SESSION['admin_name'] = $row['email'];
                $_SESSION['email'] = $row['email'];
                header("Location: adminDashboard.php");
                exit;
            } elseif ($user_type === "manager") {
                header("Location: managerDashboard.php");
                exit;
            }
        } else {
            echo "Invalid email or password.";
        }

        $conn->close();
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

        .login-box {
        width: 400px;
        padding: 40px;
        background-color: rgba(0, 0, 0, 0.5);
        border: 1px solid #ffffff;
        border-radius: 5px;
        padding-bottom: 1px;
        margin-top: 50px;
        }
        
        .labelStyle{
            font-size: 15px;
            margin-left: 5px;
            color: rgb(255, 255, 255);
            text-shadow: 5px 3px 4px rgba(0, 0, 0, 0.5);
        }

        .headingLogin {
            font-size: 40px;
            margin-top: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-family: Impact, Arial Black, sans-serif;
            color: #ffffff; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        

        .login-box input[type="text"],
        .login-box input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 3px;
        }

        .login-box input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            width: 80%;
            padding: 8px;
            display: block;
            margin: 0 auto;
            border: 1px solid #4CAF50;
            border-radius: 10px;
        }
        

        .login-box input[type="submit"]:hover {
        background-color: #45a049;
        }

        .password-container {
        position: relative;
        }

        .password-container input[type="password"] {
        padding-right: 30px;
        }

        .password-container .toggle-password {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        }
        
        .forget-password {
            text-align: left;
            margin-top:-1px;
        }
    
        .forget-password a {
            color: rgb(112, 255, 23);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            text-decoration: none;
        }
    
        .forget-password a:hover {
            text-decoration: underline;
        }

        .pstyle{
            color: #ffffff;
            text-align: center;
    
        }

        .pstyle a{
            color: rgb(65, 204, 255);
        }

        .labelStyleHint{
            color: #ffffff;
        }

        .alreadyLogin{
            color: rgb(255, 255, 255);
            text-align: center;
        }

        .alreadyLogin a{
            color: aqua;
        }

        .backToLogin {
            text-align: center;
        }

        .backToLogin a{
            color: aqua;
        }
                
        /* Add this CSS rule to highlight the active link */
        .menu a.active {
            border-bottom: 2px solid gold; /* Add a white underline to the active link */
            color: gold;
        }

        /* Style for the navigation bar */
        .navigationPassStaff {
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
        }

        /* Style for the navigation options */
        .nav-option {
            text-decoration: none;
            text-align:center;
            color: white;
            padding: 10px 20px;
            margin: 0 10px;
            width:80px;
            border-radius: 5px;
            border: 1px solid white; /* Add white border */
            transition: background-color 0.3s;
        }

        /* Hover effect for navigation options */
        .nav-option:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Checked style for navigation options */
        
        .nav-option:checked {
            background-color: white;
            color: #333;
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
        }
    </style>
</head>
<body>
    <ul class="navbar">
        <li class="navbar-logo">Wonder</li>
        <li class="navbar-item">
            <div class="menu">
                <a  href="index.php" class="active">Home</a> <!-- Add the 'active' class to the Home link -->
                <a href="aboutPg.php">About</a>
                <a href="servicesPg.php">Services</a>
                <a href="contactPg.php">Contact</a>
            </div>
        </li>
        <li class="navbar-right">
            <a href="passengerRegister.php"><button class="reg">Register</button></a>
        </li>
    </ul>

    <!-- Login form start -->
    <div class="login-box">
        <form action="#" method="POST">

        <?php
        
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg" style="color: white;">'.$error.'</span>';
            }
        };
        ?>

        <div class="headingLogin">STAFF LOGIN</div> <!-- Login heading --> <br>

        <div class="navigationPassStaff">
            <a href="passengerLogin.php" class="nav-option"  >Passenger</a>
            <a class="nav-option">Staff</a> 
        </div> <br>
    
        <!-- Inputs Email & password -->
        <label class="labelStyle"> Email :</label>
        <input type="text" name="email" placeholder="Enter your Email" required>
        <div class="password-container">
            <label  class="labelStyle"> Password :</label>
            <input type="password" id="password-input" name="password" placeholder="Enter your Password" required>
            <span class="toggle-password" id="toggle-icon" onclick="togglePassword()">&#x1F441;</span>
        </div> <br>
      
        <input type="submit" name="submit" value="Login"> <!-- Login button --> <br>

        <p class="pstyle" > For any Problem Contact Administrator</p> <br>
        </form>
    </div>

    <script>
    // function for show the password
    function togglePassword() {
      const passwordInput = document.getElementById("password-input");
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
