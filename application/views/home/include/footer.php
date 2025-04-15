  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto max-w-7xl">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <div class="text-2xl font-bold mb-4">
            <span class="italic">Chittu</span> <span class="text-gray-300">SMM Panel</span>
          </div>
          <p class="text-gray-400 mb-4">The best solution for all your social media marketing needs.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
            <li><a href="#services" class="text-gray-400 hover:text-white">Services</a></li>
            <li><a href="#pricing" class="text-gray-400 hover:text-white">Pricing</a></li>
            <li><a href="#faq" class="text-gray-400 hover:text-white">FAQs</a></li>
            <li><a href="#api" class="text-gray-400 hover:text-white">API Documentation</a></li>
          </ul>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4">Services</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white">Instagram Services</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">YouTube Services</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">TikTok Services</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Facebook Services</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Twitter Services</a></li>
          </ul>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
          <ul class="space-y-2">
            <li class="flex items-start">
              <i class="fas fa-envelope text-indigo-400 mt-1 mr-3"></i>
              <span class="text-gray-400">support@chittupanel.com</span>
            </li>
            <li class="flex items-start">
              <i class="fas fa-phone-alt text-indigo-400 mt-1 mr-3"></i>
              <span class="text-gray-400">+1 (800) 123-4567</span>
            </li>
            <li class="flex items-start">
              <i class="fas fa-map-marker-alt text-indigo-400 mt-1 mr-3"></i>
              <span class="text-gray-400">123 Social Media St, Digital City</span>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="mt-12 pt-8 border-t border-gray-700 text-center text-gray-400 text-sm">
        <p>&copy; 2025 Chittu SMM Panel. All rights reserved.</p>
      </div>
    </div>
  </footer>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  Swal.fire('Validation Error', 'Name is required', 'warning');
  $('#userform').on('submit', function (e) {
    e.preventDefault();
    // Get values
    let name = $('#name').val().trim();
    let mobile = $('#mobile').val().trim();
    let email = $('#email').val().trim();
    let password = $('#password').val();

    // Client-side validation
    if (name === '') {
      return Swal.fire('Validation Error', 'Name is required', 'warning');
    }
    if (!/^\d{10}$/.test(mobile)) {
      return Swal.fire('Validation Error', 'Enter a valid 10-digit mobile number', 'warning');
    }
    if (!/^\S+@\S+\.\S+$/.test(email)) {
      return Swal.fire('Validation Error', 'Enter a valid email address', 'warning');
    }
    if (password.length < 6) {
      return Swal.fire('Validation Error', 'Password must be at least 6 characters', 'warning');
    }

    // AJAX call
    $.ajax({
      type: 'POST',
      url: '<?= base_url("register") ?>', // Replace with your endpoint
      data: {
        name: name,
        mobile: mobile,
        email: email,
        password: password
      },
      dataType: 'json',
      beforeSend: function () {
        Swal.showLoading();
      },
      success: function (response) {
        Swal.close();
        if (response.status === true) {
          Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: response.message,
          });
          $('#userform')[0].reset();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: response.message,
          });
        }
      },
      error: function () {
        Swal.close();
        Swal.fire('Error', 'Something went wrong on server', 'error');
      }
    });
  });
</script>
</body>
</html>
  

