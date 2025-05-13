<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $apimodel = new Apimodel();
                $apimodel->tablename = 'settings';
                $select=array('file_name','link');
                $condition=array('categories'=>'title');
                $link = $apimodel->getSingleData($condition,$select);
                $titleicon = $link->file_name;
               
?>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" type="image/x-icon" href="<?=base_url('uploads/'.$titleicon)?>">
<title><?=$title?></title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
  body {
    font-family: 'Poppins', sans-serif;
    scroll-behavior: smooth;
  }
  .gradient-bg {
    background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
  }
  .service-card {
    transition: all 0.3s ease;
    border-radius: 16px;
    overflow: hidden;
  }
  .service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 30px -10px rgba(79, 70, 229, 0.2);
  }
  .custom-shadow {
    box-shadow: 0 10px 30px -5px rgba(79, 70, 229, 0.15);
  }
  .nav-link {
    position: relative;
  }
  .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -4px;
    left: 0;
    background-color: #4F46E5;
    transition: width 0.3s ease;
  }
  .nav-link:hover::after {
    width: 100%;
  }
  .active-link::after {
    width: 100%;
  }
  .btn-primary {
    background: linear-gradient(to right, #4F46E5, #7C3AED);
    transition: all 0.3s ease;
  }
  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px -5px rgba(79, 70, 229, 0.4);
  }
  .btn-outline {
    transition: all 0.3s ease;
    border: 2px solid #4F46E5;
  }
  .btn-outline:hover {
    box-shadow: 0 10px 20px -5px rgba(79, 70, 229, 0.3);
  }
  .hero-shape {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 40%;
    height: 70%;
    background: rgba(124, 58, 237, 0.1);
    border-top-left-radius: 100%;
    z-index: 0;
  }
</style>
<link rel="icon" type="image/x-icon" href="<?=base_url('uploads/'.$title)?>">
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

  <!-- Login Modal -->
  <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-70 z-50 flex items-center justify-center hidden backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4 custom-shadow border border-gray-100 animate-fade-in">
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Login to Your Account</h2>
        <button onclick="hideLoginModal()" class="text-gray-500 hover:text-gray-700 transition">
          <i class="fas fa-times text-lg"></i>
        </button>
      </div>
      
      <div class="mt-8 text-center">
        <p class="text-sm text-gray-600">Don't have an account? <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800 transition">Sign up now</a></p>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="sticky top-0 z-40 bg-white shadow-md">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-20">
        <div class="flex items-center">
          <div class="text-2xl font-bold flex items-center">
            <span class="text-indigo-600 font-bold italic mr-1">Chittu</span> 
            <span class="text-gray-800">SMM Panel</span>
          </div>
        </div>
        <div class="hidden md:block">
          <ul class="flex items-center space-x-10 font-medium">
            <li><a href="<?=base_url('welcome')?>" class="nav-link active-link text-indigo-600 hover:text-indigo-800 transition">Home</a></li>
            <li><a href="<?=base_url('welcome/services')?>" class="nav-link text-gray-600 hover:text-indigo-600 transition">Services</a></li>
            <li><a href="<?=base_url('welcome/about')?>" class="nav-link text-gray-600 hover:text-indigo-600 transition">About  Us</a></li>
            <li><a href="<?=base_url('welcome/contact')?>" class="nav-link text-gray-600 hover:text-indigo-600 transition">Contact</a></li>
            <li><a href="<?=base_url('welcome/blog')?>" class="nav-link text-gray-600 hover:text-indigo-600 transition">Blog</a></li>
            <li><a href="#faq" class="nav-link text-gray-600 hover:text-indigo-600 transition">FAQs</a></li>
            <li><a href="#api" class="nav-link text-gray-600 hover:text-indigo-600 transition">API</a></li>
          </ul>
        </div>
        <div class="hidden md:flex items-center space-x-5">
          <a href="<?=base_url('login')?>" class="btn-outline px-5 py-2.5 text-indigo-600 rounded-lg hover:bg-indigo-50 transition font-medium">Login</a>
          <a href="<?=base_url('signup')?>" class="btn-primary px-5 py-2.5 text-white rounded-lg transition font-medium">Sign Up</a>
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
      <div class="px-4 py-5 pb-6 space-y-4 bg-white shadow-lg rounded-b-2xl">
        <a href="#" class="block px-4 py-3 text-indigo-600 font-medium rounded-lg bg-indigo-50">Home</a>
        <a href="#services" class="block px-4 py-3 text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 font-medium rounded-lg transition">Services</a>
        <a href="#why-us" class="block px-4 py-3 text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 font-medium rounded-lg transition">Why Us</a>
        <a href="#pricing" class="block px-4 py-3 text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 font-medium rounded-lg transition">Pricing</a>
        <a href="#faq" class="block px-4 py-3 text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 font-medium rounded-lg transition">FAQs</a>
        <a href="#api" class="block px-4 py-3 text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 font-medium rounded-lg transition">API</a>
        <div class="pt-5 flex flex-col space-y-3">
          <a href="<?=base_url('login')?>" class="px-4 py-3 text-indigo-600 border-2 border-indigo-600 rounded-lg hover:bg-indigo-50 transition text-center font-medium">Login</a>
          <a href="<?=base_url('signup')?>" class="px-4 py-3 text-white bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-lg hover:from-indigo-700 hover:to-indigo-800 transition text-center font-medium">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>