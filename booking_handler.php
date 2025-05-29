<?php
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "tourism_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $pax = (int) $_POST['pax'];

    // Validate fields
    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($nationality) || empty($destination) || empty($date) || empty($pax)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    // Prepare the SQL query to insert the data
    $sql = "INSERT INTO bookings (name, email, phone, address, nationality, destination, date, pax) 
            VALUES ('$name', '$email', '$phone', '$address', '$nationality', '$destination', '$date', $pax)";
    
    if ($conn->query($sql) === TRUE) {
        // Return success message as JSON
        echo json_encode(['status' => 'success', 'message' => 'Booking added successfully!']);
    } else {
        // Return error message as JSON
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
    }

    // Close connection
    $conn->close();
} else {
    // Handle non-POST requests
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
