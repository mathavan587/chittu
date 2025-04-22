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
        <!-- <select class="bg-gray-700 text-white px-2 py-1 rounded">
          <option>English</option>
          <!-- Add more languages as needed -->
        <!-- </select> -->
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




// $('#orderForm').on('submit', function (e) {
//     e.preventDefault(); // stop default form submission

//     // Grab the values
//     var category = $('select[name="category"]').val();
//     var service = $('select[name="service"]').val();
//     var link = $('input[type="url"]').val();
//     var qty = $('#qty').val();
//     var amount = $('#Amt').val();
 

//     // alert(category);

//     // Validation
//     if (!category || category === 'Choose a category') {
//         return Swal.fire('Missing Field', 'Please select a category.', 'warning');
//     }
//     if (!service || service === 'Choose a service') {
//         return Swal.fire('Missing Field', 'Please select a service.', 'warning');
//     }
//     if (!link || !/^https?:\/\/.+$/.test(link)) {
//         return Swal.fire('Invalid Link', 'Please enter a valid URL.', 'error');
//     }
//     if (!qty || qty <= 0) {
//         return Swal.fire('Invalid Quantity', 'Quantity must be greater than 0.', 'error');
//     }

    // // Create post data
    // var postData = {
    //     category_id: category,
    //     service_id: service,
    //     link: link,
    //     quantity: qty,
    //     amount: amount
    // };

    // // AJAX POST
    // $.ajax({
    //     url: '<?= base_url("user/placeOrder") ?>',
    //     type: 'POST',
    //     data: postData,
    //     // dataType: 'json',
    //     success: function (response) {
    //       console.log(response);
    //       window.location.href = "<?= base_url("user/placeOrder") ?>";   
    //         if (response.status === 'success') {
    //             Swal.fire('Success', response.message, 'success').then(() => {
    //                 $('#orderForm')[0].reset();
                  
    //                 $('#resume-service-name, #resume-min, #resume-max, #resume-price, #resume-desc').val('');
    //                 $('#Amt').val('');
    //             });
    //         } else {
    //             Swal.fire('Error', response.message, 'error');
    //         }
    //     }
    //     // ,
    //     // error: function () {
    //     //     Swal.fire('Error', 'Something went wrong on the server.', 'error');
    //     // }
    // });
// });



</script>