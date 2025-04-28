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

<table id="myTable" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>S/no</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
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
                        <button type="button" 
                                class="
                                <?php if ($user->status==0) { echo "block-btn"; } else { echo "unblock-btn"; } ?>
                                focus:outline-none text-white
                                <?php if ($user->status==0) { echo "bg-red-700 hover:bg-red-800"; } else { echo "bg-green-700 hover:bg-green-800"; } ?>                             
                                 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 flex items-center gap-2" 
                                data-id="<?=$user->id?>">
                                <?php if ($user->status==0) {?>
                            <i class="fas fa-ban"></i>
                            <?php } else {?>
                                <i class="fas fa-undo"></i>
                                <?php } ?> 
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

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