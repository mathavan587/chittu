<form id="updateServiceForm" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg space-y-6">
   

<input type="hidden" name="id"  value="<?=$categories->id?>"  required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />

    <!-- Display Rate -->
    <div>
        <label for="api" class="block text-lg font-medium text-gray-700">Categorie</label>
        <input type="text" name="categories" value="<?=$categories->categories?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
    </div>

    <!-- Minimum Quantity -->
    <div>
        <label for="min" class="block text-lg font-medium text-gray-700">Percentage</label>
        <input type="text" name="percentage" value="<?=$categories->percentage?>"  required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
    </div>


    <!-- Submit Button -->
    <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none">Import Service</button>
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
            url: '<?= base_url('editcategories') ?>', // Controller method URL
            type: 'POST', // Method type
            data: formData, // Data to send
            success: function(response) {
                console.log(response);
                // SweetAlert for success
                Swal.fire({
                    icon: 'success',
                    title: 'Categories Updated!',
                    text: 'Your Categories details have been successfully updated.',
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