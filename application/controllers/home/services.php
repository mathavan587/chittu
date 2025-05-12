    <section class="relative gradient-bg text-white py-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
   <!-- Hero Section -->
    <!-- <section class="bg-blue-600 text-white py-20"> -->
        <div class="container mx-auto px-4 max-w-7xl text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Services</h1>
            <!-- <p class="text-lg md:text-xl max-w-3xl mx-auto">Learn more about who we are, what we do, and why we do it.</p> -->
        </div>
    </section>
  <!-- <section class="py-12 bg-gray-50 min-h-screen flex justify-center items-center"> -->
 <section class="py-10 px-4 sm:px-6 lg:px-8 bg-white">

      <!-- <input type="text" value="fff" name="category" id="category" class="mb-4 p-2 border border-gray-300 rounded w-32"> -->


      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <!-- DataTables CSS & JS -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
      <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

      <!-- Optional: DataTables Responsive, Buttons, etc. -->
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
      <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        

      <!-- <h2 class="text-2xl font-bold text-center mb-4">Services </h2> -->

        <table id="myTable" class="min-w-full text-sm text-left text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm">
          <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
              <!-- <th class="px-4 py-3 border-b"><input type="checkbox" id="selectAll" class="accent-blue-500"></th> -->
              <th class="px-4 py-3 border-b">S/no</th>
              <!-- <th class="px-4 py-3 border-b">Service ID</th> -->
              <th class="px-4 py-3 border-b whitespace-normal w-60  break-words">Name</th>
              <!-- <th class="px-4 py-3 border-b">Connect name</th> -->
              <th class="px-4 py-3 border-b w-60">Category</th>
              <!-- <th class="px-4 py-3 border-b">Percentage</th> -->
              <th class="px-4 py-3 border-b">Min</th>
              <th class="px-4 py-3 border-b">Max</th>
              <th class="px-4 py-3 border-b">Rate</th>
              <th class="px-4 py-3 border-b">	
              Average Time</th>
              <th class="px-4 py-3 border-b">Action</th>
              <!-- <th class="px-4 py-3 border-b">Display Rate</th> -->
            </tr>
          </thead>
          <tbody>
            <?php $i = 0; foreach($services as $service): $i++; ?>
            <tr class="<?= $service->imported ? 'bg-green-100' : 'hover:bg-gray-50' ?>">
              <!-- <td class="px-4 py-3 border-b"><input type="checkbox" class="rowCheckbox accent-blue-500" value="<?= $service->id ?>"></td> -->
              <!-- <td class="px-4 py-3 border-b"><?= $i ?></td> -->
              <td class="px-4 py-3 border-b"><?= $service->service_id ?></td>
              <td class="px-4 py-3 border-b w-60"><?= $service->name ?></td>
              <!-- <td class="px-4 py-3 border-b"><?= $service->cname ?></td> -->
              <td class="px-4 py-3 border-b w-60"><?= $service->category ?></td>
              <td class="px-4 py-3 border-b w-60"><?= $service->min ?></td>
              <td class="px-4 py-3 border-b w-60"><?= $service->max ?></td>
              <!-- <td class="px-4 py-3 border-b"><?= $service->percentage . '%' ?></td> -->
              <td class="px-4 py-3 border-b"><?= '₹' . $service->set_rate ?></td>
              <td class="px-4 py-3 border-b w-60"><?= $service->avg_time?></td>
              <!-- <td class="px-4 py-3 border-b"><?= '₹' . $service->set_rate ?></td> -->
              <td class="px-4 py-3 border-b">
              <button 
    class="view-details p-2 rounded text-white btn btn-primary" 
    data-title="<?=$service->name?>" 
    data-description="<?=$service->desc ?>"
  >
    View
  </button>

              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      <script>
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
      </script>
      <script>
        $(document).ready(function () {
    $('#myTable').DataTable({
      responsive: true,
      pageLength: 10,
      order: [[2, 'asc']], // Order by category
      columnDefs: [
        { orderable: false, targets: [0, 7] } // Adjust targets if needed
      ],
      rowGroup: {
        dataSrc: 2 // Group by the 3rd column (Category)
      }
    });
  });


        


      </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.view-details').forEach(button => {
        button.addEventListener('click', function () {
          const title = this.dataset.title;
          const description = this.dataset.description;

          Swal.fire({
            title: title,
            html: description,
            confirmButtonText: 'Close',
            width: 600
          });
        });
      });
    });
  </script>


      <!-- </section> -->
  
</section>