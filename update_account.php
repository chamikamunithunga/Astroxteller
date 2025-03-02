<?php
// Your backend logic for handling form submissions (if any)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission if necessary
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        #openModal {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        #openModal:hover {
            background-color: #45a049;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            overflow: auto;
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            float: right;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }
    </style>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <button id="openModal">Update Account</button>

    <!-- Modal (Popup Form) -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Update Account Details</h2>
            <form id="updateForm" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" id="confirmChanges">Confirm Changes</button>
            </form>
            <p id="statusMessage"></p>
        </div>
    </div>

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js"></script>

    <script>
        // Firebase Configuration
        const firebaseConfig = {
            apiKey: "AIzaSyAX0sBvnMDsKtA3AbqeQBnq9485lcwp4qM",
            authDomain: "astroxteller.firebaseapp.com",
            projectId: "astroxteller",
            storageBucket: "astroxteller.firebasestorage.app",
            messagingSenderId: "221236726489",
            appId: "1:221236726489:web:80bbb8ad6f2239ef958cc8",
            measurementId: "G-3P53YSBYX0"
        };

        // Initialize Firebase
        const app = firebase.initializeApp(firebaseConfig);
        const auth = firebase.auth();

        // Open Modal when clicking the "Update Account" button
        const modal = document.getElementById('modal');
        const openModalBtn = document.getElementById('openModal');
        const closeModalBtn = document.getElementById('closeModal');

        openModalBtn.onclick = () => {
            modal.style.display = 'block';

            const user = auth.currentUser;

            if (user) {
                // Pre-populate form fields with current user data
                document.getElementById('username').value = user.displayName || '';
                document.getElementById('email').value = user.email || '';
            } else {
                alert('No user is logged in.');
            }
        };

        closeModalBtn.onclick = () => modal.style.display = 'none';

        // Handle form submission to update account details
        document.getElementById('updateForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const user = auth.currentUser;

            if (user) {
                // Update user data here
                user.updateProfile({
                    displayName: username
                }).then(() => {
                    user.updateEmail(email).then(() => {
                        user.updatePassword(password).then(() => {
                            // Send Email Verification after form submission
                            user.sendEmailVerification().then(() => {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Email Verification Sent!',
                                    text: 'Please check your email and verify your account.',
                                    confirmButtonText: 'Okay'
                                });
                            }).catch((error) => {
                                console.error('Error sending email verification:', error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'There was an error sending the email verification. Please try again.',
                                    confirmButtonText: 'Okay'
                                });
                            });
                        }).catch((error) => console.error('Error updating password:', error));
                    }).catch((error) => console.error('Error updating email:', error));
                }).catch((error) => console.error('Error updating profile:', error));
            }
        });
    </script>
</body>
</html>
