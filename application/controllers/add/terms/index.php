<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<a href="<?= base_url('terms/create') ?>" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
  <i class="fas fa-plus"></i> Add Terms
</a>

<table id="termsTable" class="display" style="width:100%">
  <thead>
    <tr>
      <th>Title</th>
      <th>Created</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($terms as $term): ?>
      <tr>
        <td><?= htmlspecialchars($term->title) ?></td>
        <td><?= date('M d, Y h:i A', strtotime($term->created_at)) ?></td>
        <td>
          <a href="<?= base_url('terms/edit/' . $term->id) ?>" class="text-blue-500">
            <i class="fas fa-edit"></i>
          </a>
          <a href="<?= base_url('terms/delete/' . $term->id) ?>" 
             class="text-red-500 ml-3 delete-term" 
             data-id="<?= $term->id ?>">
            <i class="fas fa-trash-alt"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  $(document).ready(function () {
    $('#termsTable').DataTable();

    $('.delete-term').on('click', function (e) {
      e.preventDefault();
      const link = $(this).attr('href');

      Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link;
        }
      });
    });
  });
</script>
