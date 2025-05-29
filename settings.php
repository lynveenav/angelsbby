<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Settings</title>
  <link rel="icon" href="https://img.icons8.com/ios/50/000000/settings.png" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
    rel="stylesheet"
  />
  <style>
    body {
      font-family: "Poppins", sans-serif;
      transition: background-color 0.3s, color 0.3s;
    }
    body.dark-mode {
      background-color:rgb(0, 0, 0);
      color:rgb(255, 246, 246);
    }
    body.dark-mode input,
    body.dark-mode select {
      background-color: #1e1e1e;
      color:hsl(0, 100.00%, 98.80%);
      border-color: #444;
    }
    body.dark-mode .bg-white {
      background-color: #1e1e1e !important;
    }
    body.dark-mode .border-gray-300 {
      border-color: #444 !important;
    }
    body.dark-mode .text-gray-600 {
      color: #aaa !important;
    }
    body.dark-mode .text-gray-800 {
      color:rgb(255, 255, 255) !important;
    }
    body.dark-mode .alert {
      background-color: #2f855a !important;
      color:rgb(0, 0, 0) !important;
    }
  </style>
</head>
<body
  class="bg-cover bg-center min-h-screen relative"
  style="background-image: url('background.jpg');"
>
  <div class="absolute inset-0 bg-black opacity-50"></div>
  <div class="flex items-center justify-center min-h-screen px-4 py-12 relative z-10">
    <div
      class="bg-white bg-opacity-90 dark:bg-opacity-90 p-8 rounded-lg shadow-lg w-full max-w-lg max-h-[95vh] overflow-y-auto"
    >
      <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-gray-100 flex items-center gap-3">
        <i class="fas fa-cogs"></i> Settings
      </h2>

      <!-- Dark Mode Setting -->
      <div class="mb-8">
        <div class="flex justify-between items-center">
          <div>
            <label
              for="darkModeToggle"
              class="font-semibold text-lg text-gray-800 dark:text-gray-100"
              >Dark Mode</label
            >
            <p class="text-sm text-gray-600 dark:text-gray-400">
              Switch the theme of your dashboard.
            </p>
          </div>
          <input type="checkbox" id="darkModeToggle" class="w-7 h-7 cursor-pointer" />
        </div>
      </div>

      <!-- Notifications Setting -->
      <div class="mb-8">
        <div class="flex justify-between items-center">
          <div>
            <label
              for="notificationsToggle"
              class="font-semibold text-lg text-gray-800 dark:text-gray-100"
              >Push Notifications</label
            >
            <p class="text-sm text-gray-600 dark:text-gray-400">
              Enable or disable push notifications.
            </p>
          </div>
          <input
            type="checkbox"
            id="notificationsToggle"
            class="w-7 h-7 cursor-pointer"
            checked
          />
        </div>
      </div>

      <!-- Email Notifications -->
      <div class="mb-8">
        <div class="flex justify-between items-center">
          <div>
            <label
              for="emailNotifications"
              class="font-semibold text-lg text-gray-800 dark:text-gray-100"
              >Email Notifications</label
            >
            <p class="text-sm text-gray-600 dark:text-gray-400">
              Receive notifications via email.
            </p>
          </div>
          <input type="checkbox" id="emailNotifications" class="w-7 h-7 cursor-pointer" />
        </div>
      </div>

      <!-- SMS Notifications -->
      <div class="mb-8">
        <div class="flex justify-between items-center">
          <div>
            <label
              for="smsNotifications"
              class="font-semibold text-lg text-gray-800 dark:text-gray-100"
              >SMS Notifications</label
            >
            <p class="text-sm text-gray-600 dark:text-gray-400">
              Receive notifications via SMS.
            </p>
          </div>
          <input type="checkbox" id="smsNotifications" class="w-7 h-7 cursor-pointer" />
        </div>
      </div>

      <!-- Language Selection -->
      <div class="mb-8">
        <div class="flex justify-between items-center">
          <div>
            <label
              for="languageSelect"
              class="font-semibold text-lg text-gray-800 dark:text-gray-100"
              >Language</label
            >
            <p class="text-sm text-gray-600 dark:text-gray-400">
              Select your preferred language.
            </p>
          </div>
          <select
            id="languageSelect"
            class="w-44 p-2 border border-gray-300 rounded cursor-pointer dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200"
          >
            <option value="en">English</option>
            <option value="es">Spanish</option>
            <option value="fr">French</option>
            <option value="de">German</option>
            <option value="zh">Chinese</option>
            <option value="uk">United Kingdom English</option>
            <option value="hi">Hindi</option>
            <option value="pt">Portuguese</option>
            <option value="ru">Russian</option>
            <option value="ja">Japanese</option>
            <option value="ko">Korean</option>
            <option value="tl">Filipino</option>
          </select>
        </div>
      </div>

      <div class="border-t border-gray-300 dark:border-gray-600 my-8"></div>

      <!-- Font Size Setting -->
      <div class="mb-8">
        <div class="flex justify-between items-center">
          <div>
            <label
              for="fontSize"
              class="font-semibold text-lg text-gray-800 dark:text-gray-100"
              >Font Size</label
            >
            <p class="text-sm text-gray-600 dark:text-gray-400">
              Choose your preferred font size for better readability.
            </p>
          </div>
          <select
            id="fontSize"
            class="w-44 p-2 border border-gray-300 rounded cursor-pointer dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200"
          >
            <option value="14">Small</option>
            <option value="16">Medium</option>
            <option value="18">Large</option>
            <option value="20">Extra Large</option>
          </select>
        </div>
      </div>

      <!-- Timezone Selection -->
      <div class="mb-8">
        <div class="flex justify-between items-center">
          <div>
            <label
              for="timezoneSelect"
              class="font-semibold text-lg text-gray-800 dark:text-gray-100"
              >Timezone</label
            >
            <p class="text-sm text-gray-600 dark:text-gray-400">
              Select your timezone.
            </p>
          </div>
          <select
            id="timezoneSelect"
            class="w-44 p-2 border border-gray-300 rounded cursor-pointer dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200"
          >
            <option value="UTC-12">(UTC-12:00) International Date Line West</option>
            <option value="UTC-11">(UTC-11:00) Coordinated Universal Time-11</option>
            <option value="UTC-10">(UTC-10:00) Hawaii</option>
            <option value="UTC-9">(UTC-09:00) Alaska</option>
            <option value="UTC-8">(UTC-08:00) Pacific Time (US & Canada)</option>
            <option value="UTC-7">(UTC-07:00) Mountain Time (US & Canada)</option>
            <option value="UTC-6">(UTC-06:00) Central Time (US & Canada)</option>
            <option value="UTC-5">(UTC-05:00) Eastern Time (US & Canada)</option>
            <option value="UTC-4">(UTC-04:00) Atlantic Time (Canada)</option>
            <option value="UTC-3">(UTC-03:00) Brasilia</option>
            <option value="UTC-2">(UTC-02:00) Mid-Atlantic</option>
            <option value="UTC-1">(UTC-01:00) Azores</option>
            <option value="UTC+0">(UTC+00:00) Coordinated Universal Time</option>
            <option value="UTC+1">(UTC+01:00) Amsterdam, Berlin, Rome</option>
            <option value="UTC+2">(UTC+02:00) Athens, Bucharest</option>
            <option value="UTC+3">(UTC+03:00) Moscow, St. Petersburg</option>
            <option value="UTC+4">(UTC+04:00) Abu Dhabi, Muscat</option>
            <option value="UTC+5">(UTC+05:00) Islamabad, Karachi</option>
            <option value="UTC+6">(UTC+06:00) Almaty, Novosibirsk</option>
            <option value="UTC+7">(UTC+07:00) Bangkok, Hanoi</option>
            <option value="UTC+8">(UTC+08:00) Beijing, Singapore</option>
            <option value="UTC+9">(UTC+09:00) Tokyo, Seoul</option>
            <option value="UTC+10">(UTC+10:00) Sydney, Guam</option>
            <option value="UTC+11">(UTC+11:00) Magadan, Solomon Is.</option>
            <option value="UTC+12">(UTC+12:00) Auckland, Wellington</option>
          </select>
        </div>
      </div>

      <!-- Privacy Settings -->
      <div class="mb-8">
        <div class="flex justify-between items-center">
          <div>
            <label
              for="privacyModeToggle"
              class="font-semibold text-lg text-gray-800 dark:text-gray-100"
              >Privacy Mode</label
            >
            <p class="text-sm text-gray-600 dark:text-gray-400">
              Enable privacy mode to limit data sharing.
            </p>
          </div>
          <input type="checkbox" id="privacyModeToggle" class="w-7 h-7 cursor-pointer" />
        </div>
      </div>

      <!-- Auto-Update Setting -->
      <div class="mb-8">
        <div class="flex justify-between items-center">
          <div>
            <label
              for="autoUpdateToggle"
              class="font-semibold text-lg text-gray-800 dark:text-gray-100"
              >Auto-Update</label
            >
            <p class="text-sm text-gray-600 dark:text-gray-400">
              Automatically update the app when new versions are available.
            </p>
          </div>
          <input type="checkbox" id="autoUpdateToggle" class="w-7 h-7 cursor-pointer" checked />
        </div>
      </div>

      <!-- Data Usage Setting -->
      <div class="mb-8">
        <div class="flex justify-between items-center">
          <div>
            <label
              for="dataUsageSelect"
              class="font-semibold text-lg text-gray-800 dark:text-gray-100"
              >Data Usage</label
            >
            <p class="text-sm text-gray-600 dark:text-gray-400">
              Choose your preferred data usage mode.
            </p>
          </div>
          <select
            id="dataUsageSelect"
            class="w-44 p-2 border border-gray-300 rounded cursor-pointer dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200"
          >
            <option value="high">High Quality</option>
            <option value="balanced">Balanced</option>
            <option value="low">Low Data Usage</option>
          </select>
        </div>
      </div>

      <div class="border-t border-gray-300 dark:border-gray-600 my-8"></div>

      <!-- Save Settings Button -->
      <button
        onclick="saveSettings()"
        class="w-full p-3 bg-teal-500 text-white font-bold rounded hover:bg-teal-700 transition duration-300"
      >
        Save Settings
      </button>

      <!-- Home Button -->
      <div class="mt-6 text-center">
        <a
          href="./index.php"
          class="inline-block bg-teal-600 text-white py-2 px-6 rounded hover:bg-teal-800 transition duration-300"
          >Go Back Home</a
        >
      </div>

      <!-- Success Message -->
      <div
        class="alert p-4 bg-green-500 text-white text-lg rounded mt-4 hidden"
        id="alertMessage"
      >
        <i class="fas fa-check-circle mr-2"></i>Settings saved successfully!
      </div>
    </div>
  </div>

  <script>
    window.onload = function () {
      const darkMode = localStorage.getItem("darkMode") === "true";
      const notifications = localStorage.getItem("notifications") === "true";
      const emailNotifications = localStorage.getItem("emailNotifications") === "true";
      const smsNotifications = localStorage.getItem("smsNotifications") === "true";
      const language = localStorage.getItem("language") || "en";
      const fontSize = localStorage.getItem("fontSize") || "16";
      const timezone = localStorage.getItem("timezone") || "UTC+0";
      const privacyMode = localStorage.getItem("privacyMode") === "true";
      const autoUpdate = localStorage.getItem("autoUpdate") !== "false"; // default true
      const dataUsage = localStorage.getItem("dataUsage") || "balanced";

      document.getElementById("darkModeToggle").checked = darkMode;
      document.getElementById("notificationsToggle").checked = notifications;
      document.getElementById("emailNotifications").checked = emailNotifications;
      document.getElementById("smsNotifications").checked = smsNotifications;
      document.getElementById("languageSelect").value = language;
      document.getElementById("fontSize").value = fontSize;
      document.getElementById("timezoneSelect").value = timezone;
      document.getElementById("privacyModeToggle").checked = privacyMode;
      document.getElementById("autoUpdateToggle").checked = autoUpdate;
      document.getElementById("dataUsageSelect").value = dataUsage;

      if (darkMode) {
        document.body.classList.add("dark-mode");
      } else {
        document.body.classList.remove("dark-mode");
      }

      document.body.style.fontSize = fontSize + "px";
    };

    function saveSettings() {
      const darkMode = document.getElementById("darkModeToggle").checked;
      const notifications = document.getElementById("notificationsToggle").checked;
      const emailNotifications = document.getElementById("emailNotifications").checked;
      const smsNotifications = document.getElementById("smsNotifications").checked;
      const language = document.getElementById("languageSelect").value;
      const fontSize = document.getElementById("fontSize").value;
      const timezone = document.getElementById("timezoneSelect").value;
      const privacyMode = document.getElementById("privacyModeToggle").checked;
      const autoUpdate = document.getElementById("autoUpdateToggle").checked;
      const dataUsage = document.getElementById("dataUsageSelect").value;

      localStorage.setItem("darkMode", darkMode);
      localStorage.setItem("notifications", notifications);
      localStorage.setItem("emailNotifications", emailNotifications);
      localStorage.setItem("smsNotifications", smsNotifications);
      localStorage.setItem("language", language);
      localStorage.setItem("fontSize", fontSize);
      localStorage.setItem("timezone", timezone);
      localStorage.setItem("privacyMode", privacyMode);
      localStorage.setItem("autoUpdate", autoUpdate);
      localStorage.setItem("dataUsage", dataUsage);

      document.body.style.fontSize = fontSize + "px";

      if (darkMode) {
        document.body.classList.add("dark-mode");
      } else {
        document.body.classList.remove("dark-mode");
      }

      const alertMessage = document.getElementById("alertMessage");
      alertMessage.classList.remove("hidden");
      setTimeout(() => alertMessage.classList.add("hidden"), 3000);
    }
  </script>
</body>
</html>