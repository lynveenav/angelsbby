<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $role = trim($_POST['role']);

    if (empty($fullname) || empty($user) || empty($email) || empty($pass) || empty($role)) {
        $error_message = "All fields are required.";
    } else {
        // Check if the username already exists
        $checkStmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $checkStmt->bind_param("s", $user);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            $error_message = "Username already exists. Please choose another.";
        } else {
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, password, role) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $fullname, $user, $email, $hashed_password, $role);

            if ($stmt->execute()) {
                header("Location: login.php");
                exit();
            } else {
                $error_message = "Error: " . $stmt->error;
            }

            $stmt->close();
        }
        $checkStmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-cover bg-center h-screen flex justify-center items-center" style="background-image: url('Cloud-9-Siargao-.jpg');">
    <div class="bg-white bg-opacity-20 backdrop-blur-md rounded-lg shadow-lg p-8 w-full max-w-md text-center text-white border border-white border-opacity-20 flex flex-col items-center">
        <h2 class="text-2xl mb-6">Sign Up</h2>
        
        <?php if (!empty($error_message)): ?>
            <div class="mb-4 text-red-500 text-sm"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST" class="w-full">
            <div class="mb-4 relative">
                <label for="fullname" class="block text-sm mb-2">Full Name:</label>
                <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-green-800"></i>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required class="w-full pl-10 py-2 rounded-md border border-gray-300 bg-white bg-opacity-80 text-gray-800">
            </div>
            <div class="mb-4 relative">
                <label for="username" class="block text-sm mb-2">Username:</label>
                <i class="fas fa-user-tag absolute left-3 top-1/2 transform -translate-y-1/2 text-green-800"></i>
                <input type="text" id="username" name="username" placeholder="Choose a username" required class="w-full pl-10 py-2 rounded-md border border-gray-300 bg-white bg-opacity-80 text-gray-800">
            </div>
            <div class="mb-4 relative">
                <label for="email" class="block text-sm mb-2">Email:</label>
                <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-green-800"></i>
                <input type="email" id="email" name="email" placeholder="Enter your email" required class="w-full pl-10 py-2 rounded-md border border-gray-300 bg-white bg-opacity-80 text-gray-800">
            </div>
            <div class="mb-4 relative">
                <label for="password" class="block text-sm mb-2">Password:</label>
                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-green-800"></i>
                <input type="password" id="password" name="password" placeholder="Create a password" required class="w-full pl-10 py-2 rounded-md border border-gray-300 bg-white bg-opacity-80 text-gray-800">
            </div>
            <div class="mb-6 relative">
                <label for="role" class="block text-sm mb-2">Role:</label>
                <i class="fas fa-users absolute left-3 top-1/2 transform -translate-y-1/2 text-green-800"></i>
                <select id="role" name="role" required class="w-full pl-10 py-2 rounded-md border border-gray-300 bg-white bg-opacity-80 text-gray-800">
                    <option value="librarian">Librarian</option>
                </select>
            </div>
            <button type="submit" class="w-full py-2 bg-green-600 hover:bg-green-700 rounded-md text-white text-lg">Sign Up</button>
        </form>
        
        <div class="mt-4 text-sm">
            <p>Already have an account? <a href="login.php" class="text-blue-500 hover:underline">Log in here</a></p>
        </div>
    </div>
</body>
</html>
