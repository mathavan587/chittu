<div class="flex flex-col lg:flex-row gap-6 p-6 bg-gray-50 min-h-screen">
  <!-- Left Column: Ticket Info -->

  <?php
  $apimodel = new Apimodel();
  $apimodel->tablename = 'users';
  $getdata = $apimodel->getSingleData(array('id'=> $ticket->user_id),array('name','email'));
  ?> 

  <div class="bg-white p-6 rounded shadow w-full lg:w-1/3">
    <h2 class="text-lg font-semibold mb-4"><i class="fas fa-ticket-alt mr-2"></i>Ticket #<?=$ticket->id?></h2>
    <table class="w-full text-sm text-left text-gray-700">
      <tr>
        <td class="py-2 font-medium">Status</td>
        <td>
          <span class="inline-block px-2 py-1 text-xs rounded bg-purple-100 text-purple-800">
            <?= ucfirst($ticket->status) ?>
          </span>
        </td>
      </tr>
      <tr>
        <td class="py-2 font-medium">Name</td>
        <td><?= htmlspecialchars($getdata->name) ?></td>
      </tr>
      <tr>
        <td class="py-2 font-medium">E-mail</td>
        <td><?= htmlspecialchars($getdata->email) ?></td>
      </tr>
      <tr>
        <td class="py-2 font-medium">Created</td>
        <td><?= date('Y-m-d H:i:s', strtotime($ticket->created_at)) ?></td>
      </tr>
    </table>
  </div>

  <!-- Right Column: Conversation -->
  <div class="bg-white p-6 rounded shadow w-full lg:w-2/3 flex flex-col h-[80vh]">

  <h3 class="text-lg font-semibold mb-4 border-b pb-2">
    <?= htmlspecialchars($ticket->subject) ?> - <?= htmlspecialchars($ticket->request) ?>
  </h3>

  <!-- Chat Messages -->
  <div class="flex-1 overflow-y-auto space-y-4 mb-4 pr-2">
    <?php // foreach ($messages as $msg): ?>
      <div class="flex <?= $ticket->user_id == $_SESSION['user_id'] ? 'justify-end' : 'justify-start' ?>">
        <div class="<?= $ticket->user_id == $_SESSION['user_id'] ? 'bg-blue-100 text-blue-900' : 'bg-gray-100 text-gray-900' ?> p-3 rounded-lg max-w-xs shadow">
          <p class="text-sm"><?= nl2br(htmlspecialchars($ticket->description)) ?></p>
          <span class="block text-xs text-gray-500 mt-1"><?= date('d M Y, h:i A', strtotime($ticket->created_at)) ?></span>
        </div>
      </div>

                
<?php 
if ($ticket->message_id) {
    $message = $this->db->get_where('message', ['id' => $ticket->message_id])->row();
  ?>
      <div class="flex justify-end ?>">
        <div class="bg-blue-100 text-blue-900  p-3 rounded-lg max-w-xs shadow">
          <p class="text-sm"><?= nl2br(htmlspecialchars($message->message)) ?></p>
          <span class="block text-xs text-gray-500 mt-1"><?= date('d M Y, h:i A', strtotime($message->created_at)) ?></span>
        </div>
      </div>
<?php } ?>
  </div>

  <!-- Message Form -->
  <form method="post" action="<?= base_url('admin/reply_or_close/' . $ticket->id) ?>" class="border-t pt-4">
  <div class="flex items-center gap-2">
    <textarea name="message" rows="2" class="w-full border rounded p-2 text-sm resize-none focus:outline-none focus:ring focus:border-blue-300" placeholder="Type your reply..."></textarea>
    
    <!-- Submit as reply -->
    <button type="submit" name="action" value="reply" class="bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded">
      Send
    </button>
    
    <!-- Submit to close ticket -->
    <button type="submit" name="action" value="close" class="border border-purple-500 text-purple-600 px-4 py-2 rounded hover:bg-purple-50">
      Close
    </button>
  </div>
</form>
</div>

</div>
