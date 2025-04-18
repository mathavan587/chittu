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
                <form class="space-y-4" id="orderForm" method="post">
                    <div>
                    <label class="block text-sm font-medium text-gray-600">Category</label>
                    <select name="category" class="w-full border rounded px-3 py-2">
                    <option>Choose a category</option>
                    <?php
                    foreach($categories as $s){
                    ?>
                    <option value="<?=$s->id?>" ><?=$s->categories?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div>
                    <label class="block text-sm font-medium text-gray-600">Order Service</label>
                    <select name="service" class="w-full border rounded px-3 py-2">
                        <option>Choose a service</option>
                    </select>
                    </div>
                    <div>
                    <label class="block text-sm font-medium text-gray-600">Link</label>
                    <input type="url" placeholder="https://" class="w-full border rounded px-3 py-2" />
                    </div>
                    <div>
                    <label class="block text-sm font-medium text-gray-600">Quantity</label>
                    <input type="number" id="qty" class="w-full border rounded px-3 py-2" />




                    <label class="block text-sm font-medium text-gray-600">Amount</label>
                    <input type="text" id="Amt" class="w-full border rounded px-3 py-2" />

                    <!-- <label class="block text-sm font-medium text-gray-600">percentage</label> -->
                    <input type="hidden" id="percentage" name="percentage" class="w-full border rounded px-3 py-2" />

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
                <input type="text" id="resume-service-name" class="w-full border rounded px-3 py-2" readonly />
                </div>
                <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Minimum</label>
                    <input type="text" id="resume-min"  class="w-full border rounded px-3 py-2" readonly />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Maximum</label>
                    <input type="text" id="resume-max" class="w-full border rounded px-3 py-2" readonly />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Price/1k</label>
                    <input type="text" id="resume-price" class="w-full border rounded px-3 py-2" readonly />
                </div>
                </div>
                <div>
                <label class="block text-sm font-medium text-gray-600">Description</label>
                <textarea id="resume-desc" class="w-full border rounded px-3 py-2" rows="6" readonly></textarea>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('select[name="category"]').on('change', function() {
        var catId = $(this).val();

        $.ajax({
            url: '<?= base_url('user/getServicesByCategory') ?>',
            type: 'GET',
            data: { category_id: catId },
            dataType: 'json',
            success: function(data) {
              // console.log(data);  
                var $serviceSelect = $('select[name="service"]');
                $serviceSelect.empty().append('<option>Choose a service</option>');

                $.each(data, function(index, service) {
                    $serviceSelect.append(
                        $('<option>', {
                            value: service.id,
                            text: service.name
                        })
                    );
                });
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    });



    $('#qty').on('change', function() {
      var qty = $(this).val();
     var price = $('#resume-price').val();
     var cash = qty*price;
     cash.toFixed(2);
    //  alert(cash);

     $('#Amt').val(cash);
    
    });



    $('select[name="category"]').on('change', function() {
        var catId = $(this).val();

        $.ajax({
            url: '<?= base_url('user/getCategorypercentage') ?>',
            type: 'GET',
            data: { category_id: catId },
            dataType: 'json',
            success: function(data) {
              // console.log(data);  

            $('#percentage').val(data.percentage);

                // var $serviceSelect = $('select[name="service"]');
                // $serviceSelect.empty().append('<option>Choose a service</option>');

                // $.each(data, function(index, service) {
                //     $serviceSelect.append(
                //         $('<option>', {
                //             value: service.id,
                //             text: service.name
                //         })
                //     );
                // });
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    });

    












    $('select[name="service"]').on('change', function() {
        var catId = $(this).val();
        var percentage = $('#percentage').val();

        $.ajax({
            url: '<?= base_url('user/getServicesByservice') ?>',
            type: 'GET',
            data: { category_id: catId },
            dataType: 'json',
            success: function(data) {
              // console.log(percentage);  
              var into=data.rate*percentage/100;
             var amt = parseFloat(into) + parseFloat(data.rate);
amt = amt.toFixed(2); // returns string like "123.45"
              $('#resume-service-name').val(data.name);        // or data.service_name based on DB
            $('#resume-min').val(data.min);
            $('#resume-max').val(data.max);
            $('#resume-price').val(amt);
            $('#resume-desc').val(data.desc);
              
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    });


});





$('#orderForm').on('submit', function (e) {
  e.preventDefault();

var category = $('select[name="category"]').val();
var service = $('select[name="service"]').val();
var link = $('input[type="url"]').val();
var qty = $('#qty').val();
var amount = $('#Amt').val();

// Validation
if (!category || category === 'Choose a category') {
    return Swal.fire('Missing Field', 'Please select a category.', 'warning');
}
if (!service || service === 'Choose a service') {
    return Swal.fire('Missing Field', 'Please select a service.', 'warning');
}
if (!link || !/^https?:\/\/.+$/.test(link)) {
    return Swal.fire('Invalid Link', 'Please enter a valid URL.', 'error');
}
if (!qty || qty <= 0) {
    return Swal.fire('Invalid Quantity', 'Quantity must be greater than 0.', 'error');
}

var userId = <?= $_SESSION['user_id'] ?>;

// Razorpay payment initiation
$.ajax({
    url: '<?= base_url("user/createRazorpayOrder") ?>',
    type: 'POST',
    data: { amount: amount },
    dataType: 'json',
    success: function (data) {
        var options = {
            "key": "<?= RAZORPAY_KEY_ID ?>", // From your config
            "amount": data.amount,
            "currency": "INR",
            "name": "Chittu SMM",
            "description": "Order Payment",
            "order_id": data.rp_order_id,
            "handler": function (response) {
                // Call your controller to place the order
                $.ajax({
                    url: '<?= base_url("user/placeOrder") ?>',
                    type: 'POST',
                    data: {
                        category_id: category,
                        service_id: service,
                        link: link,
                        quantity: qty,
                        amount: amount,
                        razorpay_payment_id: response.razorpay_payment_id,
                        razorpay_order_id: response.razorpay_order_id,
                        user_id: userId
                    },
                    dataType: 'json',
                    success: function (res) {
                        Swal.fire('Success', res.message, 'success');
                        $('#orderForm')[0].reset();
                    }
                });
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    },
    error: function () {
        Swal.fire('Error', 'Could not initiate payment.', 'error');
    }
});
});

</script>

