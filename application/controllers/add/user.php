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

    <div style="width:90%; margin:auto;">

    <button id="addUserBtn" class="bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm px-4 py-2 mb-4">
        <i class="fas fa-user-plus"></i> Add User
    </button>

    <table id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>S/no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Otp</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; foreach($users as $user) { $i++; ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$user->name?></td>
                        <td><?=$user->email?></td>
                        <td><?=$user->mobile?></td>
                        <td><?=$user->otp?></td>
                        <td>
                            <mark class="px-2 text-white
                            <?php 
                            if ($user->status == 0) {
                                echo "bg-green-600";
                            } else {
                                echo "bg-red-600";
                            }
                            ?> 
                            rounded-sm dark:bg-blue-500">
                                <?=$user->usertype?>
                            </mark>
                        </td>
                        <td><?= date('d M y', strtotime($user->created_at)) ?></td>
                        <td>
                        <div class="relative inline-block text-left">
    <button id="actionDropdownButton<?=$user->id?>" data-dropdown-toggle="actionDropdown<?=$user->id?>" 
        class="inline-flex justify-center items-center rounded-md bg-blue-600 text-white px-4 py-1.5 text-sm font-medium hover:bg-blue-700 focus:outline-none">
        Actions <i class="fas fa-chevron-down ml-2"></i>
    </button>

    
</div>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    
    <div id="actionDropdown<?=$user->id?>" class="hidden z-10 absolute right-0  w-40 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
        <div class="py-1">
            <button class="edit-btn w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-id="<?=$user->id?>">
                <i class="fas fa-edit text-blue-600 mr-2"></i>Edit
            </button>
            <button 
                class="<?= $user->status == 0 ? 'block-btn' : 'unblock-btn' ?> w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                data-id="<?=$user->id?>">
                <i class="fas <?= $user->status == 0 ? 'fa-ban text-red-600' : 'fa-undo text-green-600' ?> mr-2"></i>
                <?= $user->status == 0 ? 'Block' : 'Unblock' ?>
            </button>
            <button class="delete-btn w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-id="<?=$user->id?>">
                <i class="fas fa-trash-alt text-red-600 mr-2"></i>Delete
            </button>
        </div>
    </div>
    <!-- DataTables Initialization Script -->
    <script>

$('[data-dropdown-toggle]').on('click', function () {
    const targetId = $(this).attr('data-dropdown-toggle');
    $('#' + targetId).toggleClass('hidden');
});



$('#addUserBtn').on('click', function () {
    Swal.fire({
        title: 'Add New User',
        html:
            '<input id="swal-name" class="swal2-input" placeholder="Name">' +
            '<input id="swal-email" class="swal2-input" placeholder="Email">' +
            '<input id="swal-mobile" class="swal2-input" placeholder="Mobile">' +
            '<input id="swal-otp" class="swal2-input" placeholder="OTP">' +
            '<input id="swal-password" type="password" class="swal2-input" placeholder="Password">' +
            '<select id="swal-status" class="swal2-input">' +
                '<option value="0">Active</option>' +
                '<option value="1">Inactive</option>' +
            '</select>',
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Add User',
        preConfirm: () => {
            const name = document.getElementById('swal-name').value.trim();
            const email = document.getElementById('swal-email').value.trim();
            const mobile = document.getElementById('swal-mobile').value.trim();
            const otp = document.getElementById('swal-otp').value.trim();
            const status = document.getElementById('swal-status').value;
            const password = document.getElementById('swal-password').value.trim();

if (!password) {
    Swal.showValidationMessage('Password is required.');
    return false;
}
            // Validation
            if (!name || !email || !mobile || !otp) {
                Swal.showValidationMessage('All fields are required.');
                return false;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                Swal.showValidationMessage('Please enter a valid email address.');
                return false;
            }

            const mobilePattern = /^\d{10}$/;
            if (!mobilePattern.test(mobile)) {
                Swal.showValidationMessage('Please enter a valid 10-digit mobile number.');
                return false;
            }

            return { name, email, mobile, otp, status,password };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '<?= base_url("admin/insert_user") ?>',
                type: 'POST',
                data: {
                    name: result.value.name,
                    email: result.value.email,
                    mobile: result.value.mobile,
                    otp: result.value.otp,
                    status: result.value.status,
                    password: result.value.password
                },
                success: function (response) {
console.log(response);

                    let res = JSON.parse(response);
                    if (res.success) {
                        Swal.fire('Added!', 'New user has been added.', 'success').then(() => location.reload());
                    } else {
                        Swal.fire('Error!', 'Failed to add user.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error!', 'Server error occurred.', 'error');
                }
            });
        }
    });
});




    // Edit button click
    $('.edit-btn').on('click', function() {
        var userId = $(this).data('id');

        // Fetch user data via AJAX before showing the SweetAlert form
        $.ajax({
            url: '<?= base_url("admin/get_user") ?>',
            type: 'POST',
            data: { id: userId },
            success: function(response) {
                var user = JSON.parse(response);

                Swal.fire({
                    title: 'Edit User',
                    html:
                        '<input id="swal-name" class="swal2-input" placeholder="Name" value="' + user.name + '">' +
                        '<input id="swal-email" class="swal2-input" placeholder="Email" value="' + user.email + '">' +
                        '<input id="swal-mobile" class="swal2-input" placeholder="Mobile" value="' + user.mobile + '">' +
                        '<input id="swal-otp" class="swal2-input" placeholder="OTP" value="' + user.otp + '">' +
                        '<select id="swal-status" class="swal2-input">' +
                            '<option value="0"' + (user.status == 0 ? ' selected' : '') + '>Active</option>' +
                            '<option value="1"' + (user.status == 1 ? ' selected' : '') + '>Blocked</option>' +
                        '</select>',
                    focusConfirm: false,
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    preConfirm: () => {
                        return {
                            name: document.getElementById('swal-name').value,
                            email: document.getElementById('swal-email').value,
                            mobile: document.getElementById('swal-mobile').value,
                            otp: document.getElementById('swal-otp').value,
                            status: document.getElementById('swal-status').value
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?= base_url("admin/update_user") ?>',
                            type: 'POST',
                            data: {
                                id: userId,
                                name: result.value.name,
                                email: result.value.email,
                                mobile: result.value.mobile,
                                otp: result.value.otp,
                                status: result.value.status
                            },
                            success: function(response) {
                                let res = JSON.parse(response);
                                if (res.success) {
                                    Swal.fire('Updated!', 'User details updated.', 'success').then(() => location.reload());
                                } else {
                                    Swal.fire('Error!', 'Failed to update user.', 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Error!', 'Server error occurred.', 'error');
                            }
                        });
                    }
                });
            },
            error: function() {
                Swal.fire('Error!', 'Failed to fetch user details.', 'error');
            }
        });
    });



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
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to block this user.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, block it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url("admin/block") ?>', // Update with your controller URL
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
                                    'The user has been blocked.',
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
$(document).on('click', '.delete-btn', function () {
    var userId = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'This action will permanently delete the user.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '<?= base_url("admin/delete_user") ?>',
                type: 'POST',
                data: { id: userId },
                success: function (response) {
                    let res = JSON.parse(response);
                    if (res.success) {
                        Swal.fire('Deleted!', 'User has been deleted.', 'success').then(() => location.reload());
                    } else {
                        Swal.fire('Error!', 'Failed to delete user.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error!', 'Server error occurred.', 'error');
                }
            });
        }
    });
});


        // Block button click event
        $('.unblock-btn').on('click', function() {
            var userId = $(this).data('id');  // Get user ID from button data-id
            // SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to unblock this user.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, block it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url("admin/block") ?>', // Update with your controller URL
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
                                    'The user has been blocked.',
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
    });
    </script>