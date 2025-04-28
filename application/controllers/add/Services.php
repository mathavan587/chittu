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

    <a href="<?=base_url('import')?>"
    class="edit-btn   bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2">
    <i class="fas fa-edit"></i>
</a>
</div>

<table id="myTable" class="relative overflow-x-auto shadow-md sm:rounded-lg" style="width:100%">
        <thead>
            <tr>
                <th>S/no</th>
                <th>Service id</th>
                <th>Name</th>
                <th>Category</th>
                <th>Percentage</th>
                <th>Rate</th>
                <th>Display Rate</th>
                <!-- <th>Status</th> -->
                <!-- <th>Date</th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 0; foreach($services as $service) { $i++; 

                $apimodel = new Apimodel();
                $apimodel->tablename = 'categories';
                $getdata = $apimodel->getSingleData(array('id' => $service->category),array('categories','percentage'));
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$service->service_id?></td>
                    <td><?=$service->name?></td>
                    <td><?=$getdata->categories	?></td>
                    <td><?=$getdata->percentage.'%'?></td>
                    <td><?='₹'.$service->rate?></td>
                    <td><?='₹'.$service->set_rate?></td>
                    <!-- <td>
                        <mark class="px-2 text-white
                        <?php 
                        if ($service->status == 0) {
                            echo "bg-green-600";
                        } else {
                            echo "bg-red-600";
                        }
                        ?> 
                        rounded-sm dark:bg-blue-500">
                            <?=$user->usertype?>
                        </mark>
                    </td> -->
                    <!-- <td><?= date('d M y', strtotime($service->created_at)) ?></td> -->
                    <td>
    <div class="flex items-center gap-2">
        <!-- Block / Unblock Button -->
        <button type="button"
            class="
                <?php if ($service->status == 0) { echo "block-btn"; } else { echo "unblock-btn"; } ?>
                focus:outline-none text-white
                <?php 
                if ($service->status == 0) { 
                    echo "bg-red-700 hover:bg-red-800"; 
                } else { 
                    echo "bg-green-700 hover:bg-green-800"; 
                } 
                ?>
                focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2
            "
            data-id="<?=$service->id?>">
            <?php if ($service->status == 0) { ?>
                <i class="fas fa-ban"></i>
            <?php } else { ?>
                <i class="fas fa-check-circle"></i> 
            <?php } ?>
        </button>

        <!-- Edit Button -->
        <a href="<?=base_url('edit/service/'.$service->id)?>"
    class="edit-btn bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2">
    <i class="fas fa-edit"></i>
</a>
    

<!-- Delete Button -->
<button type="button"
    class="delete-btn bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
    data-id="<?=$service->id?>">
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
                url: '<?= base_url("delete") ?>', // Your delete URL
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




});






</script>
