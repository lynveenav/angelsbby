<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Tourist Booking Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen relative">
  <img src="background.jpg" alt="Blurred scenic background" class="absolute inset-0 w-full h-full object-cover filter blur-lg z-0" />
  <div class="container bg-black bg-opacity-60 p-8 rounded-lg shadow-lg relative z-10 w-12/13 max-w-7xl">
    <h1 class="text-3xl font-bold mb-6">Tourist Booking </h1>

    <table class="w-full table-auto border-collapse bg-gray-900">
      <thead>
        <tr>
          <th class="border border-gray-700 px-4 py-2 bg-teal-500 text-black">Name</th>
          <th class="border border-gray-700 px-4 py-2 bg-teal-500 text-black">Email</th>
          <th class="border border-gray-700 px-4 py-2 bg-teal-500 text-black">Phone</th>
          <th class="border border-gray-700 px-4 py-2 bg-teal-500 text-black">Address</th>
          <th class="border border-gray-700 px-4 py-2 bg-teal-500 text-black">Nationality</th>
          <th class="border border-gray-700 px-4 py-2 bg-teal-500 text-black">Destination</th>
          <th class="border border-gray-700 px-4 py-2 bg-teal-500 text-black">Date</th>
          <th class="border border-gray-700 px-4 py-2 bg-teal-500 text-black">Pax</th>
          <th class="border border-gray-700 px-4 py-2 bg-teal-500 text-black">Action</th>
        </tr>
      </thead>
      <tbody id="dashboardTableBody" class="text-center"></tbody>
    </table>

    <div class="mt-6 space-x-4">
      <a href="bookings.php" class="bg-teal-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-teal-700 transition">Back to Booking Form</a>
      <button onclick="clearAll()" class="bg-red-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-red-700 transition">Clear All Bookings</button>
    </div>
    <footer class="mt-16 w-full max-w-7xl text-center">
   <a class="inline-block bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition transform hover:scale-110 hover:shadow-cyan-400/50" href="admin.php">
    <i class="fas fa-home mr-2">
    </i>
    Go Back Home
   </a>
  </footer>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', loadDashboard);

    function loadDashboard() {
      const bookings = JSON.parse(localStorage.getItem('bookings')) || [];
      const tableBody = document.getElementById('dashboardTableBody');
      tableBody.innerHTML = bookings.length
        ? bookings.map((b, i) => `
            <tr class="${i % 2 === 0 ? 'bg-gray-700' : 'bg-gray-800'}">
              <td class="border border-gray-700 px-4 py-2">${b.name}</td>
              <td class="border border-gray-700 px-4 py-2">${b.email}</td>
              <td class="border border-gray-700 px-4 py-2">${b.phone}</td>
              <td class="border border-gray-700 px-4 py-2">${b.address}</td>
              <td class="border border-gray-700 px-4 py-2">${b.nationality}</td>
              <td class="border border-gray-700 px-4 py-2">${b.destination}</td>
              <td class="border border-gray-700 px-4 py-2">${b.date}</td>
              <td class="border border-gray-700 px-4 py-2">${b.pax}</td>
              <td class="border border-gray-700 px-4 py-2">
                <button onclick="deleteBooking(${i})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Delete</button>
              </td>
            </tr>`).join('')
        : '<tr><td colspan="9" class="border border-gray-700 px-4 py-2">No bookings found</td></tr>';
    }

    function deleteBooking(index) {
      const bookings = JSON.parse(localStorage.getItem('bookings')) || [];
      bookings.splice(index, 1);
      localStorage.setItem('bookings', JSON.stringify(bookings));
      loadDashboard();
    }

    function clearAll() {
      if (confirm("Are you sure you want to delete all bookings?")) {
        localStorage.removeItem("bookings");
        loadDashboard();
      }
    }
  </script>
</body>
</html>
