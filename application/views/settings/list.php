
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
  <script>
    $(function() {
      let table = $('#settingsTable').DataTable({
        ajax: '<?= base_url('settings/get_settings') ?>',
        columns: [
          { data: 'id' },
          { data: 'categories' },
          { data: 'link' },
          {
            data: null,
            render: function(data, type, row) {
              return `
                <button onclick="edit(${row.id})" class="text-blue-600">Edit</button>
                <button onclick="remove(${row.id})" class="text-red-600 ml-2">Delete</button>
              `;
            }
          }
        ]
      });

      $('#addBtn').click(function() {
        $('#settingForm')[0].reset();
        $('#setting_id').val('');
        $('#settingModal').show();
      });

      $('#saveBtn').click(function() {
        $.post('<?= base_url('settings/save') ?>', $('#settingForm').serialize(), function() {
          $('#settingModal').hide();
          table.ajax.reload();
        });
      });
    });

    function edit(id) {
      $.get('<?= base_url('settings/get_single/') ?>' + id, function(data) {
        const setting = JSON.parse(data);
        $('#setting_id').val(setting.id);
        $('#categories').val(setting.categories);
        $('#link').val(setting.link);
        $('#settingModal').show();
      });
    }

    function remove(id) {
      Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
      }).then(result => {
        if (result.isConfirmed) {
          $.get('<?= base_url('settings/delete/') ?>' + id, function() {
            $('#settingsTable').DataTable().ajax.reload();
            Swal.fire('Deleted!', '', 'success');
          });
        }
      });
    }
  </script>

  <button id="addBtn" class="bg-green-500 text-white px-4 py-2 rounded mb-4">Add Setting</button>

  <table id="settingsTable" class="display" style="width:100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Categories</th>
        <th>Link</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>

  <!-- Modal -->
  <div id="settingModal" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded w-96">
      <h2 class="text-lg font-bold mb-4">Setting Form</h2>
      <form id="settingForm">
        <input type="hidden" name="id" id="setting_id">
        <div class="mb-4">
          <label class="block">Categories</label>
          <input type="number" name="categories" id="categories" class="w-full border px-2 py-1 rounded">
        </div>
        <div class="mb-4">
          <label class="block">Link</label>
          <input type="number" name="link" id="link" class="w-full border px-2 py-1 rounded">
        </div>
        <div class="text-right">
          <button type="button" id="saveBtn" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </div>
      </form>
    </div>
  </div>
