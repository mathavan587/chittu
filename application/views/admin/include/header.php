<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/heroicons@2.1.3/24/outline/heroicons.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Inter", sans-serif;
        background-color: #f3f4f6; /* Light gray background for the page */
        display: flex; /* Use flexbox for body */
        flex-direction: column; /* Stack children vertically */
        min-height: 100vh; /* Ensure body takes at least full viewport height */
      }
      /* Custom scrollbar for sidebar (optional) */
      .sidebar::-webkit-scrollbar {
        width: 4px;
      }
      .sidebar::-webkit-scrollbar-thumb {
        background-color: #4b5563; /* Darker gray for scrollbar */
        border-radius: 20px;
      }
      .sidebar::-webkit-scrollbar-track {
        background-color: #1f2937; /* Sidebar background color */
      }
      /* Adjust main content area height calculation if footer is outside main */
      .main-content-wrapper {
        display: flex;
        flex: 1; /* Allow wrapper to grow */
        overflow: hidden; /* Prevent wrapper overflow */
      }
      .main-content-area {
        flex: 1; /* Allow main content to grow */
        overflow-y: auto; /* Add scroll if content overflows */
        /* Removed fixed height calculation to allow natural flow */
      }
      /* Simple icon styling */
      .icon {
        width: 1.25rem; /* 20px */
        height: 1.25rem; /* 20px */
        margin-right: 0.75rem; /* 12px */
        display: inline-block; /* Align icon with text */
        vertical-align: middle; /* Align icon vertically */
      }
      /* Footer styling */
      .dashboard-footer {
        flex-shrink: 0; /* Prevent footer from shrinking */
        margin-left: 0; /* Default margin */
      }
      @media (min-width: 768px) {
        /* md breakpoint */
        .dashboard-footer {
          margin-left: 16rem; /* 64 * 0.25rem = 16rem, same as sidebar width */
        }
        .sidebar-open .dashboard-footer {
          margin-left: 16rem; /* Keep margin when sidebar is open */
        }
        .sidebar-closed .dashboard-footer {
          margin-left: 0; /* Remove margin when sidebar is closed (if implementing toggle) */
        }
      }
    </style>
  </head>
  <body class="bg-gray-100">
    <!-- saide nave bar start -->
    <div class="main-content-wrapper">
      <aside
        class="sidebar fixed inset-y-0 left-0 w-64 bg-gray-800 text-white p-4 space-y-6 overflow-y-auto hidden md:block shadow-lg z-20"
      >
        <a href="#" class="flex items-center space-x-2 px-2">
          <svg
            class="h-8 w-auto text-indigo-400"
            viewBox="0 0 24 24"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"
            ></path>
          </svg>
          <span class="text-2xl font-bold">Dashboard</span>
        </a>
        <nav class="space-y-2">
          <h3
            class="px-2 text-xs font-semibold text-gray-400 uppercase tracking-wider"
          >
            General
          </h3>
          <a
            href="<?=base_url('admin')?>"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group"
          >
            <svg
              class="icon"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
              />
            </svg>
            Dashboard
          </a>
          <a
            href="<?=base_url('admin/user')?>"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group"
          >
            <svg
              class="icon"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
              />
            </svg>
            User
          </a>
          <a
            href="<?=base_url('services')?>"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group"
          >
            <svg
              class="icon"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"
              />
            </svg>
            Services
          </a>
          <a
            href="<?=base_url('categories')?>"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group"
          >
            <svg
              class="icon"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
              />
            </svg>
            Categories
          </a>


          <a
            href="<?=base_url('providers')?>"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group"
          >
            <svg
              class="icon"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
              />
            </svg>
            Providers
          </a>



          <a
            href="<?=base_url('orders')?>"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white group"
          >
            <svg
              class="icon"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
              />
            </svg>
            Orders
          </a>

          
          <div class="mt-auto"> <a
            href="<?=base_url('logout')?>"
            class="flex items-center px-2 py-2 text-sm font-medium rounded-md text-red-400 hover:bg-gray-700 hover:text-red-300 group"
           >
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" /> </svg>
            Logout
           </a>
       </div>
        </nav>
      </aside>
      <!-- saide nave bar end  -->
      <div class="flex-1 flex flex-col">
          <!-- header start -->
        <header class="bg-white shadow-sm h-16 z-10 md:ml-64 flex-shrink-0">
          <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between items-center h-full">
              <div class="flex items-center">
                <button
                  id="mobile-menu-button"
                  class="md:hidden mr-4 text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                >
                  <span class="sr-only">Open sidebar</span>
                  <svg
                    class="h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                    />
                  </svg>
                </button>
                <div class="relative text-gray-600 focus-within:text-gray-800">
                  <span
                    class="absolute inset-y-0 left-0 flex items-center pl-2"
                  >
                    <!-- <svg
                      class="w-5 h-5"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                      />
                    </svg> -->
                  </span>
                  <!-- <input
                    type="search"
                    name="q"
                    class="py-2 pl-10 pr-3 block w-full rounded-md border border-gray-300 bg-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Search anything here..."
                    autocomplete="off"
                  /> -->
                </div>
              </div>

              <div class="flex items-center space-x-4">
                <button
                  class="text-gray-500 hover:text-gray-700 focus:outline-none"
                >
                  <span class="sr-only">View notifications</span>
                  <!-- <svg
                    class="h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                    />
                  </svg> -->
                </button>
                <button
                  class="text-gray-500 hover:text-gray-700 focus:outline-none"
                >
                  <span class="sr-only">User menu</span>
                  <!-- <svg
                    class="h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                    />
                  </svg> -->
                </button>
              </div>
            </div>
          </div>
        </header>
        <!-- header end -->
        <!-- body start -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 md:ml-64 main-content-area">
          <div class="container mx-auto px-6 py-8">
            <?php 
            if ($dashboard) {
            ?>
            <h1 class="text-3xl font-semibold text-gray-800"><?=$dashboard?></h1>
            <?php }  if ($path) { ?>
            <p class="mt-2 text-gray-600"><?=$path?></p>
            <?php } ?>
            <?php 
            if ($container) { ?>
            <div class="mt-8 bg-white p-6 rounded-lg shadow min-h-[300px]">
              <?php 
            }
               if ($content) {
                ?>
              <h2 class="text-xl font-semibold text-gray-700 mb-4">
               <?=$content?>
              </h2>
              <?php } ?>
              <p class="text-gray-600">