            <?php 
            if ($container) { ?>
               
              </p> 
               </div> 
           <?php 
              }
            ?>
          </div>
        </main>
        <!-- body end -->

        <!-- footer start -->
        <footer
          class="dashboard-footer bg-white py-4 px-6 border-t border-gray-200 flex-shrink-0"
        >
          <div class="text-center text-sm text-gray-500">
            © 2025 Chittu. All rights reserved.
          </div>
        </footer>
        <!-- footer end -->
      </div>
    </div>
    <script>
      const btn = document.getElementById("mobile-menu-button"); // Use ID selector
      const sidebar = document.querySelector(".sidebar"); // Select the sidebar

      // Check if elements exist before adding listener
      if (btn && sidebar) {
        btn.addEventListener("click", () => {
          sidebar.classList.toggle("hidden"); // Toggle the 'hidden' class on the sidebar
          // Optional: Adjust main content margin when sidebar is toggled on mobile
          // You might need more complex logic depending on exact layout needs
        });
      } else {
        console.error("Mobile menu button or sidebar not found.");
      }
    </script>
  </body>
</html>