<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Siargao Island Travel Guide</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap"
    rel="stylesheet"
  />
  <style>
    body {
      font-family: "Montserrat", sans-serif;
      background: #f1f1f1;
      min-height: 100vh;
      position: relative;
      overflow-x: hidden;
    }
    .sidebar ul {
      list-style: none;
      padding: 3;
    }
    .sidebar li {
      margin: 0.90rem 0;
    }
    .sidebar a {
      display: flex;
      align-items: center;
      padding: 0.80rem 1.50rem;
      color: #4b5563;
      text-decoration: none;
      font-weight: 900;
      border-radius: 0.9rem;
      transition: all 0.3s ease;
      background-color: #f9fafb;
      box-shadow: 0 2px 6px rgb(0 0 0 / 0.05);
    }
    .sidebar a i {
      color: rgb(0, 0, 0);
      min-width: 20px;
      font-size: 1.2rem;
    }
    .sidebar a:hover {
      background-color: rgb(0, 0, 0);
      color: white;
      transform: translateX(12px);
      box-shadow: 0 8px 20px rgb(99 102 241 / 0.4);
    }
    .sidebar a:hover i {
      color: white;
    }
    .sidebar a.active,
    .sidebar a.active:hover {
      background-color: rgb(0, 0, 0);
      color: white;
      box-shadow: 0 8px 20px rgb(79 70 229 / 0.6);
      transform: none;
    }
    .sidebar a.active i {
      color: white;
    }
    .content-section {
      display: none;
      animation: fadeInUp 0.8s ease forwards;
    }
    .content-section.active {
      display: block;
    }
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    #thumbnails::-webkit-scrollbar {
      height: 6px;
    }
    #thumbnails::-webkit-scrollbar-thumb {
      background-color: rgb(0, 0, 0);
      border-radius: 3px;
    }
    #thumbnails::-webkit-scrollbar-track {
      background-color: #e5e7eb;
    }
    /* Slide image shadow and rounded */
    #slide-image {
      border-radius: 1rem;
      box-shadow: 0 12px 30px rgb(99 102 241 / 0.4);
      transition: transform 0.5s ease;
    }
    #slide-image:hover {
      transform: scale(1.05);
    }
    /* Headings styling */
    h2,
    h3,
    h4 {
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }
    /* Cards with gradient and subtle shadow */
    .rating-card {
      background: linear-gradient(135deg, #f3f4f6, #e0e7ff);
      box-shadow: 0 8px 20px rgb(99 102 241 / 0.15);
      border-radius: 1rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
    }
    .rating-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 16px 40px rgb(99 102 241 / 0.3);
    }
    /* Button style for thumbnails */
    #thumbnails img {
      transition: border-color 0.3s ease, transform 0.3s ease;
    }
    #thumbnails img:hover {
      transform: scale(1.1);
      border-color: rgb(0, 0, 0) !important;
      box-shadow: 0 4px 12px rgb(79 70 229 / 0.4);
      z-index: 10;
      position: relative;
    }
    /* Responsive tweaks */
    @media (max-width: 768px) {
      body {
        background: white !important;
      }
      .sidebar {
        width: 100% !important;
        box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
        position: sticky;
        top: 0;
        z-index: 60;
        display: flex;
        justify-content: center;
      }
      .sidebar ul {
        display: flex;
        gap: 1rem;
        overflow-x: auto;
        padding: 0.5rem 0;
      }
      .sidebar li {
        margin: 0;
      }
      .sidebar a {
        padding: 0.5rem 0.90rem;
        font-size: 0.9rem;
        border-radius: 0.375rem;
        box-shadow: none;
      }
      .sidebar a:hover {
        transform: none;
        box-shadow: none;
      }
      main {
        padding-top: 1rem;
      }
      #slide-image {
        height: 48vw !important;
        max-height: 300px;
      }
    }
  </style>
</head>
<body class="flex flex-col md:flex-row min-h-screen">
  <!-- Sidebar -->
  <aside class="sidebar bg-white shadow-lg p-8 w-full md:w-64 flex-shrink-0">
    <h3 class="text-2xl font-extrabold mb-6 text-black-700 tracking-wide select-none">
      Welcome, Tourist
    </h3>
    <ul>
      <li><a href="index.php" class="active"><i class="fas fa-home"></i> <span class="ml-3">Home</span></a></li>
      <li><a href="municipality.php"><i class="fas fa-map"></i> <span class="ml-3">Municipality</span></a></li>
      <li><a href="destinations.php"><i class="fas fa-map-marker-alt"></i> <span class="ml-3">Destination Island</span></a></li>
      <li><a href="bookings.php"><i class="fas fa-calendar-alt"></i> <span class="ml-3">Booking</span></a></li>
      <li><a href="settings.php"><i class="fas fa-cogs"></i> <span class="ml-3">Settings</span></a></li><br><br><br><br><br><br><br>
      <li class="mt-20"><a href="logout.php" class="text-red-600 hover:text-red-800"><i class="fas fa-sign-out-alt"></i> <span class="ml-3">Logout</span></a></li>
    </ul>
  </aside>

  <main class="flex-1 p-6 max-w-4xl mx-auto w-full">
    <section class="content-section active" id="home">
      <h2 class="text-4xl font-extrabold mb-8 text-center text-black-700 drop-shadow-md">
        Welcome to Siargao Island
      </h2>
      <div
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto"
      >
        <div class="rating-card p-8">
          <div class="flex items-center mb-5">
            <i class="fas fa-water text-blue-500 text-4xl mr-4 drop-shadow-md"></i>
            <h4 class="text-2xl font-semibold text-blak-700 drop-shadow-sm">Surfing Experience</h4>
          </div>
          <p class="mb-5 text-gray-700 text-lg leading-relaxed">
            World-class waves and surf spots loved by beginners and pros alike.
          </p>
          <div class="flex text-yellow-400 text-xl drop-shadow-md items-center">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span class="ml-3 text-gray-600 font-semibold text-lg">4.8/5</span>
          </div>
        </div>
        <div class="rating-card p-8">
          <div class="flex items-center mb-5">
            <i class="fas fa-umbrella-beach text-yellow-500 text-4xl mr-4 drop-shadow-md"></i>
            <h4 class="text-2xl font-semibold text-black-700 drop-shadow-sm">Beaches &amp; Nature</h4>
          </div>
          <p class="mb-5 text-gray-700 text-lg leading-relaxed">
            Pristine white sand beaches, crystal-clear waters, and lush tropical scenery.
          </p>
          <div class="flex text-yellow-400 text-xl drop-shadow-md items-center">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <span class="ml-3 text-gray-600 font-semibold text-lg">5.0/5</span>
          </div>
        </div>
        <div class="rating-card p-8">
          <div class="flex items-center mb-5">
            <i class="fas fa-smile-beam text-green-500 text-4xl mr-4 drop-shadow-md"></i>
            <h4 class="text-2xl font-semibold text-black-700 drop-shadow-sm">Local Hospitality</h4>
          </div>
          <p class="mb-5 text-gray-700 text-lg leading-relaxed">
            Friendly locals and vibrant culture that make every visitor feel welcome.
          </p>
          <div class="flex text-yellow-400 text-xl drop-shadow-md items-center">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
            <span class="ml-3 text-gray-600 font-semibold text-lg">4.5/5</span>
          </div>
        </div>
        <div class="rating-card p-8">
          <div class="flex items-center mb-5">
            <i class="fas fa-utensils text-red-500 text-4xl mr-4 drop-shadow-md"></i>
            <h4 class="text-2xl font-semibold text-black-700 drop-shadow-sm">Food &amp; Cuisine</h4>
          </div>
          <p class="mb-5 text-gray-700 text-lg leading-relaxed">
            Delicious local dishes and fresh seafood that delight your taste buds.
          </p>
          <div class="flex text-yellow-400 text-xl drop-shadow-md items-center">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
            <span class="ml-3 text-gray-600 font-semibold text-lg">4.3/5</span>
          </div>
        </div>
        <div class="rating-card p-8">
          <div class="flex items-center mb-5">
            <i class="fas fa-hiking text-green-600 text-4xl mr-4 drop-shadow-md"></i>
            <h4 class="text-2xl font-semibold text-black-700 drop-shadow-sm">Adventure &amp; Activities</h4>
          </div>
          <p class="mb-5 text-gray-700 text-lg leading-relaxed">
            Exciting island tours, surfing, island hopping, and nature treks.
          </p>
          <div class="flex text-yellow-400 text-xl drop-shadow-md items-center">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span class="ml-3 text-gray-600 font-semibold text-lg">4.7/5</span>
          </div>
        </div>
        <div class="rating-card p-8">
          <div class="flex items-center mb-5">
            <i class="fas fa-leaf text-teal-500 text-4xl mr-4 drop-shadow-md"></i>
            <h4 class="text-2xl font-semibold text-black-700 drop-shadow-sm">Eco-Friendliness</h4>
          </div>
          <p class="mb-5 text-gray-700 text-lg leading-relaxed">
            Sustainable tourism efforts and preserved natural habitats.
          </p>
          <div class="flex text-yellow-400 text-xl drop-shadow-md items-center">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <span class="ml-3 text-gray-600 font-semibold text-lg">3.5/5</span>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script>
    (() => {
      const images = [
        {
          src:
            "https://storage.googleapis.com/a1aa/image/2ef2ae78-e681-48e5-e707-23f42e880c1f.jpg",
          alt:
            "Siargao Island beach with clear blue waters, white sand, and tall palm trees under a bright sunny sky",
        },
        {
          src:
            "https://storage.googleapis.com/a1aa/image/804811a3-b603-4736-b9db-1c5c0205b979.jpg",
          alt:
            "A surfer skillfully riding a large turquoise wave at Siargao Island during a sunny day with blue skies",
        },
        {
          src:
            "https://storage.googleapis.com/a1aa/image/083c4ece-7e5e-4fea-ce22-00b5e7db8301.jpg",
          alt:
            "A vibrant local market scene in Siargao Island with friendly locals and colorful stalls under a sunny sky",
        },
      ];

      let currentIndex = 0;
      const slideImage = document.getElementById("slide-image");
      const thumbnails = document.querySelectorAll("#thumbnails img");

      function updateSlide(index) {
        currentIndex = index;
        slideImage.src = images[index].src;
        slideImage.alt = images[index].alt;
        thumbnails.forEach((thumb, i) => {
          if (i === index) {
            thumb.classList.add("border-indigo-600");
            thumb.classList.remove("border-transparent");
          } else {
            thumb.classList.remove("border-indigo-600");
            thumb.classList.add("border-transparent");
          }
        });
      }

      thumbnails.forEach((thumb) => {
        thumb.addEventListener("click", () => {
          updateSlide(parseInt(thumb.dataset.index));
        });
      });

      // Auto slide every 5 seconds
      setInterval(() => {
        currentIndex = (currentIndex + 1) % images.length;
        updateSlide(currentIndex);
      }, 5000);
    })();
  </script>
</body>
</html>