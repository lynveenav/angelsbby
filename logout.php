<?php
// Start the session
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle logout
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Destroy session to log out the user

    session_start();
    session_destroy();
    header("Location: login.php");
    exit();

}
?>
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Log Out
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
        }
  </style>
 </head>
 <body class="flex items-center justify-center h-screen bg-gray-900 relative">
  <img alt="A blurred background image with abstract patterns" class="absolute inset-0 w-full h-full object-cover opacity-90 z-0" height="1080" src="./Cloud-9-Siargao-.jpg" width="1920"/>
  <div class="bg-white bg-opacity-10 p-10 rounded-lg shadow-lg text-center backdrop-blur-md z-10 w-80 md:w-96">
   <h2 class="text-white text-2xl mb-4">
    Log out
   </h2>
   <p class="text-gray-300 mb-6">
    Are you sure you want to log out?
   </p>
   <form action="login.html" method="POST">
    <button class="bg-green-600 text-white py-2 px-4 rounded mb-4 w-full hover:bg-green-700 transition transform hover:-translate-y-1" type="submit">
     Log Out
    </button>
    <button class="bg-gray-200 text-gray-800 py-2 px-4 rounded w-full hover:bg-gray-300 transition transform hover:-translate-y-1" onclick="window.location.href='login.php'" type="button">
     Cancel
    </button>
   </form>
   <p class="text-gray-300 mt-4">
    Thank you
   </p>
  </div>
 </body>
</html>

