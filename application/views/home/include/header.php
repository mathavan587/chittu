<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chittu SMM Panel - Social Media Marketing Solutions</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    body {
      font-family: 'Poppins', sans-serif;
    }
    .gradient-bg {
      background: linear-gradient(90deg, #4F46E5 0%, #7C3AED 100%);
    }
    .service-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
  </style>
  <script>
    function showLoginModal() {
      document.getElementById('loginModal').classList.remove('hidden');
    }
    
    function hideLoginModal() {
      document.getElementById('loginModal').classList.add('hidden');
    }
    
    function toggleMobileMenu() {
      const menu = document.getElementById('mobileMenu');
      if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
      } else {
        menu.classList.add('hidden');
      }
    }
  </script>
</head>


<body class="bg-gray-50 text-gray-800">
  <!-- Login Modal -->
  <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-xl p-8 max-w-md w-full mx-4">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Login to Your Account</h2>
        <button onclick="hideLoginModal()" class="text-gray-500 hover:text-gray-700">
          <i class="fas fa-times"></i>
        </button>
      </div>
      
      <form class="space-y-4">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
          <input type="email" id="email" placeholder="your@email.com" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input type="password" id="password" placeholder="••••••••" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input type="checkbox" id="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
            <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
          </div>
          <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Forgot password?</a>
        </div>
        
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition">Login</button>
      </form>
      
      <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">Don't have an account? <a href="#" class="text-indigo-600 font-medium">Sign up now</a></p>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="sticky top-0 z-40 bg-white shadow-md">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <div class="flex items-center">
          <div class="text-2xl font-bold">
            <span class="text-indigo-600 italic">Chittu</span> <span class="text-gray-700">SMM Panel</span>
          </div>
        </div>
        <div class="hidden md:block">
          <ul class="flex items-center space-x-8 font-medium">
            <li><a href="#" class="text-indigo-600 hover:text-indigo-800 transition">Home</a></li>
            <li><a href="#services" class="text-gray-600 hover:text-indigo-600 transition">Services</a></li>
            <li><a href="#why-us" class="text-gray-600 hover:text-indigo-600 transition">Why Us</a></li>
            <li><a href="#pricing" class="text-gray-600 hover:text-indigo-600 transition">Pricing</a></li>
            <li><a href="#faq" class="text-gray-600 hover:text-indigo-600 transition">FAQs</a></li>
            <li><a href="#api" class="text-gray-600 hover:text-indigo-600 transition">API</a></li>
          </ul>
        </div>
        <div class="hidden md:flex items-center space-x-4">
          <button onclick="showLoginModal()" class="px-4 py-2 text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50 transition">Login</button>
          <a href="signup.html" class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">Sign Up</a>
        </div>
        <div class="md:hidden flex items-center">
          <button onclick="toggleMobileMenu()" type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobileMenu" class="md:hidden hidden">
      <div class="px-2 pt-2 pb-4 space-y-1 bg-white shadow-md">
        <a href="#" class="block px-3 py-2 text-indigo-600 font-medium">Home</a>
        <a href="#services" class="block px-3 py-2 text-gray-700 hover:text-indigo-600 font-medium">Services</a>
        <a href="#why-us" class="block px-3 py-2 text-gray-700 hover:text-indigo-600 font-medium">Why Us</a>
        <a href="#pricing" class="block px-3 py-2 text-gray-700 hover:text-indigo-600 font-medium">Pricing</a>
        <a href="#faq" class="block px-3 py-2 text-gray-700 hover:text-indigo-600 font-medium">FAQs</a>
        <a href="#api" class="block px-3 py-2 text-gray-700 hover:text-indigo-600 font-medium">API</a>
        <div class="pt-4 flex flex-col space-y-2">
          <button onclick="showLoginModal()" class="px-3 py-2 text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50 transition text-center">Login</button>
          <a href="signup.html" class="px-3 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition text-center">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="gradient-bg text-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto max-w-7xl">
      <div class="flex flex-col md:flex-row items-center justify-between">
        <div class="max-w-2xl md:pr-10">
          <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
            Boost Your Social Media Presence With Our Premium SMM Panel
          </h1>
          <p class="text-lg mb-8 text-indigo-100">
            Manage all social media networks from a single dashboard. Quality and affordable services for Instagram, Twitter, Facebook, YouTube, TikTok, Spotify, and more.
          </p>
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="#services" class="inline-block bg-white text-indigo-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition text-center">
              Explore Services
            </a>
            <a href="#" class="inline-block bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-800 transition text-center">
              Get Started Now
            </a>
          </div>
          <div class="mt-8 flex items-center text-sm text-indigo-100">
            <div class="flex -space-x-2 mr-4">
              <img src="/api/placeholder/32/32" alt="User" class="rounded-full border-2 border-white w-8 h-8" />
              <img src="/api/placeholder/32/32" alt="User" class="rounded-full border-2 border-white w-8 h-8" />
              <img src="/api/placeholder/32/32" alt="User" class="rounded-full border-2 border-white w-8 h-8" />
            </div>
            <span>Trusted by 10,000+ marketers worldwide</span>
          </div>
        </div>
        <div class="mt-10 md:mt-0 md:ml-10 max-w-md">
          <div class="bg-white rounded-xl shadow-xl p-6">
            <div class="flex justify-center mb-6">
              <img src="/api/placeholder/80/80" alt="Dashboard Icon" class="w-20 h-20">
            </div>
            <h3 class="text-gray-800 text-xl font-semibold mb-4 text-center">Create Your Account</h3>
        <form id="userform" class="space-y-6">
    <div>
      <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
      <input type="text" name="name" id="name" placeholder="Your full name"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
      <label for="mobile" class="block text-sm font-medium text-gray-700 mb-1">Mobile Number</label>
      <input type="text" name="mobile" id="mobile" placeholder="9876543210"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
      <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
      <input type="email" name="email" id="email" placeholder="you@example.com"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
      <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
      <input type="password" name="password" id="password" placeholder="••••••••"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <button type="submit"
      class="w-full bg-indigo-600 text-white py-3 px-4 rounded-lg hover:bg-indigo-700 transition font-medium">
      Submit
    </button>
  </form>


            <p class="text-gray-500 text-xs text-center mt-4">By signing up, you agree to our Terms of Service and Privacy Policy</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  