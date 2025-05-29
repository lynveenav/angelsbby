<?php
// Database connection
$servername = "localhost";
$username = "root";  // Use your database username
$password = "";      // Use your database password
$dbname = "tourism_db";

// If user is already logged in, redirect them to the correct dashboard
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location: index.php');
    }
}

// Login logic
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Start session and set user session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect to dashboard or admin page based on role
            if ($user['role'] == 'admin') {
                header('Location: index.php');
            } 
        } else {
            // Set error message for invalid password
            $error_message = "Invalid password! Please try again.";
        }
    } else {
        // Set error message if user is not found
        $error_message = "No user found with that email address.";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Siargao Island</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body  onload="speakMessage()">
<div class="background"></div> <!-- Background overlay -->
    <body class="bg-cover bg-center h-screen flex justify-center items-center" style="background-image: url('Cloud-9-Siargao-.jpg');"> </body>
    <div class="login-container bg-white bg-opacity-20 rounded-lg shadow-lg p-8 w-full max-w-md text-center text-white border border-white border-opacity-20 backdrop-blur-md">  
        <h2 class="text-2xl mb-6">Login</h2>
        <form id="login-form" action="" method="POST" action="index.php">
            <div class="input-group mb-4 relative">
                <label for="email" class="block text-left mb-2">Email:</label>
                <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-green-800"></i>
                <input type="email" id="email" name="email" placeholder="Enter your email" required class="w-full p-3 pl-10 rounded-lg bg-white bg-opacity-80 text-gray-800">
            </div>
            <div class="input-group mb-4 relative">
                <label for="password" class="block text-left mb-2">Password:</label>
                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-green-800"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required class="w-full p-3 pl-10 rounded-lg bg-white bg-opacity-80 text-gray-800">
            </div>
            <button type="submit" class="w-1/2 p-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all duration-300">Login</button>
        </form>
        <div class="signup-link mt-6">
            <p>Don't have an account? <a href="signup.php" class="text-blue-400 hover:underline">Sign up here</a></p>
        </div>
    </div>
    <script>
        
        document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault();
        window.location.href = 'index.php'; // Automatically redirect to dashboard.php
        });

    </script>
</body>
</html>
