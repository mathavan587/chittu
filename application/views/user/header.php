<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chittu SMM Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  
  </head>
    <body class="bg-gray-50 font-sans">

    <!-- Header
    <header class="bg-gray-900 text-white shadow">
  <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
    
    <!-- Logo & Brand -->
    <!-- <div class="flex items-center space-x-2">
      <img src="https://chittu.in/assets/logo.png" alt="Logo" class="h-8" />
      <div>
        <p class="text-lg font-bold leading-none">Chittu</p>
        <span class="text-sm text-gray-400">SMM Panel</span>
      </div>
    </div> -->

    <!-- Navigation Menu -->
    <!-- <nav class="hidden md:flex items-center space-x-6 text-sm">
      <a href="#" class="hover:text-blue-400">📊 Statistics</a>
      <a href="<?=base_url('user')?>" class="hover:text-blue-400">🛒 New Order</a> -->
      <!-- <a href="#" class="hover:text-blue-400">📦 Order</a> -->
      <!-- <a href="#" class="hover:text-blue-400">🧾 Services</a> -->
      <!-- <a href="#" class="hover:text-blue-400">🔗 API</a> -->
      <!-- <a href="#" class="hover:text-blue-400 relative">
        🛟 Support
        <span class="absolute -top-2 -right-3 bg-blue-500 text-white text-xs rounded-full px-1">0</span> -->
      <!-- </a> -->
      <!-- <a href="#" class="hover:text-blue-400">➕ Add funds</a> -->
      <!-- <a href="<?=base_url('transaction')?>" class="hover:text-blue-400">📃 Transaction logs</a>
    </nav> -->

    <!-- Right Side -->
    <!-- <div class="flex items-center space-x-3"> -->
      <!-- Notification bell -->
      <!-- <button class="relative focus:outline-none">
        <svg class="w-6 h-6 fill-current text-white" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v2c0 .828-.672 1.5-1.5 1.5S1 10.828 1 10V8a8 8 0 0116 0v2c0 .828-.672 1.5-1.5 1.5S14 10.828 14 10V8a6 6 0 00-6-6zM6 16a2 2 0 004 0H6z"/></svg>
      </button> -->

      <!-- User Info -->
      <!-- <div class="flex items-center space-x-2">
        <div class="bg-gray-700 rounded-full w-8 h-8 flex items-center justify-center">
          <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.67 0 8 1.34 8 4v2H4v-2c0-2.66 5.33-4 8-4zm0-2c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
        </div>
        <div> -->
          <!-- <p class="text-sm font-medium">Hi! ADMIN!</p> -->
          <!-- <p class="text-xs text-green-400">₹0</p> -->
        <!-- </div>
      </div>
    </div>
  </div>
</header> -->


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
      <a href="<?=base_url('user')?>" class="hover:text-blue-400">🛒 New Order</a>
      <a href="<?=base_url('transaction')?>" class="hover:text-blue-400">📃 Transaction logs</a>
    </nav>

    <!-- Right Side -->
    <div class="flex items-center space-x-4">
      <!-- Notification bell -->
      <!-- <button class="relative focus:outline-none">
        <svg class="w-6 h-6 fill-current text-white" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v2c0 .828-.672 1.5-1.5 1.5S1 10.828 1 10V8a8 8 0 0116 0v2c0 .828-.672 1.5-1.5 1.5S14 10.828 14 10V8a6 6 0 00-6-6zM6 16a2 2 0 004 0H6z"/></svg>
      </button> -->

      <!-- User Info -->
      <div class="flex items-center space-x-2">
        <!-- <div class="bg-gray-700 rounded-full w-8 h-8 flex items-center justify-center"> -->
          <!-- <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.67 0 8 1.34 8 4v2H4v-2c0-2.66 5.33-4 8-4zm0-2c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg> -->
        <!-- </div> -->
        <div>
          <!-- <p class="text-sm font-medium">Hi! ADMIN!</p> -->
        </div>
      </div>
      
      <!-- Logout Button -->
      <a href="<?=base_url('logout')?>" class="text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition">
        🚪 Logout
      </a>
    </div>
  </div>
</header>

