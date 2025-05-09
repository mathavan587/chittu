<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <div class="overflow-auto p-3 border rounded shadow bg-white">
    <table id="ticketTable" class="min-w-full text-sm text-left text-gray-700 display">
      <thead class="bg-gray-100 text-xs uppercase">
        <tr>
          <th class="px-4 py-3">ID</th>
          <th class="px-4 py-3">Subject</th>
          <th class="px-4 py-3">Request</th>
          <th class="px-4 py-3">Order IDs</th>
          <th class="px-4 py-3">Description</th>
          <th class="px-4 py-3">Status</th>
          <th class="px-4 py-3">Date</th>
          <th class="px-4 py-3">Time</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y">
        <?php foreach ($tickets as $ticket): ?>
          <?php
            $statusClass = match(strtolower($ticket->status)) {
              'pending' => 'bg-cyan-500',
              'answered' => 'bg-gray-500',
              'closed' => 'bg-black',
              default => 'bg-gray-300'
            };
          ?>
          <tr>
            <td class="px-4 py-2">#<?= $ticket->id ?></td>
            <td class="px-4 py-2"><?= htmlspecialchars($ticket->subject) ?></td>
            <td class="px-4 py-2"><?= htmlspecialchars($ticket->request) ?></td>
            <td class="px-4 py-2"><?= htmlspecialchars($ticket->order_ids) ?></td>
            <td class="px-4 py-2"><?= htmlspecialchars($ticket->description) ?></td>
            <td class="px-4 py-2">
            <!-- <span class="text-xs px-3 py-1 rounded-full text-white <?= $statusClass ?>">
  <?= ucfirst($ticket->status) ?>
</span> -->
<select onchange="changeStatus(<?= $ticket->id ?>, this.value)" class="text-xs rounded px-2 py-1 <?= $statusClass ?>">
  <option value="Open" <?= $ticket->status == 'Open' ? 'selected' : '' ?>>Open</option>
  <option value="pending" <?= $ticket->status == 'pending' ? 'selected' : '' ?>>Pending</option>
  <option value="answered" <?= $ticket->status == 'answered' ? 'selected' : '' ?>>Answered</option>
  <option value="closed" <?= $ticket->status == 'closed' ? 'selected' : '' ?>>Closed</option>
</select>
            </td>
            <td class="px-4 py-2"><?= date('M d, Y', strtotime($ticket->created_at)) ?></td>
            <td class="px-4 py-2"><?= date('h:i A', strtotime($ticket->created_at)) ?></td>
            <td class="px-4 py-2">
            <a href="<?= base_url('admin/view/'.$ticket->id) ?>" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">
  <i class="fas fa-eye"></i>
</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>



<script>
$(document).ready(function () {
  $('#ticketTable').DataTable({
    pageLength: 10,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false
  });
});

function changeStatus(ticketId, newStatus) {
  fetch("<?= base_url('admin/change_status') ?>", {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ id: ticketId, status: newStatus })
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'success') {
      Swal.fire('Updated!', data.message, 'success');
    } else {
      Swal.fire('Error!', data.message, 'error');
    }
  })
  .catch(() => {
    Swal.fire('Error!', 'Failed to update status.', 'error');
  });
}

</script>



<script>
function deleteTicket(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: "This will permanently delete the ticket.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#aaa',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      fetch("<?= base_url('tickets/delete/') ?>" + id, {
        method: 'POST'
      })
      .then(res => res.json())
      .then(data => {
        if (data.status === 'success') {
          Swal.fire('Deleted!', data.message, 'success').then(() => location.reload());
        } else {
          Swal.fire('Error!', data.message, 'error');
        }
      });
    }
  });
}
</script>
