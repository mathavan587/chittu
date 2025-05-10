
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <div class="container mx-auto">
    <div class="flex justify-between items-center mb-4">
      <!-- <h1 class="text-2xl font-bold">Announcements</h1> -->
      <button id="addBtn" class="bg-blue-500 text-white px-4 py-2 rounded">Add Announcement</button>
    </div>

    <table id="announcementTable" class="display w-full">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Message</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
      </thead>
    </table>
  </div>

  <!-- Modal -->
<div id="formModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-lg transform transition-all scale-100">
    <h2 class="text-2xl font-semibold mb-4" id="modalTitle">Add Announcement</h2>
    <form id="announcementForm">
      <input type="hidden" name="id" id="id">
      
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" id="title" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
      </div>
      
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Message</label>
        <textarea name="message" id="message" rows="4" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
      </div>
      
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Status</label>
        <select name="status" id="status" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </div>
      
      <div class="flex justify-end">
        <button type="button" class="mr-2 bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded" onclick="$('#formModal').hide()">Cancel</button>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Save</button>
      </div>
    </form>
  </div>
</div>


  <script>
    $(document).ready(function () {
      const table = $('#announcementTable').DataTable({
        ajax: {
          url: "<?= base_url('announcement/fetch') ?>",
          dataSrc: ""
        },
        columns: [
          { data: 'id' },
          { data: 'title' },
          { data: 'message' },
          { data: 'status' },
          { data: 'created_at' },
          {
            data: null,
            render: function (data, type, row) {
              return `
                <button onclick="editAnnouncement(${row.id})" class="bg-yellow-400 text-white px-2 py-1 rounded mr-1">Edit</button>
                <button onclick="deleteAnnouncement(${row.id})" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
              `;
            }
          }
        ]
      });

      $('#addBtn').on('click', function () {
        $('#announcementForm')[0].reset();
        $('#id').val('');
        $('#modalTitle').text('Add Announcement');
        $('#formModal').show();
      });

      $('#announcementForm').on('submit', function (e) {
        e.preventDefault();
        $.post("<?= base_url('announcement/save') ?>", $(this).serialize(), function () {
          $('#formModal').hide();
          table.ajax.reload();
          Swal.fire('Success', 'Announcement saved!', 'success');
        });
      });
    });

    function editAnnouncement(id) {
      $.get("<?= base_url('announcement/edit/') ?>" + id, function (data) {
        const a = JSON.parse(data);
        $('#id').val(a.id);
        $('#title').val(a.title);
        $('#message').val(a.message);
        $('#status').val(a.status);
        $('#modalTitle').text('Edit Announcement');
        $('#formModal').show();
      });
    }

    function deleteAnnouncement(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e3342f',
        confirmButtonText: 'Delete'
      }).then((result) => {
        if (result.isConfirmed) {
          $.get("<?= base_url('announcement/delete/') ?>" + id, function () {
            $('#announcementTable').DataTable().ajax.reload();
            Swal.fire('Deleted!', 'Announcement has been removed.', 'success');
          });
        }
      });
    }
  </script>


