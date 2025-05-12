<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.min.css">
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
                <td><?= $i ?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->mobile ?></td>
                <td><?= $user->otp ?></td>
                <td>
                    <mark class="px-2 text-white <?= $user->status == 0 ? 'bg-green-600' : 'bg-red-600' ?> rounded-sm">
                        <?= $user->usertype ?>
                    </mark>
                </td>
                <td><?= date('d M y', strtotime($user->created_at)) ?></td>
                <td>
                    <div class="relative inline-block text-left">
                        <button data-id="<?= $user->id ?>" class="toggle-dropdown inline-flex justify-center items-center rounded-md bg-blue-600 text-white px-4 py-1.5 text-sm font-medium hover:bg-blue-700 focus:outline-none">
                            Actions <i class="fas fa-chevron-down ml-2"></i>
                        </button>

                        <div id="actionDropdown<?= $user->id ?>" class="dropdown-menu hidden z-10 absolute right-0 w-40 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                <button class="edit-btn w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-id="<?= $user->id ?>">
                                    <i class="fas fa-edit text-blue-600 mr-2"></i>Edit
                                </button>
                                <button class="<?= $user->status == 0 ? 'block-btn' : 'unblock-btn' ?> w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-id="<?= $user->id ?>">
                                    <i class="fas <?= $user->status == 0 ? 'fa-ban text-red-600' : 'fa-undo text-green-600' ?> mr-2"></i>
                                    <?= $user->status == 0 ? 'Block' : 'Unblock' ?>
                                </button>
                                <button class="delete-btn w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-id="<?= $user->id ?>">
                                    <i class="fas fa-trash-alt text-red-600 mr-2"></i>Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function () {
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf', 'print'],
        responsive: true
    });

    // Toggle dropdown
    $(document).on('click', '.toggle-dropdown', function (e) {
        e.stopPropagation();
        const id = $(this).data('id');
        $('.dropdown-menu').not('#actionDropdown' + id).addClass('hidden');
        $('#actionDropdown' + id).toggleClass('hidden');
    });

    // Hide dropdowns when clicking outside
    $(document).on('click', function () {
        $('.dropdown-menu').addClass('hidden');
    });

    // Add User
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
                const name = $('#swal-name').val().trim();
                const email = $('#swal-email').val().trim();
                const mobile = $('#swal-mobile').val().trim();
                const otp = $('#swal-otp').val().trim();
                const password = $('#swal-password').val().trim();
                const status = $('#swal-status').val();

                if (!name || !email || !mobile || !otp || !password) {
                    Swal.showValidationMessage('All fields are required.');
                    return false;
                }

                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const mobilePattern = /^\d{10}$/;

                if (!emailPattern.test(email)) {
                    Swal.showValidationMessage('Invalid email format.');
                    return false;
                }

                if (!mobilePattern.test(mobile)) {
                    Swal.showValidationMessage('Mobile must be 10 digits.');
                    return false;
                }

                return { name, email, mobile, otp, password, status };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('<?= base_url("admin/insert_user") ?>', result.value, function (response) {
                    const res = JSON.parse(response);
                    if (res.success) {
                        Swal.fire('Added!', 'User added successfully.', 'success').then(() => location.reload());
                    } else {
                        Swal.fire('Error!', 'Failed to add user.', 'error');
                    }
                });
            }
        });
    });

    // Edit
    $(document).on('click', '.edit-btn', function () {
        const id = $(this).data('id');
        $.post('<?= base_url("admin/get_user") ?>', { id }, function (response) {
            const user = JSON.parse(response);
            Swal.fire({
                title: 'Edit User',
                html:
                    `<input id="swal-name" class="swal2-input" value="${user.name}">
                    <input id="swal-email" class="swal2-input" value="${user.email}">
                    <input id="swal-mobile" class="swal2-input" value="${user.mobile}">
                    <input id="swal-otp" class="swal2-input" value="${user.otp}">
                    <select id="swal-status" class="swal2-input">
                        <option value="0" ${user.status == 0 ? 'selected' : ''}>Active</option>
                        <option value="1" ${user.status == 1 ? 'selected' : ''}>Blocked</option>
                    </select>`,
                showCancelButton: true,
                confirmButtonText: 'Update',
                preConfirm: () => {
                    return {
                        name: $('#swal-name').val(),
                        email: $('#swal-email').val(),
                        mobile: $('#swal-mobile').val(),
                        otp: $('#swal-otp').val(),
                        status: $('#swal-status').val(),
                        id
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('<?= base_url("admin/update_user") ?>', result.value, function (response) {
                        const res = JSON.parse(response);
                        if (res.success) {
                            Swal.fire('Updated!', 'User updated.', 'success').then(() => location.reload());
                        } else {
                            Swal.fire('Error!', 'Update failed.', 'error');
                        }
                    });
                }
            });
        });
    });

    // Block / Unblock
    $(document).on('click', '.block-btn, .unblock-btn', function () {
        const id = $(this).data('id');
        const isBlock = $(this).hasClass('block-btn');
        Swal.fire({
            title: isBlock ? 'Block this user?' : 'Unblock this user?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: isBlock ? 'Yes, block' : 'Yes, unblock'
        }).then(result => {
            if (result.isConfirmed) {
                $.post('<?= base_url("admin/block") ?>', { id }, function (response) {
                    const res = JSON.parse(response);
                    if (res.success) {
                        Swal.fire(isBlock ? 'Blocked!' : 'Unblocked!', '', 'success').then(() => location.reload());
                    } else {
                        Swal.fire('Error!', 'Operation failed.', 'error');
                    }
                });
            }
        });
    });

    // Delete
    $(document).on('click', '.delete-btn', function () {
        const id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: 'This will permanently delete the user.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete'
        }).then(result => {
            if (result.isConfirmed) {
                $.post('<?= base_url("admin/delete_user") ?>', { id }, function (response) {
                    const res = JSON.parse(response);
                    if (res.success) {
                        Swal.fire('Deleted!', 'User removed.', 'success').then(() => location.reload());
                    } else {
                        Swal.fire('Error!', 'Could not delete user.', 'error');
                    }
                });
            }
        });
    });

});
</script>
