
    
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
    

        <button id="addServiceBtn" class="mb-4 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
  <i class="fas fa-plus mr-1"></i> Add Service
</button>


        <!-- Services Table -->
        <table id="myTable" class="w-full text-sm text-left text-gray-700 bg-white shadow-md sm:rounded-lg">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
          <tr>
            <!-- <th class="px-4 py-3 border-b"><input type="checkbox" id="selectAll" class="accent-blue-500"></th> -->
            <th class="px-4 py-3 border-b">S/no</th>
            <!-- <th class="px-4 py-3 border-b">Service ID</th> -->
            <!-- <th class="px-4 py-3 border-b whitespace-normal w-60  break-words">id</th> -->
            <th class="px-4 py-3 border-b whitespace-normal w-60  break-words">Name</th>
            <th class="px-4 py-3 border-b whitespace-normal w-60  break-words"> Provider</th>
            <!-- <th class="px-4 py-3 border-b">Connect name</th> -->
            <th class="px-4 py-3 border-b">Min/Max</th>
            <th class="px-4 py-3 border-b w-60">Rate per 1k	</th>
            <!-- <th class="px-4 py-3 border-b">Percentage</th> -->
            <!-- <th class="px-4 py-3 border-b"></th> -->
            <!-- <th class="px-4 py-3 border-b">Rate per 1k</th> -->
            <th class="px-4 py-3 border-b">	
            Average Time</th>
            <th class="px-4 py-3 border-b">Action</th>
            <!-- <th class="px-4 py-3 border-b">Display Rate</th> -->
          </tr>
        </thead>
            <tbody>
                <?php $i = 0; foreach($services as $service) { $i++; 
                    $apimodel = new Apimodel();
                    $apimodel->tablename = 'categories';
                    $getdata = $apimodel->getSingleData(['id' => $service->category], ['categories']);
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <!-- <+td><?= $service->service_id ?></+td> -->
                    <td><?= $service->name ?></td>
                    <td  ><?= $service->category.'<br>'.$service->service_id ?></td>
                    <td><?= number_format($service->min).'/'.number_format($service->max)  ?></td>    
                    <!-- <td><?= $service->percentage . '%' ?></td>  -->
                    <!--<td><?= $service->percentage . '%' ?></td> -->
                    <td>
    ₹<?=   $service->rate ?>
    <br>
    <span style="font-weight: 100; color: #999;">
    ₹<?=  $service->set_rate ?>
</span>
</td>
                    <!-- <td></td> -->
                    <td><?= $service->avg_time ?></td>
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


<select id="category" class=" text-xl font-semibold text-gray-800 bg-white shadow hover:shadow-md p-6 rounded-lg border border-gray-200 text-left w-full max-w-md mx-auto mt-10">
<option selected >Choose Option</option>
<?php
foreach($names as $c){
?>
<option value="<?=$c->category?>"><?=$c->category?></option>
<?php } ?>
</select>
<input type="text" value="10" name="percentage" id="percentage1" class=" text-xl font-semibold text-gray-800 bg-white shadow hover:shadow-md p-6 rounded-lg border border-gray-200 text-left w-full max-w-md mx-auto mt-10">

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


<div id="viewModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Service Details</h2>
        <div id="modalContent" class="text-gray-700 space-y-2">
            <!-- Fetched content will go here -->
        </div>
        <button id="closeModal" class="mt-4 bg-gray-500 hover:bg-gray-700 text-white py-1 px-4 rounded">
            Close
        </button>
    </div>
</div>

<script>
  $('#addServiceBtn').on('click', function () {
    Swal.fire({
      title: 'Add New Service',
      html: `
        <div style="max-height:400px; overflow-y:auto; text-align:left">
          <input type="text" id="service_id" class="swal2-input" placeholder="Service ID">
          <input type="text" id="name" class="swal2-input" placeholder="Service Name">
          <input type="number" id="min" class="swal2-input" placeholder="Min Order">
          <input type="number" id="max" class="swal2-input" placeholder="Max Order">
          <input type="text" id="percentage" class="swal2-input" placeholder="Percentage">
          <input type="text" id="type" class="swal2-input" placeholder="Type">
          <input type="text" id="avg_time" class="swal2-input" placeholder="Average Time">
          <input type="text" id="category1" class="swal2-input" placeholder="Category">
          <input type="text" id="provider" class="swal2-input" placeholder="Providers">
          <input type="text" id="rate" class="swal2-input" placeholder="Original Rate per 1000">
          <textarea id="desc" class="swal2-textarea" placeholder="Description"></textarea>
        </div>
      `,
      confirmButtonText: 'Add',
      focusConfirm: false,
      showCancelButton: true,
      preConfirm: () => {
        const service_id = $('#service_id').val().trim();
        const name = $('#name').val().trim();
        const min = $('#min').val().trim();
        const max = $('#max').val().trim();
        const percentage = $('#percentage').val().trim();
        const type = $('#type').val().trim();
        const avg_time = $('#avg_time').val().trim();
        const category = $('#category1').val();
        const rate = $('#rate').val().trim();
        const desc = $('#desc').val().trim();
        const provider = $('#provider').val().trim();

        if (!name || !service_id || !min || !max || !rate || !category || !percentage || !type || !avg_time || !provider) {
          Swal.showValidationMessage('All fields except description are required.');
        }

        return {
          service_id, name, min, max, rate, percentage, category, type, avg_time, desc , provider
        };
      }
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= base_url("admin/add") ?>',
          method: 'POST',
          data: result.value,
          success: function (response) {
            Swal.fire('Success!', 'Service added.', 'success')
              .then(() => location.reload());
          },
          error: function () {
            Swal.fire('Error!', 'Could not add service.', 'error');
          }
        });
      }
    });
  });
</script>




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
        var  category=$('#category').val();

        $.ajax({
            url: '<?= base_url("SmmController/submit_selected_services") ?>',
            type: 'POST',
            data: {service_ids: selected, percentage: percentage, cname:cname ,category:category },
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