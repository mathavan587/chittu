<!-- Include Libraries -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- DataTables Buttons Extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Edit Button -->
<div class="py-2 w-10">
    <a href="<?= base_url('import') ?>"
       class="edit-btn bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2">
        <i class="fas fa-edit"></i>
    </a>
</div>

<!-- Table -->
<table id="myTable" class="relative overflow-x-auto shadow-md sm:rounded-lg" style="width:100%">
    <thead>
        <tr>
            <th>S/no</th>
            <th>Service ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Percentage</th>
            <th>Rate</th>
            <th>Display Rate</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0; foreach($services as $service) { $i++; 
            $apimodel = new Apimodel();
            $apimodel->tablename = 'categories';
            $getdata = $apimodel->getSingleData(['id' => $service->category], ['categories', 'percentage']);
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $service->service_id ?></td>
            <td><?= $service->name ?></td>
            <td><?= $getdata->categories ?></td>
            <td><?= $getdata->percentage . '%' ?></td>
            <td><?= '₹' . $service->rate ?></td>
            <td><?= '₹' . $service->set_rate ?></td>
            <td>
                <div class="flex items-center gap-2">
                    <!-- Block / Unblock Button -->
                    <button type="button"
                        class="<?php if ($service->status) { echo "block-btn"; } else { echo "unblock-btn"; } ?>
                               focus:outline-none text-white
                               <?php echo ($service->status) ? 'bg-green-700 hover:bg-green-800' : 'bg-red-700 hover:bg-red-800'; ?>
                               focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
                        data-id="<?= $service->id ?>">
                        <?php if ($service->status) { ?>
                            <i class="fas fa-check-circle"></i>
                            <?php } else { ?>
                                <i class="fas fa-ban"></i>
                        <?php } ?>
                    </button>

                    <!-- Edit Button -->
                    <a href="<?= base_url('edit/service/' . $service->id) ?>"
                       class="edit-btn bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete Button -->
                    <button type="button"
                        class="delete-btn bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
                        data-id="<?= $service->id ?>">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<!-- jQuery Code -->
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf', 'print'],
        responsive: true
    });

    // Function for block/unblock
    function updateStatus(userId, action) {
        let actionText = action === 'block' ? 'Inactive' : 'Active';
        let successTitle = action === 'block' ? 'Blocked!' : 'Activated!';
        let successMessage = action === 'block' ? 'The service has been Inactivated.' : 'The service has been Activated.';

        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to ${actionText} this service.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: `Yes, ${actionText} it!`,
            cancelButtonText: 'No, cancel!',
            reverseButtons: true 
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url("status") ?>',
                    type: 'POST',
                    data: { id: userId },
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.success) {
                            Swal.fire(successTitle, successMessage, 'success')
                            .then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error!', res.message || 'Failed to update status.', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error!', 'There was an error processing your request.', 'error');
                    }
                });
            }
        });
    }

    // Block Button Click
    $(document).on('click', '.block-btn', function() {
        var userId = $(this).data('id');
        updateStatus(userId, 'block');
    });

    // Unblock Button Click
    $(document).on('click', '.unblock-btn', function() {
        var userId = $(this).data('id');
        updateStatus(userId, 'unblock');
    });

    // Delete Button Click
    $(document).on('click', '.delete-btn', function() {
        var serviceId = $(this).data('id');

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
                    url: '<?= base_url("delete") ?>',
                    type: 'POST',
                    data: { id: serviceId },
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.success) {
                            Swal.fire('Deleted!', 'The service has been deleted.', 'success')
                            .then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error!', res.message || 'Failed to delete service.', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });
});
</script>
