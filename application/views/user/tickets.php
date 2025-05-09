
<!-- Main Container -->
<div class="container mx-auto max-w-7xl p-6 md:p-8 bg-white  my-8  min-h-[calc(100vh-4rem)] flex flex-col">
<div class="flex gap-6">
  <!-- Left: Form -->
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
    <i class="fas fa-list"></i> Lists
  </h2>
.
  <?php if (!empty($tickets)) : ?>
    <div style="height: 400px;" class=" overflow-y-auto pr-2"> <!-- Scrollable Container -->
      <ul class="divide-y">
        <?php foreach ($tickets as $ticket) : ?>
          <li class="flex justify-between items-center py-3">
            <div class="flex items-start gap-3">
              <div class="rounded-full bg-gray-500 w-8 h-8 flex items-center justify-center text-white text-xs">
                <i class="fas fa-user"></i>
              </div>
              <div>
                <a href="#" class="font-medium text-blue-600 hover:underline">
                  <!-- #<?= $ticket->id ?> - <?= htmlspecialchars($ticket->subject) ?> -->
                </a>
                <div class="text-sm text-gray-500 leading-tight">
                  <div class="font-medium text-gray-700"><?= date('M d, Y', strtotime($ticket->created_at)) ?></div>
                  <div class="text-xs"><?= date('h:i A', strtotime($ticket->created_at)) ?></div>
                </div>
                <div class="text-sm text-gray-600"><?= htmlspecialchars($ticket->description) ?></div>
              </div>
            </div>

            <!-- Status Badge -->
            <div>
              <?php
                $status = strtolower($ticket->status);
                $badgeClass = match($status) {
                  'pending' => 'bg-cyan-500',
                  'answered' => 'bg-gray-500',
                  'closed' => 'bg-black',
                  default => 'bg-gray-300'
                };
              ?>
              <span class="text-xs px-3 py-1 rounded-full text-white <?= $badgeClass ?>">
                <?= ucfirst($status) ?>
              </span>
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
