<?php
// Database connection
$servername = "localhost";
$username = "root";   // MySQL username
$password = "";       // MySQL password
$dbname = "tourism_db";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users
$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

// Fetch tourist bookings for Siargao Island
$sql_bookings = "SELECT * FROM bookings WHERE destination = 'Siargao Island' ORDER BY date DESC LIMIT 5";
$result_bookings = $conn->query($sql_bookings);

// Fetch total bookings
$sql_total_bookings = "SELECT COUNT(*) AS total FROM bookings";
$result_total_bookings = $conn->query($sql_total_bookings);
$total_bookings = $result_total_bookings->fetch_assoc()['total'];

// Fetch bookings to Siargao Island
$sql_siargao_bookings = "SELECT COUNT(*) AS siargao_count FROM bookings WHERE destination = 'Siargao Island'";
$result_siargao_bookings = $conn->query($sql_siargao_bookings);
$siargao_count = $result_siargao_bookings->fetch_assoc()['siargao_count'];

// Calculate percentage of Siargao Island bookings
$percentage_siargao = ($total_bookings > 0) ? ($siargao_count / $total_bookings) * 100 : 0;
?>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
    rel="stylesheet"
  />
  <style>
    body {
        background-color: #f7fafc;
        font-family: 'Poppins', sans-serif;
    }
    /* Navbar styles */
    nav {
        background: linear-gradient(90deg, #2b6cb0, #3182ce);
        box-shadow: 0 4px 8px rgba(49, 130, 206, 0.4);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 50;
    }
    nav .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    nav .logo {
        color: #e0e7ff;
        font-weight: 700;
        font-size: 1.5rem;
        letter-spacing: 0.05em;
        user-select: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    nav .logo i {
        font-size: 1.8rem;
        transform: rotate(-15deg);
        color: #a3bffa;
    }
    nav ul {
        display: flex;
        gap: 1.5rem;
        list-style: none;
    }
    nav ul li a {
        color: #e0e7ff;
        font-weight: 600;
        font-size: 1rem;
        padding: 0.5rem 0.75rem;
        border-radius: 0.375rem;
        transition: background-color 0.3s, color 0.3s;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    nav ul li a:hover,
    nav ul li a:focus {
        background-color: #bee3f8;
        color: #1e40af;
        outline: none;
    }
    nav .menu-toggle {
        display: none;
        font-size: 1.5rem;
        color: #e0e7ff;
        cursor: pointer;
        user-select: none;
    }
    /* Responsive Navbar */
    @media (max-width: 768px) {
        nav ul {
            flex-direction: column;
            width: 100%;
            display: none;
            margin-top: 0.5rem;
            background: #3182ce;
            border-radius: 0 0 0.5rem 0.5rem;
            box-shadow: 0 4px 8px rgba(49, 130, 206, 0.3);
        }
        nav ul.show {
            display: flex;
        }
        nav ul li a {
            padding: 0.75rem 1rem;
            font-size: 1.1rem;
            border-radius: 0;
            border-bottom: 1px solid #bee3f8;
        }
        nav ul li:last-child a {
            border-bottom: none;
        }
        nav .menu-toggle {
            display: block;
        }
    }
    /* Main content adjustments */
    .main-content {
        margin-top: 72px;
        padding: 2rem 1rem;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }
    /* Table styling with Tailwind + custom */
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 4px 8px rgb(0 0 0 / 0.05);
    }
    th, td {
        padding: 0.75rem 1rem;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
        font-size: 0.95rem;
    }
    th {
        background-color: #2b6cb0;
        color: #fff;
        font-weight: 600;
        letter-spacing: 0.03em;
        text-transform: uppercase;
    }
    tr:nth-child(even) {
        background-color: #f9fafb;
    }
    tr:hover {
        background-color: #bee3f8;
        transition: background-color 0.3s;
    }
    /* Buttons */
    .add-user-btn {
        display: inline-block;
        margin-bottom: 1.5rem;
        background: linear-gradient(90deg, #38a169, #2f855a);
        color: #e6fffa;
        padding: 0.6rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 600;
        box-shadow: 0 4px 6px rgb(56 161 105 / 0.5);
        transition: background 0.3s, box-shadow 0.3s;
        user-select: none;
    }
    .add-user-btn:hover,
    .add-user-btn:focus {
        background: linear-gradient(90deg, #2f855a, #276749);
        box-shadow: 0 6px 10px rgb(39 103 73 / 0.7);
        outline: none;
    }
    /* Tourist Booking Card */
    .tourist-booking {
        background-color: #edf2f7;
        border-radius: 1rem;
        padding: 1.5rem 2rem;
        margin-top: 2rem;
        box-shadow: 0 8px 16px rgb(0 0 0 / 0.05);
        transition: box-shadow 0.3s;
    }
    .tourist-booking:hover {
        box-shadow: 0 12px 24px rgb(0 0 0 / 0.1);
    }
    .tourist-booking h2 {
        color: #2d3748;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        letter-spacing: 0.02em;
    }
    .recent-bookings p {
        font-size: 1rem;
        color: #4a5568;
        margin-bottom: 0.6rem;
        border-left: 4px solid #3182ce;
        padding-left: 0.75rem;
        font-weight: 500;
        user-select: text;
    }
    /* Traffic Section */
    .traffic {
        background-color: #ffffff;
        border-radius: 1rem;
        padding: 2rem;
        margin-top: 2.5rem;
        box-shadow: 0 8px 20px rgb(0 0 0 / 0.05);
        user-select: none;
    }
    .traffic h2 {
        color: #2d3748;
        margin-bottom: 1.5rem;
        font-weight: 700;
        font-size: 1.75rem;
        letter-spacing: 0.02em;
    }
    .traffic-stats {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1.5rem;
    }
    .traffic-box {
        background-color: #e2e8f0;
        color: #2d3748;
        padding: 1.75rem 1.5rem;
        border-radius: 1rem;
        width: 30%;
        text-align: center;
        box-shadow: 0 4px 12px rgb(0 0 0 / 0.08);
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        user-select: none;
    }
    .traffic-box:hover {
        background-color: #cbd5e1;
        box-shadow: 0 8px 20px rgb(0 0 0 / 0.12);
    }
    .traffic-box i {
        font-size: 2.5rem;
        margin-bottom: 0.75rem;
        color: #3182ce;
        filter: drop-shadow(0 1px 1px rgb(0 0 0 / 0.1));
    }
    .traffic-box h3 {
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        letter-spacing: 0.02em;
    }
    .traffic-box p {
        font-size: 1.1rem;
        font-weight: 600;
        letter-spacing: 0.02em;
    }
    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .traffic-box {
            width: 100% !important;
        }
    }
</style>
</head>
<body class="h-full flex flex-col">
  <!-- Navbar -->
  <nav class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">
        <div class="flex-shrink-0 text-2xl font-semibold text-gray-800">
          Admin Panel
        </div>
        <div class="hidden md:flex space-x-6">
          <a
            href="#"
            class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition px-3 py-2 rounded-md text-lg font-medium"
            ><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a
          >
          <a
            href="tourist.php"
            class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition px-3 py-2 rounded-md text-lg font-medium"
            ><i class="fas fa-clipboard-list"></i><span>Tourist Booking</span></a
          >
          <a
            href="logout1.php"
            class="flex items-center space-x-2 text-gray-700 hover:text-red-600 transition px-3 py-2 rounded-md text-lg font-medium"
            ><i class="fas fa-sign-out-alt"></i><span>Logout</span></a
          >
        </div>
        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button id="mobile-menu-button" aria-label="Toggle menu" class="text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
            <i class="fas fa-bars fa-lg"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
      <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 border-b border-gray-200 flex items-center space-x-2">
        <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
      </a>
      <a href="tourist.php" class="block px-4 py-3 text-gray-700 hover:bg-gray-100 border-b border-gray-200 flex items-center space-x-2">
        <i class="fas fa-clipboard-list"></i><span>Tourist Booking</span>
      </a>
      <a href="logout1.php" class="block px-4 py-3 text-gray-700 hover:bg-red-600 hover:text-white flex items-center space-x-2">
        <i class="fas fa-sign-out-alt"></i><span>Logout</span>
      </a>
    </div>
  </nav>

  <!-- Main content -->
  <main class="flex-1 pt-20 p-8 max-w-7xl mx-auto w-full">
    <h1 class="text-3xl font-semibold mb-6">Admin Dashboard</h1>

    <button
      id="addUserBtn"
      class="inline-block mb-6 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded shadow transition"
    >
      + Add New User
    </button>

    <!-- User Table -->
    <section class="overflow-x-auto bg-white rounded shadow mb-10">
      <table class="min-w-full border-collapse border border-gray-300" id="usersTable">
        <thead class="bg-blue-700 text-white">
          <tr>
            <th class="border border-gray-300 px-4 py-3 text-left">ID</th>
            <th class="border border-gray-300 px-4 py-3 text-left">Username</th>
            <th class="border border-gray-300 px-4 py-3 text-left">Email</th>
            <th class="border border-gray-300 px-4 py-3 text-left">Role</th>
            <th class="border border-gray-300 px-4 py-3 text-left">Actions</th>
          </tr>
        </thead>
        <tbody id="usersTableBody">
          <tr class="even:bg-gray-100">
            <td class="border border-gray-300 px-4 py-3">1</td>
            <td class="border border-gray-300 px-4 py-3">admin</td>
            <td class="border border-gray-300 px-4 py-3">Lynveenavarro@gmail.com</td>
            <td class="border border-gray-300 px-4 py-3">Admin</td>
            <td class="border border-gray-300 px-4 py-3 space-x-2">
              <button class="editBtn text-blue-600 hover:underline" data-id="1">Edit</button> |
              <button class="deleteBtn text-red-600 hover:underline" data-id="1">Delete</button>
            </td>
          </tr>
          <tr class="even:bg-gray-100">
            <td class="border border-gray-300 px-4 py-3">2</td>
            <td class="border border-gray-300 px-4 py-3">Joshua Quilas</td>
            <td class="border border-gray-300 px-4 py-3">joshuaq@gmail.com</td>
            <td class="border border-gray-300 px-4 py-3">Admin</td>
            <td class="border border-gray-300 px-4 py-3 space-x-2">
              <button class="editBtn text-blue-600 hover:underline" data-id="2">Edit</button> |
              <button class="deleteBtn text-red-600 hover:underline" data-id="2">Delete</button>
            </td>
          </tr>
          <tr class="even:bg-gray-100">
            <td class="border border-gray-300 px-4 py-3">3</td>
            <td class="border border-gray-300 px-4 py-3">Mary Cris Espanola</td>
            <td class="border border-gray-300 px-4 py-3">crisssy@gmail.com</td>
            <td class="border border-gray-300 px-4 py-3">Admin</td>
            <td class="border border-gray-300 px-4 py-3 space-x-2">
              <button class="editBtn text-blue-600 hover:underline" data-id="3">Edit</button> |
              <button class="deleteBtn text-red-600 hover:underline" data-id="3">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- Tourist Booking Dashboard -->
    <section
      class="mt-10 bg-gray-50 rounded-lg p-6 shadow max-w-4xl mx-auto"
      aria-label="Recent Tourist Bookings for Siargao Island"
    >
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">
        Recent Tourist Bookings for Siargao Island
      </h2>
      <div class="space-y-3 text-gray-700">
        <p>
          <strong>Name:</strong> Sheridan Sulapas |
          <strong>Destination:</strong> Siargao Island |
          <strong>Date:</strong> 2024-06-10 |
          <strong>People:</strong> 4
        </p>
        <p>
          <strong>Name:</strong> Ma.charito Robles |
          <strong>Destination:</strong> Siargao Island |
          <strong>Date:</strong> 2024-06-12 |
          <strong>People:</strong> 2
        </p>
        <p>
          <strong>Name:</strong> Kenneth chiba|
          <strong>Destination:</strong> Siargao Island |
          <strong>Date:</strong> 2024-06-15 |
          <strong>People:</strong> 3
        </p>
      </div>
    </section>

  </main>

  <!-- Add User Modal -->
  <div id="addUserModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
      <h2 class="text-2xl font-semibold mb-4">Add New User</h2>
      <form id="addUserForm" class="space-y-4">
        <div>
          <label for="username" class="block text-gray-700 font-medium mb-1">Username</label>
          <input type="text" id="username" name="username" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div>
          <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
          <input type="email" id="email" name="email" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div>
          <label for="role" class="block text-gray-700 font-medium mb-1">Role</label>
          <select id="role" name="role" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="" disabled selected>Select role</option>
            <option value="Administrator">Administrator</option>
            <option value="User">User</option>
          </select>
        </div>
        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
          <button type="button" id="cancelAddUser" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold transition">Cancel</button>
          <button type="submit" class="px-4 py-2 rounded bg-green-600 hover:bg-green-700 text-white font-semibold transition">Add User</button>
        </div>
      </form>
      <button id="closeModalBtn" aria-label="Close modal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 focus:outline-none">
        <i class="fas fa-times fa-lg"></i>
      </button>
    </div>
  </div>

  <script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

    // Modal elements
    const addUserBtn = document.getElementById('addUserBtn');
    const addUserModal = document.getElementById('addUserModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelAddUser = document.getElementById('cancelAddUser');
    const addUserForm = document.getElementById('addUserForm');
    const usersTableBody = document.getElementById('usersTableBody');

    // Show modal
    addUserBtn.addEventListener('click', () => {
      addUserModal.classList.remove('hidden');
    });

    // Close modal function
    function closeModal() {
      addUserModal.classList.add('hidden');
      addUserForm.reset();
    }

    closeModalBtn.addEventListener('click', closeModal);
    cancelAddUser.addEventListener('click', closeModal);

    // Add user form submit
    addUserForm.addEventListener('submit', (e) => {
      e.preventDefault();

      const username = addUserForm.username.value.trim();
      const email = addUserForm.email.value.trim();
      const role = addUserForm.role.value;

      if (!username || !email || !role) {
        alert('Please fill in all fields.');
        return;
      }

      // Generate new ID by finding max existing ID + 1
      let maxId = 0;
      Array.from(usersTableBody.querySelectorAll('tr')).forEach(row => {
        const id = parseInt(row.children[0].textContent, 10);
        if (id > maxId) maxId = id;
      });
      const newId = maxId + 1;

      // Create new row
      const tr = document.createElement('tr');
      if ((newId % 2) === 0) tr.classList.add('even:bg-gray-100');

      tr.innerHTML = `
        <td class="border border-gray-300 px-4 py-3">${newId}</td>
        <td class="border border-gray-300 px-4 py-3">${username}</td>
        <td class="border border-gray-300 px-4 py-3">${email}</td>
        <td class="border border-gray-300 px-4 py-3">${role}</td>
        <td class="border border-gray-300 px-4 py-3 space-x-2">
          <button class="editBtn text-blue-600 hover:underline" data-id="${newId}">Edit</button> |
          <button class="deleteBtn text-red-600 hover:underline" data-id="${newId}">Delete</button>
        </td>
      `;

      usersTableBody.appendChild(tr);
      closeModal();
    });

    // Delete user functionality
    usersTableBody.addEventListener('click', (e) => {
      if (e.target.classList.contains('deleteBtn')) {
        const confirmed = confirm('Are you sure you want to delete this user?');
        if (confirmed) {
          const row = e.target.closest('tr');
          row.remove();
        }
      }
    });

    // Edit user functionality (basic inline editing)
    usersTableBody.addEventListener('click', (e) => {
      if (e.target.classList.contains('editBtn')) {
        const row = e.target.closest('tr');
        if (row.getAttribute('data-editing') === 'true') return; // Prevent multiple edits

        row.setAttribute('data-editing', 'true');
        const cells = row.querySelectorAll('td');
        const id = cells[0].textContent;
        const username = cells[1].textContent;
        const email = cells[2].textContent;
        const role = cells[3].textContent;

        cells[1].innerHTML = `<input type="text" class="w-full border border-gray-300 rounded px-2 py-1" value="${username}">`;
        cells[2].innerHTML = `<input type="email" class="w-full border border-gray-300 rounded px-2 py-1" value="${email}">`;
        cells[3].innerHTML = `
          <select class="w-full border border-gray-300 rounded px-2 py-1">
            <option value="Administrator" ${role === 'Administrator' ? 'selected' : ''}>Administrator</option>
            <option value="User" ${role === 'User' ? 'selected' : ''}>User</option>
          </select>
        `;
        cells[4].innerHTML = `
          <button class="saveBtn text-green-600 hover:underline mr-2">Save</button>
          <button class="cancelBtn text-gray-600 hover:underline">Cancel</button>
        `;
      } else if (e.target.classList.contains('cancelBtn')) {
        const row = e.target.closest('tr');
        const id = row.children[0].textContent;
        const username = row.children[1].querySelector('input').defaultValue;
        const email = row.children[2].querySelector('input').defaultValue;
        const role = row.children[3].querySelector('select').value;

        row.removeAttribute('data-editing');
        row.children[1].textContent = username;
        row.children[2].textContent = email;
        row.children[3].textContent = role;
        row.children[4].innerHTML = `
          <button class="editBtn text-blue-600 hover:underline" data-id="${id}">Edit</button> |
          <button class="deleteBtn text-red-600 hover:underline" data-id="${id}">Delete</button>
        `;
      } else if (e.target.classList.contains('saveBtn')) {
        const row = e.target.closest('tr');
        const id = row.children[0].textContent;
        const usernameInput = row.children[1].querySelector('input');
        const emailInput = row.children[2].querySelector('input');
        const roleSelect = row.children[3].querySelector('select');

        const username = usernameInput.value.trim();
        const email = emailInput.value.trim();
        const role = roleSelect.value;

        if (!username || !email || !role) {
          alert('Please fill in all fields.');
          return;
        }

        row.removeAttribute('data-editing');
        row.children[1].textContent = username;
        row.children[2].textContent = email;
        row.children[3].textContent = role;
        row.children[4].innerHTML = `
          <button class="editBtn text-blue-600 hover:underline" data-id="${id}">Edit</button> |
          <button class="deleteBtn text-red-600 hover:underline" data-id="${id}">Delete</button>
        `;
      }
    });
  </script>
</body>
</html>