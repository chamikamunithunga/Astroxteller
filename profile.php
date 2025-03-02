<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AstroXtellar</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap');
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("imgs/prof.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 40%;
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(-20deg, #ff0000, #26ff00, #6400e6, #006de1);
            background-size: 300% 300%;
            animation: gradientAnimation 10s ease infinite;
            padding: 2px 20px;
            position: sticky;
            top: 0;
            z-index: 2;
            border-bottom: 3px solid #00000000; 
            
        }

        @keyframes gradientAnimation {
            0% { background-position: 20% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar img {
            width: 30px;
            height: 20px;
            margin-right: 10px;
        }

        .navbar h1 {
            color: #ffffff;
            font-size: 40px;
            font-family: 'Irish Grover', cursive;
        }

        .nav-links {
           display: flex;
           list-style: none;
           gap: 20px;
        }

        .nav-links li {
            padding: 10px;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .nav-links a:hover {
            color: #00ccff;
        }

        /* Profile Container */
        .profile-container {
            background-image: url("imgs/12.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            padding: 20px;
            width: auto;      
            margin-bottom: 25%;
        }

        .profile-pic-container {
            flex: 1;
            text-align: center;
            margin-right: 20px;
        }

        .profile-pic-container img {
            width: 220px;
            height: 220px;
            border-radius: 50%;
            cursor: pointer;
        }

        .profile-pic-container button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .profile-pic-container button:hover {
            background-color: #0056b3;
        }

        .profile-details {
            flex: 2;
            color: #00eeff;
        }

        .profile-details h1 {
            font-size: 2rem;
            margin: 0;
        }

        .profile-details p {
            font-size: 1.1em;
            color: #00eeff;
        }

        .profile-details .action-btn {
    width: 20%;
    padding: 12px;
    margin: 12px 0;
    border: 1px solid #007bff;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    background: linear-gradient(45deg, #007bff, #00ff3c);  /* Two-tone blue gradient */
    color: #000000;
    transition: background 0.3s ease;
}

.profile-details .action-btn:hover {
    background: linear-gradient(45deg, #1e88e5, #b700ff);  /* Reverse the gradient on hover */
}


        .delete-account {
            text-align: center;
            margin-top: 20px;
        }

        .delete-account button {
    width: 20%;
    padding: 12px;
    margin: 12px 0;
    border: 1px solid #b71c1c;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    background: linear-gradient(45deg, #d32f2f, #ffbb00);
    color: #000000;
    margin-right: 80%;
    transition: background 0.3s ease;
}

.delete-account button:hover {
    background: linear-gradient(45deg, #ff0000, #6a00ff);
}

.logout-button {
    width: 20%;
    padding: 12px;
    margin: 12px 0;
    border: 1px solid #b71c1c;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    background: linear-gradient(45deg, #d32f2f, #ffbb00);
    color: #000000;
    margin-right: 80%;
    transition: background 0.3s ease, transform 0.2s;
}

.logout-button:hover {
    background: linear-gradient(45deg, #ff0000, #6a00ff);
    transform: scale(1.05);
}

.leader-board {
    text-align: center;
    margin-top: 20px;
}

.leader-board button {
    width: 20%;
    padding: 12px;
    margin: 12px 0;
    border: 1px solid #b71c1c;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    background: linear-gradient(45deg, #d32f2f, #ffbb00);
    color: #000000;
    margin-right: 80%;
    transition: background 0.3s ease, transform 0.2s;
}

.leader-board button:hover {
    background: linear-gradient(45deg, #ff0000, #6a00ff);
    transform: scale(1.05);
}










        /* Background Image After Profile */
        .background-section {
            
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #00ffea;
            text-align: center;
            margin-top: 40%;
        }


/* Styles for the badges section */
/* Container for badges with glassy and blur effect */
.badges-box {
    background: #00000088;
    backdrop-filter: blur(10px);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 20px #00000012;
    margin-top: 20px;
    width: 80%;
    max-width: 80%;
    max-width: 1200px;
    text-align: center;
    margin-bottom: 40%;
}
.badges-box h2 {
    background: linear-gradient(45deg, #007bff, #00ff3c);
    font-size: 2rem;
    margin-bottom: 20px;
    border-radius: 12px;
    color: #000000;
}


/* Grid Layout for Badges */
.badges-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    justify-items: center;
    margin-top: 20px;
}

.badge {
    background: #8c00ff33;
    padding: 20px;
    text-align: center;
    border-radius: 8px;
    transition: transform 0.3s ease;
    border: 2px solid #fff;
}

.badge img {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.badge p {
    color: #ffffff;
    font-weight: bold;
    margin-bottom: 20%;
}

.badge:hover {
    transform: translateY(-10px);
    background: rgba(0, 0, 0, 0.9);
}

@media (max-width: 768px) {
    .badges-container {
        grid-template-columns: repeat(3, 1fr); /* 3 columns on smaller screens */
    }
}

@media (max-width: 480px) {
    .badges-container {
        grid-template-columns: repeat(2, 1fr); /* 2 columns on very small screens */
    }
}

 /* Footer Section */
 .footer {
    text-align: center;
    padding: 60px;
    background-image: url('imgs/footer.jpg');
    background-size: cover;
    background-position: center;
    color: #ffffff;
    position: relative;
    
}

.footer p {
    margin: 10px 0;
}

.footer a {
    margin: 0 5px;
    font-size: 30px; /* Icon size */
    transition: transform 0.3s ease;
}

.footer a:hover {
    transform: scale(1.1);
}

/* Colored Icons */
.footer a:nth-child(1) i {
    color: #ff0066;
}

.footer a:nth-child(2) i {
    color: #0011ff; 
}

.footer a:nth-child(3) i {
    color: #003c75; 
}

/* Change icon color on hover */
.footer a:hover i {
    color: #ffffff; 
}



    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <h1>AstroXtellar</h1>
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="explore.php">Explore</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </div>

    <!-- Profile Section -->
    <div class="profile-container">
        <!-- Profile Picture Section -->
        <div class="profile-pic-container">
            <!-- Default profile picture set here -->
            <img id="profile-pic" src="imgs/defaultdp.jpg" alt="Profile Picture" onclick="changeProfilePic()">
            <button onclick="changeProfilePic()">Edit Profile Picture</button>
        </div>

        <!-- Profile Details Section -->
        <div class="profile-details">
            <h1 id="user-name">chamiika Munithunga</h1> 
            <p id="user-email">munithungac@gmail.com</p> 

            <div>
                <button class="action-btn" onclick="updateAccount()">Update Account</button>
            </div>

            <div class="delete-account">
                <button onclick="deleteAccount()">Logout</button>
            </div>

            <div class="leader-board">
                <button onclick="dleaderboard()">leader board</button>
            </div>


            
        </div>
    </div>

    <!-- Background Section after Profile -->
    <div class="background-section">
        
        <div class="badges-box">
            <h2>My Badges</h2>
            <div class="badges-container">
                
                <div class="badge">
                    <img src="imgs/1.png" alt="Badge 1">
                    <p>ThunderStrox</p>
                </div>
                <div class="badge">
                    <img src="imgs/2.png" alt="Badge 2">
                    <p>ISS Pro</p>
                </div>
                <div class="badge">
                    <img src="imgs/3.png" alt="Badge 3">
                    <p>CrewStroxer</p>
                </div>
                <div class="badge">
                    <img src="imgs/4.png" alt="Badge 4">
                    <p>FalconTeller</p>
                </div>
                <div class="badge">
                    <img src="imgs/5.png" alt="Badge 5">
                    <p>SpaceSteller</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Thank you for exploring with AstroXtellar. Stay tuned for more cosmic adventures!</p>
        <div>
            <p>Follow us on:</p>
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; 2025 AstroXtellar. All rights reserved.</p>
    </div>
    
    

    <script>
        // Function to change the profile picture
        function changeProfilePic() {
            const fileInput = document.createElement("input");
            fileInput.type = "file";
            fileInput.accept = "image/*";
            fileInput.onchange = function() {
                const file = fileInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("profile-pic").src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            }
            fileInput.click();
        }

        function updateAccount() {
            const username = document.getElementById("user-name").textContent;
            const email = document.getElementById("user-email").textContent;

            // Redirect to update_account.php with the updated username and email
            const updateUrl = `update_account.php?username=${encodeURIComponent(username)}&email=${encodeURIComponent(email)}`;
            window.location.href = updateUrl;
        }

        // Function to delete account
        function deleteAccount() {
            const confirmDelete = confirm("Are you sure you want to delete your account?");
            if (confirmDelete) {
                // Simulate account deletion (remove from backend)
                alert("Account Logout!");
                window.location.href = "index.php"; // Redirect to home or login page
            }
        }


        function dleaderboard() {
    const confirmAction = confirm("Are you sure you want to view the leaderboard?");
    if (confirmAction) {
        // Redirect to leaderboard page (modify the URL as needed)
        window.location.href = "leaderboard.php"; 
    }
}




        
        
    </script>
</body>
</html>
