
<form id="updateServiceForm" class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg space-y-6">
    <input type="hidden" name="id" value="<?= $service->id ?>" />

    <!-- Start of Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Service ID -->
        <div>
            <label for="service_id" class="block text-lg font-medium text-gray-700">Service id</label>
            <input type="text" name="service_id" value="<?= $service->service_id ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" />
        </div>

        <!-- Service Name -->
        <div>
            <label for="name" class="block text-lg font-medium text-gray-700">Service Name</label>
            <input type="text" name="name" value="<?= $service->name ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" />
        </div>

        <!-- Percentage -->
        <div>
            <label class="block text-lg font-medium text-gray-700">Percentage</label>
            <input type="text" name="percentage" value="<?= $service->percentage ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" />
        </div>

        <!-- Category -->
        <div>
            <label class="block text-lg font-medium text-gray-700">Category</label>
            <select name="category" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                <?php foreach ($categories as $category) { ?>
                    <option <?= ($category->category == $service->category) ? 'selected' : '' ?> value="<?= $category->category ?>"><?= $category->category ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Rate -->
        <div>
            <label class="block text-lg font-medium text-gray-700">Original Rate per 1000</label>
            <input type="text" disabled name="rate" value="<?= $service->rate ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" />
        </div>

        <!-- Set Rate -->
        <div>
            <label class="block text-lg font-medium text-gray-700">Rate per 1000</label>
            <input type="text" disabled name="set_rate" value="<?= $service->set_rate ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" />
        </div>


        
        <!-- Min Order -->
        <div>
            <label class="block text-lg font-medium text-gray-700">Min Order</label>
            <input type="number" name="min" value="<?= $service->min ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" />
        </div>

        <!-- Max Order -->
        <div>
            <label class="block text-lg font-medium text-gray-700">Max Order</label>
            <input type="number" name="max" value="<?= $service->max ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" />
        </div>

        <!-- Service Type -->
        <div>
            <label class="block text-lg font-medium text-gray-700">Service Type</label>
            <input type="text" name="type" value="<?= $service->type ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" />
        </div>

        <!-- Average Time -->
        <div>
            <label class="block text-lg font-medium text-gray-700">Average Time</label>
            <input type="text" name="avg_time" value="<?= $service->avg_time ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" />
        </div>

            <!-- Average Time -->
          <!-- Average Time -->
<div>
    <label class="block text-lg font-medium text-gray-700">Provider</label>
    <input type="text" disabled value="<?=$service->cname?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" />
                </div>
            <div>
    <label class="block text-lg font-medium text-gray-700">Mode</label>
    <input type="text" disabled value="<?php
        $apimodel = new Apimodel();
        $apimodel->tablename = 'services';
        $getdata = $apimodel->getSingleData(array('manual' => $service->cname));
        echo $getdata ? 'manual' : 'api';
    ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" />
</div>
        <!-- Status -->
        <div class="md:col-span-2">
            <label class="block text-lg font-medium text-gray-700">Status</label>
            <select name="status" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                <option value="1" <?= ($service->status == 1) ? 'selected' : '' ?>>Active</option>
                <option value="0" <?= ($service->status == 0) ? 'selected' : '' ?>>Inactive</option>
            </select>
        </div>

        <!-- Description (full width) -->
        <div class="md:col-span-2">
            <label class="block text-lg font-medium text-gray-700">Description</label>
            <textarea name="desc" rows="4" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"><?= $service->desc ?></textarea>
        </div>
    </div>
    <!-- End of Grid -->

    <!-- Submit Button -->
    <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none">Update Service</button>
    </div>
</form>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function() {
        $('#updateServiceForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize(); // Serialize form data

            
            
            $.ajax({
                url: '<?= base_url('admin/update') ?>', // Controller method URL
                type: 'POST', // Method type
                data: formData, // Data to send
                success: function(response) {
                    console.log(response);
                    // SweetAlert for success
                    Swal.fire({
                        icon: 'success',
                        title: 'Service Updated!',
                        text: 'Your service details have been successfully updated.',
                        confirmButtonText: 'OK'
                    });
                },
                error: function() {
                    // SweetAlert for error
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed',
                        text: 'There was an issue updating the service. Please try again.',
                        confirmButtonText: 'Retry'
                    });
                }
            });
        });
    });



    </script>

    <script>
    $(document).ready(function () {
        function updateSetRate() {
            let rate = parseFloat($('input[name="rate"]').val());
            let percentage = parseFloat($('input[name="percentage"]').val());

            if (!isNaN(rate) && !isNaN(percentage)) {
                let setRate = rate + (rate * percentage / 100);
                $('input[name="set_rate"]').val(setRate.toFixed(2)); // Rounded to 2 decimal places
            }
        }

        // Trigger when either field changes
        $('input[name="rate"], input[name="percentage"]').on('input', updateSetRate);
    });
    </script>

