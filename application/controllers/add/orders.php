

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

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.min.js"></script>
<table id="myTable" class="w-full text-sm text-left text-gray-700 bg-white shadow-md sm:rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th>S/no</th>
                    <th>Order ID</th>
                    <th>User    </th>
                    <th>Orde Details</th>
                    <th>Status</th>
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
                    $service = $apimodel->getSingleData(['name' => $order->service_id], ['service_id','min', 'max']);
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $order->orderId ?></td>
                    <td><?= $getdata->name ?></td>
                    <td><?php 
                    echo $order->category_id.'<br>';
                    echo  'Provider :'.$service->service_id.'<br>';
                    echo  'Link :'.$order->link.'<br>';
                    echo  'Quantity :'.$order->quantity.'<br>';
                    echo  'Charge :'.$service->set_rate.'('.$service->min.'/'.$order->amount.')'.'<br>';
                    
                     ?></td>
                    <td><?= $order->status ?></td>
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
    $(document).ready(function() {
        $('#myTable').DataTable({
            order: [[1, 'desc']], // Order by Order ID (2nd column) descending
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
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
