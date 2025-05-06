<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- DataTables Buttons extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.min.css">

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.min.js"></script>
     <!-- Edit Button -->
    
<div class="py-2 w-10">

<button id="add-category-btn"
    class="mb-4 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg text-sm px-4 py-2">
    <i class="fas fa-plus"></i> 
</button>

    
    
</div>

<table id="myTable" class="relative overflow-x-auto shadow-md sm:rounded-lg" style="width:100%">
        <thead>
            <tr>
                <th>S/no</th>
                <th>Category</th>
                <!-- <th>Percentage</th> -->
                <!-- <th>Status</th> -->
                <!-- <th></th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 0; foreach($categories as $categorie) { $i++; 
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$categorie->category?></td>
                
                <td>
                <div class="flex items-center gap-2">
    
    

<button type="button"
    class="edit-btn bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
    data-oldcategory="<?=$categorie->category  ?>"
    data-category="<?= $categorie->category ?>">
    <i class="fas fa-edit"></i>
</button>

<button type="button"
    class="delete-btn1 bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
    data-id="<?=$categorie->category?>">
    <i class="fas fa-trash"></i>
</button>

</div>
</td>




                </tr>
            <?php } ?>
        </tbody>
    </table>

<!-- DataTables Initialization Script -->
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf', 'print'],
        responsive: true
    });

    // Block button click event
    $('.block-btn').on('click', function() {
        var userId = $(this).data('id');  // Get user ID from button data-id
        // SweetAlert confirmation
        // alert(userId);
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to Inactive this user.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Inactive it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url("status") ?>', // Update with your controller URL
                    type: 'POST',
                    data: {
                        id: userId
                    },
                    success: function(response) {
                        // console.log(response);
                        var res = JSON.parse(response);
                        
                        if (res.success) {
                            // Show success SweetAlert
                            Swal.fire(
                                'Blocked!',
                                'The user has been Disactived.',
                                'success'
                            ).then(() => {
                                location.reload(); // Reload the page to reflect changes
                            });
                        } else {
                            // Show error SweetAlert
                            Swal.fire(
                                'Error!',
                                'Failed to block the user. Please try again.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'There was an error processing your request.',
                            'error'
                        );
                    }
                });
            }
        });
    });



    // Block button click event
    $('.unblock-btn').on('click', function() {
        var userId = $(this).data('id');  // Get user ID from button data-id
        // SweetAlert confirmation
        // alert(userId);
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to Active this user.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, block it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url("status") ?>', // Update with your controller URL
                    type: 'POST',
                    data: {
                        id: userId
                    },
                    success: function(response) {
                        // console.log(response);
                        var res = JSON.parse(response);
                        
                        if (res.success) {
                            // Show success SweetAlert
                            Swal.fire(
                                'Blocked!',
                                'The user has been Actived.',
                                'success'
                            ).then(() => {
                                location.reload(); // Reload the page to reflect changes
                            });
                        } else {
                            // Show error SweetAlert
                            Swal.fire(
                                'Error!',
                                'Failed to block the user. Please try again.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'There was an error processing your request.',
                            'error'
                        );
                    }
                });
            }
        });
    });



// Delete button click event
$('.delete-btn').on('click', function() {
    var serviceId = $(this).data('id');  // Get service ID
alert(serviceId);
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '<?= base_url("categorie/delete") ?>', // Your delete URL
                type: 'POST',
                data: { id: serviceId },
                success: function(response) {
                    var res = JSON.parse(response);
                    
                    if (res.success) {
                        Swal.fire(
                            'Deleted!',
                            'The service has been deleted.',
                            'success'
                        ).then(() => {
                            location.reload(); // Reload the table after delete
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            res.message || 'Failed to delete the service. Please try again.',
                            'error'
                        );
                    }
                },
                error: function() {
                    Swal.fire(
                        'Error!',
                        'Something went wrong while deleting.',
                        'error'
                    );
                }
            });
        }
    });
});



$('.edit-btn').on('click', function () {
    const oldcategory = $(this).data('oldcategory');
    const currentCategory = $(this).data('category');

    Swal.fire({
        title: 'Edit Category',
        html:
            `<input id="swal-category-oldcategory" type="hidden" value="${oldcategory}">` +
            `<input id="swal-category" class="swal2-input" value="${currentCategory}" placeholder="Category Name">`,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Save',
        preConfirm: () => {
            const category = document.getElementById('swal-category').value;
            if (!category) {
                Swal.showValidationMessage('Category name is required');
                return false;
            }
            return { oldcategory: oldcategory, category: category };
        }
    }).then((result) => {
        if (result.isConfirmed && result.value) {
            // Perform AJAX update
            $.ajax({
                url: '<?= base_url("admin/categoryupdate") ?>',
                type: 'POST',
                data: result.value,
                success: function (response) {
                    console.log(response);
                    
                    const res = JSON.parse(response);
                    if (res.success) {
                        Swal.fire('Updated!', 'Category updated successfully.', 'success')
                            .then(() => {
                                location.reload();
                            });
                    } else {
                        Swal.fire('Error!', res.message || 'Update failed.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error!', 'Something went wrong during update.', 'error');
                }
            });
        }
    });
});



});



$('.delete-btn1').on('click', function() {
    var category = $(this).data('id');
    alert(category);
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '<?= base_url("admin/categorycreate") ?>',
                type: 'POST',
                data: { category: category },
                success: function(response) {
                    console.log("THE categories_delete "+response);
                    
                    // var res = JSON.parse(response);
                    // if (res.success) {
                    //     Swal.fire('Deleted!', 'The category has been deleted.', 'success')
                    //         .then(() => {
                    //             location.reload();
                    //         });
                    // } else {
                    //     Swal.fire('Error!', res.message || 'Failed to delete the category.', 'error');
                    // }
                }
            });
        }
    });
});



$('#add-category-btn').on('click', function () {
    Swal.fire({
        title: 'Add New Category',
        html: `<input id="swal-new-category" class="swal2-input" placeholder="Category Name">`,
        showCancelButton: true,
        confirmButtonText: 'Add',
        preConfirm: () => {
            const category = document.getElementById('swal-new-category').value;
            if (!category) {
                Swal.showValidationMessage('Category name is required');
                return false;
            }
            return { category: category };
        }
    }).then((result) => {
        if (result.isConfirmed && result.value) {
            $.ajax({
                url: '<?= base_url("admin/categorycreate") ?>', // Adjust URL to match your controller
                type: 'POST',
                data: result.value,
                success: function (response) {
                    const res = JSON.parse(response);
                    if (res.success) {
                        Swal.fire('Added!', 'Category added successfully.', 'success')
                            .then(() => location.reload());
                    } else {
                        Swal.fire('Error!', res.message || 'Add failed.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error!', 'Something went wrong while adding.', 'error');
                }
            });
        }
    });
});



</script>
