<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
  <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-6 md:p-8">

    <!-- Success Alert -->
    <div id="successAlert" class="hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 flex items-center justify-between">
      <div>
        <span class="font-bold">Success!</span>
        <span class="block sm:inline">Your account has been created.</span>
      </div>
      <button type="button" class="close-alert text-green-700">
        <i class="fas fa-times"></i>
      </button>
    </div>

    <!-- Error Alert -->
    <div id="errorAlert" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 flex items-center justify-between">
      <div>
        <span class="font-bold">Error!</span>
        <span class="block sm:inline" id="errorMessage">Failed to submit form. Please try again later.</span>
      </div>
      <button type="button" class="close-alert text-red-700">
        <i class="fas fa-times"></i>
      </button>
    </div>

<!-- Warning Alert -->
<div id="warningAlert" class="hidden bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6 flex items-center justify-between">
  <div>
    <span class="font-bold">Warning!</span>
    <span class="block sm:inline" id="warningMessage">Something went wrong.</span>
  </div>
  <button type="button" class="close-alert text-yellow-700">
    <i class="fas fa-times"></i>
  </button>
</div>

    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6"><?=$carde_title?></h2>

    <form id="userform" method="POST" class="space-y-6">
      <!-- Username Field -->
      <div class="space-y-1">
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-indigo-500">
            <i class="fas fa-user"></i>
          </span>
          <input type="text" name="name" id="name" placeholder="Username (no spaces)"
            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
        </div>
        <div id="nameError" class="text-xs text-red-500 mt-1 hidden"></div>
      </div>

      <!-- Mobile Field -->
      <div class="space-y-1">
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-indigo-500">
            <i class="fas fa-mobile-alt"></i>
          </span>
          <input type="tel" name="mobile" id="mobile" placeholder="9876543210"
            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
        </div>
        <div id="mobileError" class="text-xs text-red-500 mt-1 hidden"></div>
      </div>

      <!-- Email Field -->
      <div class="space-y-1">
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-indigo-500">
            <i class="fas fa-envelope"></i>
          </span>
          <input type="email" name="email" id="email" placeholder="you@example.com"
            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
        </div>
        <div id="emailError" class="text-xs text-red-500 mt-1 hidden"></div>
      </div>

      <!-- Password Field -->
      <div class="space-y-1">
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-indigo-500">
            <i class="fas fa-lock"></i>
          </span>
          <input type="password" name="password" id="password" placeholder="••••••••"
            class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
          <button type="button" id="togglePassword"
            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-600 hover:text-gray-800">
            <i id="passwordIcon" class="fas fa-eye"></i>
          </button>
        </div>
        <div id="passwordError" class="text-xs text-red-500 mt-1 hidden"></div>
      </div>

      <!-- Submit Buttons -->
      <button type="submit" id="submitBtn"
        class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 text-white py-3 px-4 rounded-lg font-medium hover:shadow-lg transition">
        Create Account
      </button>

      <button type="button" id="submittingBtn" class="hidden w-full bg-indigo-600 text-white py-3 px-4 rounded-lg font-medium opacity-70 cursor-not-allowed">
        <span class="flex items-center justify-center">
          <svg class="animate-spin mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
          </svg>
          Submitting...
        </span>
      </button>

      <!-- Login Redirect -->
      <p class="text-center text-gray-600 text-sm mt-6">
        Already have an account? <a href="<?=base_url('login')?>" class="text-indigo-600 hover:text-indigo-800 font-medium">Log in</a>
      </p>
    </form>
  </div>

 
</body>
</html>

 <!-- Scripts -->
 <script>
    $(document).ready(function () {
      // Password toggle
      $('#togglePassword').click(function () {
        const input = $('#password');
        const icon = $('#passwordIcon');
        if (input.attr('type') === 'password') {
          input.attr('type', 'text');
          icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
          input.attr('type', 'password');
          icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
      });

      // Close alerts
      $('.close-alert').click(function () {
        $(this).closest('div').addClass('hidden');
      });

      // Validation
      function validateForm() {
        let isValid = true;

        $('#nameError, #emailError, #mobileError, #passwordError').addClass('hidden').text('');
        $('input').removeClass('border-red-500');

        const name = $('#name').val().trim();
        if (!name) {
          $('#nameError').text('Username is required').removeClass('hidden');
          $('#name').addClass('border-red-500');
          isValid = false;
        } else if (name.includes(' ')) {
          $('#nameError').text('Username cannot contain spaces').removeClass('hidden');
          $('#name').addClass('border-red-500');
          isValid = false;
        }

        const email = $('#email').val();
        if (!email || !/^\S+@\S+\.\S+$/.test(email)) {
          $('#emailError').text('Please enter a valid email').removeClass('hidden');
          $('#email').addClass('border-red-500');
          isValid = false;
        }

        const mobile = $('#mobile').val();
        if (!/^\d{10}$/.test(mobile)) {
          $('#mobileError').text('Enter a valid 10-digit number').removeClass('hidden');
          $('#mobile').addClass('border-red-500');
          isValid = false;
        }

        const password = $('#password').val();
        if (password.length < 8) {
          $('#passwordError').text('Password must be at least 8 characters').removeClass('hidden');
          $('#password').addClass('border-red-500');
          isValid = false;
        }

        return isValid;
      }

      // Submit
      $('#userform').submit(function (e) {
        e.preventDefault();

        if (!validateForm()) {
          return;
        }

        $('#submitBtn').addClass('hidden');
        $('#submittingBtn').removeClass('hidden');
        $('#successAlert, #errorAlert').addClass('hidden');

        const formData = {
          name: $('#name').val().trim(),
          mobile: $('#mobile').val(),
          email: $('#email').val(),
          password: $('#password').val()
        };
    // console.log(formData);
    

        $.ajax({
          url: '<?=base_url('register')?>',
          type: 'POST',
        //   contentType: 'application/json',
          data: JSON.stringify(formData),
          success: function (response) {
            console.log(response);
            if (response == 0) {

                $('#warningMessage').text('Account already exists.');
    $('#warningAlert').removeClass('hidden');
    $('#userform')[0].reset();
    $('#submitBtn').removeClass('hidden');
    $('#submittingBtn').addClass('hidden');

                //1   

} else {

    $('#successAlert').removeClass('hidden');
    $('#userform')[0].reset();
    $('#submitBtn').removeClass('hidden');
    $('#submittingBtn').addClass('hidden');
}

          },
          error: function () {
            $('#errorMessage').text('Failed to submit form. Please try again later.');
            $('#errorAlert').removeClass('hidden');
            $('#submitBtn').removeClass('hidden');
            $('#submittingBtn').addClass('hidden');
          }
        });
      });
    });

      // Simulated response for demo/testing
    //   $.ajaxPrefilter(function (options) {
    //     if (options.url === '<?=base_url('register')?>') {
    //       setTimeout(() => {
    //         if (Math.random() > 0.1) {
    //           options.success({ message: 'Registration successful!' }, 'success');
    //         } else {
    //           options.error(null, 'error', 'Server error');
    //         }
    //       }, 1000);
    //       return false;
    //     }
    //   });
    // });
  </script>
