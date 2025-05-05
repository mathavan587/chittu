
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS & JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons Extension -->
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="p-6 bg-gray-100">

    <!-- Navigation Tabs -->
    <div class="mb-6 border-b border-gray-200">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
            <li class="me-2">
                <a href="#all-services"
                   class="tab-link inline-block p-4 border-b-2 border-blue-600 text-blue-600"
                   data-tab="all-services">All Services</a>
            </li>
            <li class="me-2">
                <a href="#inactive-services"
                   class="tab-link inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300"
                   data-tab="inactive-services">Import SMM Services</a>
            </li>
            <!-- <li class="me-2">
                <a href="#settings"
                   class="tab-link inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300"
                   data-tab="settings">rovider</a>
            </li> -->
        </ul>
    </div>

    <!-- Tab Content: All Services -->
    <div id="all-services" class="tab-content">
        <!-- Import Button -->
        
        <!-- <div class="py-2 w-10 mb-4">
            <a href="<?= base_url('import') ?>"
               class="bg-blue-700 text-center  hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2">
                <i class="fas fa-upload"></i>
            </a>
        </div> -->

        <!-- Services Table -->
        <table id="myTable" class="w-full text-sm text-left text-gray-700 bg-white shadow-md sm:rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                    <td><?= $service->category ?></td>
                    <td><?= $service->percentage . '%' ?></td>
                    <td><?= '₹' . $service->rate ?></td>
                    <td><?= '₹' . $service->set_rate ?></td>
                    <td>
                        <div class="flex items-center gap-2">
                            <button type="button"
                                class="<?= $service->status ? 'block-btn bg-green-700 hover:bg-green-800' : 'unblock-btn bg-red-700 hover:bg-red-800' ?>
                                       text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
                                data-id="<?= $service->id ?>">
                                <i class="<?= $service->status ? 'fas fa-check-circle' : 'fas fa-ban' ?>"></i>
                            </button>

                            <a href="<?= base_url('edit/service/' . $service->id) ?>"
                               class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2">
                                <i class="fas fa-edit"></i>
                            </a>

                            <button type="button"
                                class="delete-btn bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
                                data-id="<?= $service->id ?>">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Tab Content: Inactive Services -->
    <div id="inactive-services" class="tab-content hidden">
        <!-- <p class="text-gray-600">List of inactive services will be shown here.</p> -->




    <button onclick="toggleFormCard()" class="bg-white shadow hover:shadow-md p-6 rounded-lg border border-gray-200 text-left w-full max-w-md mx-auto mt-10 ml-3">
  <h3 class="text-xl font-semibold text-gray-800">+ Import SMM Services</h3>
  <!-- <p class="text-gray-600 mt-1">Click to open import form</p> -->
</button>
 

<select id="categorySelect" class=" text-xl font-semibold text-gray-800 bg-white shadow hover:shadow-md p-6 rounded-lg border border-gray-200 text-left w-full max-w-md mx-auto mt-10">
<option selected >Choose Option</option>
<?php
foreach($cname as $cname){
?>
<option value="<?=$cname->cname?>"><?=$cname->cname?></option>
<?php } ?>
</select>

<!-- <button onclick="toggleFormCard()" class="bg-white shadow hover:shadow-md p-6 rounded-lg border border-gray-200 text-left w-full max-w-md mx-auto mt-10">
  <h3 class="text-xl font-semibold text-gray-800">+ Import SMM Services</h3>
  <p class="text-gray-600 mt-1">Click to open import form</p>
</button> -->


<div id="formCard" class="max-w-4xl mx-auto mt-6 hidden">
    <!-- <h2 class="text-2xl font-bold text-gray-800 mb-6">📦 Import SMM Services</h2> -->

     <!-- Tab Content: Import Services -->
     <form id="importForm" class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Import SMM Services</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Row 1 -->
        <div>
            <label for="api" class="block text-sm font-medium text-gray-700">API URL</label>
            <input type="text" name="api" id="api" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
            <label for="key" class="block text-sm font-medium text-gray-700">API Key</label>
            <input type="text" name="key" id="key" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Row 2 -->
        <div>
            <label for="cname" class="block text-sm font-medium text-gray-700">Connection Name</label>
            <input type="text" name="cname" id="cname" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
            <label for="percentage" class="block text-sm font-medium text-gray-700">Percentage</label>
            <input type="text" name="percentage" value="10" id="percentage" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

    </div>
    <!-- Row 3 -->
        <div class="mt-6">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
            Import Services
        </button>
    </div>
</form>
  

        </div>

    
<?php // print_r($services_import); ?>
<!-- Services Table -->
<div id="filteredTable" class="bg-white p-6 rounded-lg shadow-md mx-auto mt-10 h-[250px] overflow-y-auto">



</div>
<!-- Submit Button -->
<button id="submitSelected" class="bg-blue-600 text-white px-4 py-2 rounded-lg mt-4">
    Submit Selected
</button>

<button id="DeleteSelected" class="bg-blue-600 text-white px-4 py-2 rounded-lg mt-4">
    Delete
</button>

<!-- jQuery Script -->
<script>
$(document).ready(function(){
    // Toggle all checkboxes
    $('#selectAll').on('click', function() {
        $('.rowCheckbox').prop('checked', this.checked);
    });

    // Toggle Select All based on individual checkbox
    $('.rowCheckbox').on('click', function() {
        if (!$(this).prop('checked')) {
            $('#selectAll').prop('checked', false);
        } else if ($('.rowCheckbox:checked').length === $('.rowCheckbox').length) {
            $('#selectAll').prop('checked', true);
        }
    });

    // Handle Submit
    $('#submitSelected').click(function(){
        let selected = [];

        $('.rowCheckbox:checked').each(function(){
            selected.push($(this).val());
        });

        if (selected.length === 0) {
            alert('Please select at least one service.');
            return;
        }
        var  percentage=$('#percentage1').val();
        var  cname=$('#categorySelect').val();

        $.ajax({
            url: '<?= base_url("SmmController/submit_selected_services") ?>',
            type: 'POST',
            data: {service_ids: selected, percentage: percentage, cname:cname },
            success: function(response) {
                console.log(response);
                
                if (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Imported successfully!',
                }).then(() => {
                    location.reload(); // Reload after confirmation
                });
            } else {
                Swal.fire({
                    icon: 'info',
                    title: 'Notice',
                    text: 'Already imported!',
                });
            }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    });




    $('#categorySelect').on('change', function() {
        var category = $(this).val();
        console.log('Selected category:', category); // Optional for debug

        if (!category) {
            $('#filteredTable').html('');
            return;
        }

        $.ajax({
            url: '<?= base_url("admin/filter_category") ?>',
            type: 'POST',
            data: { category: category },
            success: function(response) {
                $('#filteredTable').html(response);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
            }
        });
    });


      // Handle Delete
$('#DeleteSelected').click(function () {
    let selected = [];

    $('.rowCheckbox:checked').each(function () {
        selected.push($(this).val());
    });

    if (selected.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'No Services Selected',
            text: 'Please select at least one service to delete.',
        });
        return;
    }

    // Optional confirmation before delete
    Swal.fire({
        title: 'Are you sure?',
        text: "Selected services will be deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete them!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '<?= base_url("admin/import_delete") ?>',
                type: 'POST',
                data: { service_ids: selected },
                success: function (response) {
                    if (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Selected services have been deleted.',
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'info',
                            title: 'Notice',
                            text: 'Nothing was deleted (maybe already deleted).',
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred: ' + error,
                    });
                }
            });
        }
    });
});
});

</script>

</div>
    

    <!-- Tab Content: Settings -->
    <div id="settings" class="tab-content hidden">
        <p class="text-gray-600">provider content goes here.</p>
    </div>







    <!-- Tab + Table + Action Script -->
    <script>



function toggleFormCard() {
    const formCard = document.getElementById('formCard');
    formCard.classList.toggle('hidden');
  }


    $(document).ready(function () {
        // Initialize DataTable
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'excel', 'pdf', 'print'],
            responsive: true
        }
    );

        // Tab Navigation
        $(".tab-link").click(function (e) {
            e.preventDefault();
            $(".tab-link").removeClass("border-blue-600 text-blue-600")
                          .addClass("border-transparent hover:text-gray-600 hover:border-gray-300");
            $(".tab-content").addClass("hidden");

            $(this).addClass("border-blue-600 text-blue-600")
                   .removeClass("border-transparent hover:text-gray-600 hover:border-gray-300");

            $("#" + $(this).data("tab")).removeClass("hidden");
        });

        // Block/Unblock
        function updateStatus(id, action) {
            let text = action === 'block' ? 'Inactive' : 'Active';
            let title = action === 'block' ? 'Blocked!' : 'Activated!';
            let msg = action === 'block' ? 'The service has been Inactivated.' : 'The service has been Activated.';

            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to mark this service as ${text}.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: `Yes, ${text} it!`,
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("<?= base_url('status') ?>", { id }, function(response) {
                        var res = JSON.parse(response);
                        if (res.success) {
                            Swal.fire(title, msg, 'success').then(() => location.reload());
                        } else {
                            Swal.fire('Error!', res.message || 'Update failed.', 'error');
                        }
                    });
                }
            });
        }

        // Delete Service
        $(document).on('click', '.delete-btn', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Delete this service?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("<?= base_url('delete') ?>", { id }, function(response) {
                        var res = JSON.parse(response);
                        if (res.success) {
                            Swal.fire('Deleted!', 'Service removed.', 'success').then(() => location.reload());
                        } else {
                            Swal.fire('Error!', res.message || 'Deletion failed.', 'error');
                        }
                    });
                }
            });
        });

        // Block/Unblock Buttons
        $(document).on('click', '.block-btn', function () {
            updateStatus($(this).data('id'), 'block');
        });
        $(document).on('click', '.unblock-btn', function () {
            updateStatus($(this).data('id'), 'unblock');
        });
    });


$(document).ready(function () {
    $('#importForm').submit(function (e) {
        e.preventDefault(); // Stop default form submission

        let api = $('#api').val().trim();
        let key = $('#key').val().trim();
        let cname = $('#cname').val().trim();
        let percentage = $('#percentage').val().trim();

        if (api === '' || key === '' || cname === '' || percentage === '') {
            Swal.fire('Validation Error', 'Please fill in all the fields.', 'error');
            return;
        }

        // Optional: API URL format check
        const urlPattern = /^(https?:\/\/)[^\s$.?#].[^\s]*$/gm;
        if (!urlPattern.test(api)) {
            Swal.fire('Invalid URL', 'Enter a valid API URL.', 'error');
            return;
        }

        Swal.fire({
            title: 'Importing...',
            text: 'Please wait while services are being imported.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: "<?= base_url('smmcontroller/importServices') ?>",
            method: "POST",
            data: {
                api: api,
                key: key,
                cname: cname,
                percentage: percentage
            },
            success: function (response) {
                // console.log(response);
                
                Swal.fire('Success', 'Services imported successfully!', 'success');
                // Optionally reset form
                $('#importForm')[0].reset();
                location.reload();
            },
            error: function (xhr) {
                Swal.fire('Error', 'Failed to import services.', 'error');
            }
        });
    });
});

    </script>