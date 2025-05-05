<input type="text" value="10" name="percentage" id="percentage1" class="mb-4 p-2 border border-gray-300 rounded w-32">

<div class="overflow-x-auto">
  <table id="myTable" class="min-w-full text-sm text-left text-gray-700 bg-white border border-gray-200 rounded-lg shadow-sm">
    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
      <tr>
        <th class="px-4 py-3 border-b"><input type="checkbox" id="selectAll" class="accent-blue-500"></th>
        <th class="px-4 py-3 border-b">S/no</th>
        <!-- <th class="px-4 py-3 border-b">Service ID</th> -->
        <th class="px-4 py-3 border-b">Name</th>
        <th class="px-4 py-3 border-b">Category</th>
        <!-- <th class="px-4 py-3 border-b">Percentage</th> -->
        <th class="px-4 py-3 border-b">Rate</th>
        <!-- <th class="px-4 py-3 border-b">Display Rate</th> -->
      </tr>
    </thead>
    <tbody>
      <?php $i = 0; foreach($services_import as $service): $i++; ?>
      <tr class="<?= $service->imported ? 'bg-green-100' : 'hover:bg-gray-50' ?>">
        <td class="px-4 py-3 border-b"><input type="checkbox" class="rowCheckbox accent-blue-500" value="<?= $service->id ?>"></td>
        <td class="px-4 py-3 border-b"><?= $i ?></td>
        <!-- <td class="px-4 py-3 border-b"><?= $service->service_id ?></td> -->
        <td class="px-4 py-3 border-b"><?= $service->name ?></td>
        <td class="px-4 py-3 border-b"><?= $service->category ?></td>
        <!-- <td class="px-4 py-3 border-b"><?= $service->percentage . '%' ?></td> -->
        <td class="px-4 py-3 border-b"><?= '₹' . $service->rate ?></td>
        <!-- <td class="px-4 py-3 border-b"><?= '₹' . $service->set_rate ?></td> -->
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
