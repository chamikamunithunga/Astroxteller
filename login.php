<?php
session_start();
require 'connect.php'; 
require 'auth.php';   

// Ensure $auth and $conn are initialized
if (!isset($auth) || !isset($conn)) {
    die("Firebase authentication or MySQL connection not initialized.");
}

// Handle Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Sign in the user with Firebase
        $user = $auth->signInWithEmailAndPassword($email, $password);

        // If successful, save email to session and redirect
        $_SESSION['email'] = $email;
        echo "<script>
                alert('Login Successful!');
                window.location.href = 'home.php';
              </script>";
        exit();
    } catch (Exception $e) {
        echo "<script>alert('Invalid email or password. Please try again.');</script>";
    }
}

// Handle Signup
if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Create user in Firebase Authentication
        $user = $auth->createUser([
            'email' => $email,
            'password' => $password,
        ]);

        // Save user data to MySQL (use prepared statements to prevent SQL injection)
        $uid = $user->uid; // Firebase UID
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash password for MySQL

        // Prepared statement to prevent SQL injection
        $signupQuery = $conn->prepare("INSERT INTO users (uid, email, password) VALUES (?, ?, ?)");
        $signupQuery->bind_param("sss", $uid, $email, $hashed_password); // "sss" means three strings

        if ($signupQuery->execute()) {
            echo "<script>
                    alert('Account created successfully!');
                    window.location.href = 'index.php'; // Redirect to login page
                  </script>";
        } else {
            echo "<script>alert('Error creating account. Please try again.');</script>";
        }

        $signupQuery->close();
    } catch (Exception $e) {
        echo "<script>alert('Email already exists or invalid input.');</script>";
    }
}
?>


<!-- Add HTML Form for login/signup with error/success messages -->

<?php if (isset($loginError)): ?>
    <div class="error"><?php echo $loginError; ?></div>
<?php endif; ?>

<?php if (isset($signupSuccess)): ?>
    <div class="success"><?php echo $signupSuccess; ?></div>
<?php endif; ?>

<?php if (isset($signupError)): ?>
    <div class="error"><?php echo $signupError; ?></div>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Signup</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap');
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Irish Grover', cursive;
            background-image: url("imgs/ls.png");
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            color:black;
        }

        .logo {
            text-align: center;
            position: absolute;
            top: 15%;
            left: 55%;
            transform: translateX(-50%);
            width: 100%;
        }
        .logo h2 {
            font-size: 1.4rem;
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            margin-bottom: 20px;
        }

        .caption {
            font-size: 4rem;
            font-weight: bold;
            color: #FFC926;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            animation: fadeIn 1s ease-in-out;
            font-family: 'Irish Grover', cursive;
        }

        /* Fade-in Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Container for the form */
        .auth-container {
            width: 100%;
            max-width: 400px;
            background: #d223fe66;
            background-image: url('imgs/lgf.jpg');
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(10px);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            animation: slide-up 1s ease-out;
            margin-right: 900px;
            margin-top: 110px;
            border: 1px solid #ffffff33;
        }

        .auth-container h2, .auth-container p {
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }

        /* Slide-up animation */
        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header Styling */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        /* Form inputs */
        input {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        /* Button Styling */
        button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #7F00FF, #FFC926);
            color: white;
            font-size: 1.2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: linear-gradient(135deg, #ff8400, #FFC926);
            color: #000000;
        }

        /* Links and Switch */
        .switch {
            text-align: center;
            margin-top: 20px;
        }

        .switch a {
            color:rgb(255, 187, 0);
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .switch a:hover {
            color: #FFC926;
        }

        /* Hover and Focus Animations */
        input:focus {
            border-color: #7F00FF;
            box-shadow: 0 0 10px rgba(127, 0, 255, 0.5);
        }

        button:active {
            transform: scale(0.98);
        }

        /* Mobile background and centering */
        @media (max-width: 768px) {
            body {
                background-image: url("imgs/mob copy.jpg");
            }

            .logo {
                top: 10%;
                left: 50%;
                transform: translateX(-50%);
            }

            .auth-container {
                margin-top: 50px;
                margin-right: 0;
                max-width: 90%;
                padding: 15px;
                margin-left: 10px;
            }

            .caption {
                font-size: 2rem;
            }
        }

    </style>
</head>
<body>
    <div class="logo">
        <h1 class="caption">Welcome to AstroXtellar</h1>
        <h2>Test your knowledge of the universe and uncover the mysteries of the stars.</h2>
    </div>

    <div class="auth-container">
        <div class="auth-form">
            <h2>Login</h2>

            <!-- Login Form -->
            <form action="login.php" method="POST">
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                
                <!-- Display error/success messages -->
                <?php if (isset($loginError)) { echo "<p style='color: red;'>$loginError</p>"; } ?>
                <?php if (isset($signupSuccess)) { echo "<p style='color: green;'>$signupSuccess</p>"; } ?>
                <?php if (isset($signupError)) { echo "<p style='color: red;'>$signupError</p>"; } ?>

                <button type="submit" name="login">Login</button>
            </form>

            <p class="switch">Don't have an account? <a href="#" id="show-signup">Sign Up</a></p>

            <!-- Signup Form -->
            <form action="login.php" method="POST" id="signup-form" style="display: none;">
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                
                <!-- Display error/success messages -->
                <?php if (isset($signupError)) { echo "<p style='color: red;'>$signupError</p>"; } ?>
                <?php if (isset($signupSuccess)) { echo "<p style='color: green;'>$signupSuccess</p>"; } ?>

                <button type="submit" name="signup">Sign Up</button>
            </form>
            
            
        </div>
    </div>

    <script>
        // Toggle between login and signup forms
        const showSignupLink = document.querySelector('#show-signup');
        const showLoginLink = document.querySelector('#show-login');
        const loginForm = document.querySelector('form[action="login.php"]');
        const signupForm = document.querySelector('#signup-form');

        showSignupLink.addEventListener('click', (e) => {
            e.preventDefault();
            loginForm.style.display = 'none';
            signupForm.style.display = 'block';
        });

        showLoginLink.addEventListener('click', (e) => {
            e.preventDefault();
            signupForm.style.display = 'none';
            loginForm.style.display = 'block';
        });
    </script>
</body>
</html>
