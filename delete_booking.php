<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'tourist_booking_system');

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID is passed
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Delete the booking from the database
    $sql = "DELETE FROM bookings WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Booking deleted successfully.";
    } else {
        echo "Error deleting booking: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
