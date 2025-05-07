

<form id="updateServiceForm" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg space-y-6">
    <input type="hidden" name="id" value="<?= $service->id ?>" />

    <!-- Service ID -->
    <div>
        <label for="service_id" class="block text-lg font-medium text-gray-700">Service id</label>
        <input type="text" name="service_id" value="<?= $service->service_id ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
    </div>
    
    


      <!-- Service Name -->
      <div>
        <label for="name" class="block text-lg font-medium text-gray-700">Service Name</label>
        <input type="text" name="name" value="<?= $service->name ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
        <!-- <select name="" id=""></select> -->
    </div>


    <!-- Service Percentage -->
    <div>
        <label for="name" class="block text-lg font-medium text-gray-700">Percentage</label>
        <input type="text" name="percentage" value="<?= $service->percentage ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
        <!-- <select name="" id=""></select> -->
    </div>



     <!-- Service Select -->
     <div>
 
        <label for="name" class="block text-lg font-medium text-gray-700">Category</label>
        <!-- <input type="text" name="percentage" value="<?= $service->percentage ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" /> -->
        <select name="category" id="category" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
        <?php foreach ($categories as $category) { ?>

        <option
        
        <?php if($category->category == $service->category) { ?> selected <?php } ?>
        
        value="<?=$category->category?>"><?=$category->category?></option>
<?php } ?>
    </select>
    </div>


    <!-- Rate -->
    <div>
        <label for="rate" class="block text-lg font-medium text-gray-700">Rate</label>
        <input type="text" name="rate" value="<?= $service->rate ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
    </div>

    <!-- Display Rate -->
    <div>
        <label for="set_rate" class="block text-lg font-medium text-gray-700">Display Rate</label>
        <input type="text" name="set_rate" value="<?= $service->set_rate ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
    </div>

    <!-- Minimum Quantity -->
    <div>
        <label for="min" class="block text-lg font-medium text-gray-700">Minimum Quantity</label>
        <input type="number" name="min" value="<?= $service->min ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
    </div>

    <!-- Maximum Quantity -->
    <div>
        <label for="max" class="block text-lg font-medium text-gray-700">Maximum Quantity</label>
        <input type="number" name="max" value="<?= $service->max ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
    </div>

    <!-- Service Type -->
    <div>
        <label for="type" class="block text-lg font-medium text-gray-700">Service Type</label>
        <input type="text" name="type" value="<?= $service->type ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
    </div>

    <!-- Description -->
    <div>
        <label for="desc" class="block text-lg font-medium text-gray-700">Description</label>
        <textarea name="desc" rows="4" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"><?= $service->desc ?></textarea>
    </div>

    
    <!-- Description -->
    <div>
        <label for="desc" class="block text-lg font-medium text-gray-700">	
        Average Time</label>
        <input type="text" name="avg_time" value="<?= $service->avg_time ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />

        <!-- <textarea name="avg_time" rows="4" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"><?= $service->avg_time ?></textarea> -->
    </div>

    <!-- Status -->
    <div>
        <label for="status" class="block text-lg font-medium text-gray-700">Status</label>
        <select name="status" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option value="1" <?= ($service->status == 1) ? 'selected' : '' ?>>Active</option>
            <option value="0" <?= ($service->status == 0) ? 'selected' : '' ?>>Inactive</option>
        </select>
    </div>

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
