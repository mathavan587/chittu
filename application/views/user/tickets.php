<!-- Include jQuery and Font Awesome -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

<!-- Main Container -->
<div class="container mx-auto max-w-7xl p-6 md:p-8 bg-white my-8 min-h-[calc(100vh-4rem)] flex flex-col">
  <div class="flex gap-6">
    <!-- Left: Add Ticket Form -->
    <div class="w-1/2 bg-white p-6 rounded shadow">
      <h2 class="text-lg font-semibold mb-4">📝 Add New Ticket</h2>
      <form action="<?= base_url('User/store') ?>" method="post">
        <input type="hidden" name="user_id" value="<?= $user_id ?>" />
        <div class="mb-4">
          <label class="block text-sm font-medium mb-1">Subject</label>
          <select name="subject" class="w-full border rounded px-3 py-2 text-sm">
            <option value="Order">Order</option>
            <option value="Payment">Payment</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium mb-1">Request</label>
          <select name="request" class="w-full border rounded px-3 py-2 text-sm">
            <option value="Refill">Refill</option>
            <option value="Cancel">Cancel</option>
            <option value="Enquiry">Enquiry</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium mb-1">Order ID</label>
          <input type="text" name="order_ids" placeholder="12345,12346" class="w-full border rounded px-3 py-2 text-sm" />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium mb-1">Description</label>
          <textarea name="description" rows="4" class="w-full border rounded px-3 py-2 text-sm"></textarea>
        </div>
        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-medium px-4 py-2 rounded">
          Submit
        </button>
      </form>
    </div>

    <!-- Right: Ticket List -->
    <div class="w-1/2 bg-white p-6 rounded shadow text-gray-700">
      <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
        <i class="fas fa-list"></i> Ticket List
      </h2>

      <?php if (!empty($tickets)) : ?>
        <div style="height: 400px;" class="overflow-y-auto pr-2">
          <ul class="divide-y">
            <?php foreach ($tickets as $ticket) : ?>
              <li class="flex justify-between items-center py-3">
                <div class="flex items-start gap-3">
                  <div class="rounded-full bg-gray-500 w-8 h-8 flex items-center justify-center text-white text-xs">
                    <i class="fas fa-user"></i>
                  </div>
                  <div>
                    <p class="font-medium text-blue-600">
                      #<?= $ticket->id ?> - <?= htmlspecialchars($ticket->subject) ?>
                    </p>
                    <div class="text-sm text-gray-500 leading-tight">
                      <div class="font-medium text-gray-700"><?= date('M d, Y', strtotime($ticket->created_at)) ?></div>
                      <div class="text-xs"><?= date('h:i A', strtotime($ticket->created_at)) ?></div>
                    </div>
                    <div class="text-sm text-gray-600"><?= htmlspecialchars($ticket->description) ?></div>
                  </div>
                </div>

                <!-- Status and View Button -->
                <div class="flex items-center gap-3">
                  <?php
                    $status = strtolower($ticket->status);
                    $badgeClass = match ($status) {
                      'pending' => 'bg-cyan-500',
                      'answered' => 'bg-gray-500',
                      'closed' => 'bg-black',
                      default => 'bg-gray-300'
                    };
                  ?>
                  <span class="text-xs px-3 py-1 rounded-full text-white <?= $badgeClass ?>">
                    <?= ucfirst($status) ?>
                  </span>
                <?php
                // print_r($ticket); 
                if ($ticket->message_id) {
                
                ?>
                  <!-- <a href="#" 
                     class="text-blue-500 hover:text-blue-700 text-sm open-ticket-modal" 
                     data-id="<?= $ticket->id ?>" 
                     data-subject="<?= htmlspecialchars($ticket->subject) ?>"
                     data-request="<?= htmlspecialchars($ticket->request) ?>"
                     data-order="<?= htmlspecialchars($ticket->order_ids) ?>"
                     data-description="<?= htmlspecialchars($ticket->description) ?>"
                     data-status="<?= ucfirst($ticket->status) ?>"
                     data-date="<?= date('M d, Y h:i A', strtotime($ticket->created_at)) ?>"
                     title="View Ticket">
                    <i class="fas fa-eye"></i>
                  </a> -->

                  <a href="#" 
   class="text-blue-500 hover:text-blue-700 text-sm open-ticket-modal" 
   data-id="<?= $ticket->id ?>"
   title="View Ticket">
  <i class="fas fa-eye"></i>
</a>

                  <?php } ?>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php else : ?>
        <p class="text-gray-500 text-center">Looks like there are no tickets yet!</p>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="ticketModal" class="fixed inset-0 hidden bg-black bg-opacity-50 items-center justify-center z-50">
  <div class="bg-white rounded-xl p-6 w-full max-w-md">
    <h2 class="text-lg font-semibold mb-2" id="modalSubject"></h2>
    <p class="text-sm text-gray-600 mb-2" id="modalRequest"></p>
    <p class="text-sm text-gray-600 mb-2" id="modalOrder"></p>
    <p class="text-sm text-gray-600 mb-2" id="modalDescription"></p>
    <p class="text-xs text-gray-500" id="modalDateStatus"></p>
    <div class="text-right mt-4">
      <button class="bg-gray-500 text-white px-4 py-1 rounded hover:bg-gray-600 close-modal">Close</button>
    </div>
  </div>
</div>


<script>
$(document).on('click', '.open-ticket-modal', function (e) {
  e.preventDefault();

  const ticketId = $(this).data('id');

  $.ajax({
    url: '<?= base_url('user/get_ticket/') ?>' + ticketId,
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      if (data && !data.error) {
        $('#modalSubject').text(`#${data.id} - ${data.subject}`);
        $('#modalRequest').text(`Request Type: ${data.request}`);
        $('#modalOrder').text(`Order ID(s): ${data.order_ids}`);
        $('#modalDescription').text(data.description);
        $('#modalDateStatus').text(`Status: ${data.status} • Created at: ${data.created_at}`);

        $('#ticketModal').removeClass('hidden').addClass('flex');
      } else {
        alert('Ticket not found.');
      }
    },
    error: function() {
      alert('Error fetching ticket.');
    }
  });
});

$(document).on('click', '.close-modal', function () {
  $('#ticketModal').removeClass('flex').addClass('hidden');
});
</script>


<!-- JS to handle modal -->
<script>
  $(document).on('click', '.open-ticket-modal', function (e) {
    e.preventDefault();

    const id = $(this).data('id');
    const subject = $(this).data('subject');
    const request = $(this).data('request');
    const order = $(this).data('order');
    const description = $(this).data('description');
    const status = $(this).data('status');
    const date = $(this).data('date');

    $('#modalSubject').text(`#${id} - ${subject}`);
    $('#modalRequest').text(`Request Type: ${request}`);
    $('#modalOrder').text(`Order ID(s): ${order}`);
    $('#modalDescription').text(description);
    $('#modalDateStatus').text(`Status: ${status} • Created at: ${date}`);

    $('#ticketModal').removeClass('hidden').addClass('flex');
  });

  $(document).on('click', '.close-modal', function () {
    $('#ticketModal').removeClass('flex').addClass('hidden');
  });
</script>
