    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chittu SMM Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    </head>
    <body class="bg-gray-50 font-sans">

    <!-- Header -->
    <header class="bg-gray-900 text-white shadow">
  <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
    
    <!-- Logo & Brand -->
    <div class="flex items-center space-x-2">
      <img src="https://chittu.in/assets/logo.png" alt="Logo" class="h-8" />
      <div>
        <p class="text-lg font-bold leading-none">Chittu</p>
        <span class="text-sm text-gray-400">SMM Panel</span>
      </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="hidden md:flex items-center space-x-6 text-sm">
      <a href="#" class="hover:text-blue-400">📊 Statistics</a>
      <a href="#" class="hover:text-blue-400">🛒 New Order</a>
      <a href="#" class="hover:text-blue-400">📦 Order</a>
      <a href="#" class="hover:text-blue-400">🧾 Services</a>
      <a href="#" class="hover:text-blue-400">🔗 API</a>
      <!-- <a href="#" class="hover:text-blue-400 relative">
        🛟 Support
        <span class="absolute -top-2 -right-3 bg-blue-500 text-white text-xs rounded-full px-1">0</span> -->
      </a>
      <a href="#" class="hover:text-blue-400">➕ Add funds</a>
      <a href="#" class="hover:text-blue-400">📃 Transaction logs</a>
    </nav>

    <!-- Right Side -->
    <div class="flex items-center space-x-3">
      <!-- Notification bell -->
      <button class="relative focus:outline-none">
        <svg class="w-6 h-6 fill-current text-white" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v2c0 .828-.672 1.5-1.5 1.5S1 10.828 1 10V8a8 8 0 0116 0v2c0 .828-.672 1.5-1.5 1.5S14 10.828 14 10V8a6 6 0 00-6-6zM6 16a2 2 0 004 0H6z"/></svg>
      </button>

      <!-- User Info -->
      <div class="flex items-center space-x-2">
        <div class="bg-gray-700 rounded-full w-8 h-8 flex items-center justify-center">
          <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.67 0 8 1.34 8 4v2H4v-2c0-2.66 5.33-4 8-4zm0-2c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
        </div>
        <div>
          <p class="text-sm font-medium">Hi! ADMIN!</p>
          <!-- <p class="text-xs text-green-400">₹0</p> -->
        </div>
      </div>
    </div>
  </div>
</header>


    <!-- Main Content -->
    <main class="max-w-5xl mx-auto mt-8 px-4">
        <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-700">New Order</h2>
            <div class="space-x-2">
            <button class="bg-blue-600 text-white px-4 py-1 rounded shadow">Single Order</button>
            <button class="bg-gray-200 text-gray-700 px-4 py-1 rounded shadow">Mass Order</button>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Add New Form -->
            <div>
            <h3 class="text-gray-700 font-semibold mb-2">🛒 Add new</h3>
            <form class="space-y-4">
                <div>
                <label class="block text-sm font-medium text-gray-600">Category</label>
                <select class="w-full border rounded px-3 py-2">
                    <option>Choose a category</option>
                </select>
                </div>
                <div>
                <label class="block text-sm font-medium text-gray-600">Order Service</label>
                <select class="w-full border rounded px-3 py-2">
                    <option>Choose a service</option>
                </select>
                </div>
                <div>
                <label class="block text-sm font-medium text-gray-600">Link</label>
                <input type="url" placeholder="https://" class="w-full border rounded px-3 py-2" />
                </div>
                <div>
                <label class="block text-sm font-medium text-gray-600">Quantity</label>
                <input type="number" class="w-full border rounded px-3 py-2" />
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow">Place Order</button>
            </form>
            </div>

            <!-- Order Resume -->
            <div>
            <h3 class="text-gray-700 font-semibold mb-2">🛍️ Order Resume</h3>
            <div class="space-y-4">
                <div>
                <label class="block text-sm font-medium text-gray-600">Service Name</label>
                <input type="text" class="w-full border rounded px-3 py-2" readonly />
                </div>
                <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Minimum</label>
                    <input type="text" class="w-full border rounded px-3 py-2" readonly />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Maximum</label>
                    <input type="text" class="w-full border rounded px-3 py-2" readonly />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Price/1k</label>
                    <input type="text" class="w-full border rounded px-3 py-2" readonly />
                </div>
                </div>
                <div>
                <label class="block text-sm font-medium text-gray-600">Description</label>
                <textarea class="w-full border rounded px-3 py-2" rows="4" readonly></textarea>
                </div>
            </div>
            </div>
        </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-gray-200 mt-16">
  <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">
    
    <!-- Brand + Language -->
    <div>
      <div class="flex items-center space-x-3 mb-4">
        <img src="https://chittu.in/assets/logo.png" alt="Logo" class="h-8" />
        <span class="text-xl font-semibold">Chittu</span>
        <span class="text-sm text-gray-400">SMM Panel</span>
      </div>
      <div>
        <select class="bg-gray-700 text-white px-2 py-1 rounded">
          <option>English</option>
          <!-- Add more languages as needed -->
        </select>
      </div>
    </div>

    <!-- Quick Links -->
    <div>
      <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
      <ul class="space-y-2">
        <li><a href="#" class="hover:text-blue-400">Home</a></li>
        <li><a href="#" class="hover:text-blue-400">Services</a></li>
        <li><a href="#" class="hover:text-blue-400">Tickets</a></li>
        <li><a href="#" class="hover:text-blue-400">Terms & Conditions</a></li>
        <li><a href="#" class="hover:text-blue-400">API Documentation</a></li>
        <li><a href="#" class="hover:text-blue-400">FAQs</a></li>
      </ul>
    </div>

    <!-- Contact Info -->
    <div>
      <h3 class="text-lg font-semibold mb-3">Contact Informations</h3>
      <p class="mb-2">Tel: <a href="tel:+917708039080" class="hover:text-blue-400">+91 77080 39080</a></p>
      <p class="mb-2">Email: <a href="mailto:info@chittu.in" class="hover:text-blue-400">info@chittu.in</a></p>
      <p>Working Hour: Mon - Sat 09 am - 06 pm</p>
    </div>
  </div>

  <!-- Bottom Line -->
  <div class="border-t border-gray-700 mt-4">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <p class="text-sm">&copy; 2025 - <span class="font-medium">Chittu.in</span></p>
      <a href="#" class="text-blue-400 hover:text-blue-600">
        <i class="fab fa-facebook text-xl"></i>
      </a>
    </div>
  </div>
</footer>

    </body>
    </html>
