<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Blog Listing -->
<a href="<?= base_url('blog/create') ?>" class="mb-3 inline-block text-white bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 text-sm">
  <i class="fas fa-plus mr-1"></i> Add Blog
</a>

<table id="blogTable" class="display" style="width:100%">
  <thead>
    <tr>
      <th>Title</th>
      <th>Created</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($blogs as $blog): ?>
      <tr>
        <td><?= htmlspecialchars($blog->title) ?></td>
        <td><?= date('M d, Y h:i A', strtotime($blog->created_at)) ?></td>
        <td>
          <a href="<?= base_url('blog/edit/' . $blog->id) ?>" class="text-blue-500 mr-2" title="Edit">
            <i class="fas fa-edit"></i>
          </a>
          <a href="<?= base_url('blog/delete/' . $blog->id) ?>" 
             class="text-red-500 delete-blog" 
             data-id="<?= $blog->id ?>" 
             title="Delete">
            <i class="fas fa-trash-alt"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  $(document).ready(function () {
    $('#blogTable').DataTable({
      responsive: true,
      pageLength: 10,
      order: [[1, "desc"]] // Sort by "Created" column
    });

    $(document).on('click', '.delete-blog', function (e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Are you sure?',
        text: 'This blog post will be permanently deleted!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = href;
        }
      });
    });
  });
</script>
