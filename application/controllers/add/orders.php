

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Font Awesome --> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- DataTables Buttons extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.min.css">

<a href=""></a>
<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.min.js"></script>
<div class="mb-4">
    <label for="statusFilter" class="font-medium text-sm mr-2">Filter by Status:</label>
    <select id="statusFilter" class="border border-gray-300 rounded px-2 py-1 text-sm">
        <option value="">All</option>
        <option value="pending">Pending</option>
        <option value="processing">Processing</option>
        <option value="completed">Completed</option>
        <option value="cancelled">Cancelled</option>
        <option value="refunded">Refunded</option>
    </select>
</div>

<table id="myTable" class="w-full text-sm text-left text-gray-700 bg-white shadow-md sm:rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th>S/no</th>
                    <th>Order ID</th>
                    <th>User    </th>
                    <th>Orde Details</th>
                    <th>Status</th>
                    <th>Date</th>
                    <!-- <th>Rate</th>
                    <th>Display Rate</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; foreach($orders as $order) { $i++; 
                    $apimodel = new Apimodel();
                    $apimodel->tablename = 'users';
                    $getdata = $apimodel->getSingleData(['id' => $order->user_id], ['name', 'email']);

                    $apimodel->tablename = 'services';
                    $service = $apimodel->getSingleData(['name' => $order->service_id], ['cname','set_rate','service_id','min', 'max']);
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $order->orderId ?></td>
                    <td><?= $getdata->name .'<br>'. $getdata->email?></td>
                    <td><?php 
                    echo $order->category_id.'<br>';
                    echo  'Provider : '.$service->cname.'( ID : '.$service->service_id.')<br>';
                    echo  'Link : <a href='.$order->link.'>'.$order->link.'</a><br>';
                    echo  'Quantity : '. number_format($order->quantity).'<br>';
                    echo  'Charge :     '.$service->set_rate.'('. number_format($service->min).'/'. number_format($order->amount).')'.'<br>';
                    
                     ?></td>
                    <td>
                
                
                    
                    <button type="button"
    class="change-status-btn bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
    data-id="<?= $order->id ?>"
    data-status="<?= $order->status ?>">
    <i class="fas fa-sync-alt"></i> <?= $order->status ?>
</button>
                </td>
                    <td><?= date('d M Y, h:i A', strtotime($order->created_at)) ?></td>
                    <!-- <td><?= '₹' . $service->rate ?></td>
                    <td><?= '₹' . $service->set_rate ?></td> -->
                    <td>
                        <div class="flex items-center gap-2">
                            <!-- <button type="button"
                                class="<?= $service->status ? 'block-btn bg-green-700 hover:bg-green-800' : 'unblock-btn bg-red-700 hover:bg-red-800' ?>
                                       text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
                                data-id="<?= $service->id ?>">
                                <i class="<?= $service->status ? 'fas fa-check-circle' : 'fas fa-ban' ?>"></i>
                            </button>  -->

                                 <!-- <a href="<?= base_url('edit/service/' . $order->id) ?>"
                               class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2">
                                <i class="fas fa-edit"></i>
                            </a> -->




                            <button type="button"
    class="invoice-btn bg-yellow-600 hover:bg-yellow-700 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
    data-orderid="<?= $order->orderId ?>"
    data-username="<?= $getdata->name ?>"
    data-email="<?= $getdata->email ?>"
    data-category="<?= $order->category_id ?>"
    data-link="<?= $order->link ?>"
    data-quantity="<?= $order->quantity ?>"
    data-charge="<?= $service->set_rate ?>"
    data-status="<?= $order->status ?>">
    <i class="fas fa-file-invoice"></i> Invoice
</button>


                            <!-- <button type="button"
    class="edit-order-btn bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
    data-id="<?= $order->id ?>"
    data-category="<?= $order->category_id ?>"
    data-status="<?= $order->status ?>">
    <i class="fas fa-edit"></i> Edit
</button>
                            <button type="button"
                                class="delete-btn bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg text-sm px-4 py-1 flex items-center gap-2"
                                data-id="<?= $service->id ?>">
                                <i class="fas fa-trash"></i>
                            </button>         -->
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>


        <script>
$(document).on('click', '.change-status-btn', function() {
    const orderId = $(this).data('id');
    const currentStatus = $(this).data('status');

    Swal.fire({
        title: 'Change Order Status',
        input: 'select',
        inputOptions: {
            'pending': 'Pending',
            'processing': 'Processing',
            'completed': 'Completed',
            'cancelled': 'Cancelled',
            'refunded': 'Refunded'
        },
        inputValue: currentStatus,
        showCancelButton: true,
        confirmButtonText: 'Update',
        preConfirm: (newStatus) => {
            return $.ajax({
                url: '<?= base_url('admin/update_status') ?>', // Update this URL
                type: 'POST',
                data: { id: orderId, status: newStatus },
                dataType: 'json'
            }).then(response => {
                if (!response.success) {
                    throw new Error(response.message || 'Update failed.');
                }
                return response;
            }).catch(error => {
                Swal.showValidationMessage(error.message);
            });
        }
    }).then((result) => {
        if (result.isConfirmed && result.value.success) {
            Swal.fire('Success', 'Order status updated!', 'success').then(() => {
                location.reload(); // Or update row via JS
            });
        }
    });
});
</script>


        <script>
 $(document).ready(function() {
    const table = $('#myTable').DataTable({
        order: [[1, 'desc']],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });

    // Filter by status
    $('#statusFilter').on('change', function() {
        const selectedStatus = $(this).val().toLowerCase();
        table.column(4).search(selectedStatus).draw();
    });
});

</script>
<script>
$(document).on('click', '.invoice-btn', function() {
    const data = $(this).data();
    const docDefinition = {
        content: [
            { text: 'Order Invoice', style: 'header' },
            { text: '\nOrder ID: ' + data.orderid },
            { text: 'User: ' + data.username + ' (' + data.email + ')' },
            { text: 'Category: ' + data.category },
            { text: 'Link: ' + data.link },
            { text: 'Quantity: ' + data.quantity },
            { text: 'Charge: ₹' + data.charge },
            { text: 'Status: ' + data.status },
            { text: '\nThank you for your order!', style: 'subheader' }
        ],
        styles: {
            header: { fontSize: 18, bold: true, alignment: 'center' },
            subheader: { fontSize: 12, italics: true, alignment: 'center' }
        }
    };
    pdfMake.createPdf(docDefinition).download('invoice_' + data.orderid + '.pdf');
});
</script>
