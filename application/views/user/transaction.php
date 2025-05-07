<!-- Main Container -->
    <div class="container mx-auto max-w-7xl p-6 md:p-8 bg-white  my-8  min-h-[calc(100vh-4rem)] flex flex-col">

        <!-- Page Title -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center border-b pb-4">
            <i class="fas fa-calendar-alt text-gray-500 text-xl mr-3 fa-fw"></i> <!-- Title Icon -->
            <span>Transaction logs</span>
        </h1>

        <!-- Responsive Table Wrapper -->
        <!-- overflow-x-auto makes table scrollable horizontally on small screens -->
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 sticky top-0">
                    <tr>
                        <!-- <th scope="col" class="px-4 py-3">
                            Order ID
                        </th> -->
                        <th scope="col" class="px-4 py-3">
                            Date & Time
                        </th>
                        <th scope="col" class="px-4 py-3">
                            User/Email
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Description
                        </th>
                         <th scope="col" class="px-4 py-3 text-right">
                            Amount (INR)
                        </th>
                        <!-- <th scope="col" class="px-4 py-3 text-center">
                            Status
                        </th> -->
                        <th scope="col" class="px-4 py-3">
                            Payment ID
                        </th>
                        <!-- Add more columns if needed -->
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Sample Row 1: Completed -->
                     <?php
                    //  print_r($transaction);
                     
                     foreach($transaction as $data){
                        $apimodel = new Apimodel();
                        $apimodel->tablename = 'services';
                        // $services = $this->Apimodel->getMultipleData(['category' => $catId], '*');
                        $services =  $apimodel->getSingleData(['id' => $data->service_id], 'name');
                        $apimodel->tablename = 'users';
                        // $services = $this->Apimodel->getMultipleData(['category' => $catId], '*');
                        $users =  $apimodel->getSingleData(['id' => $data->user_id], 'email');
                        
                     ?>
                    <tr class="bg-white hover:bg-gray-50 transition-colors duration-150">
                        <!-- <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                        </td> -->
                        <td class="px-4 py-3 whitespace-nowrap">
                        <?= !empty($data->created_at) && ($timestamp = strtotime($data->created_at)) !== false ? date('Y-m-d h:i A', $timestamp) : 'N/A' ?>
                        </td>
                        <td class="px-4 py-3">
                           <?=$users->email?>
                        </td>
                         <td class="px-4 py-3">
                           <?=$data->service_id?>
                        </td>
                         <td class="px-4 py-3 text-right font-medium">
                            <?=$data->amount ?>

                        </td>
                        <!-- <td class="px-4 py-3 text-center">
                            <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Completed
                            </span>
                        </td> -->
                        <td class="px-4 py-3 text-gray-500 whitespace-nowrap">
                            <?=$data->paymentId ?>
                        </td>
                    </tr>
                    <?php } ?>

                    <!-- Sample Row 2: Pending -->
                     <!-- <tr class="bg-white hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                           #TXN10582
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            21 Apr 2025, 09:12
                        </td>
                        <td class="px-4 py-3">
                            another_user@test.net
                        </td>
                         <td class="px-4 py-3">
                            Web Development - Phase 1
                        </td>
                         <td class="px-4 py-3 text-right font-medium">
                           15000.00
                        </td>
                        <td class="px-4 py-3 text-center">
                           <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Pending
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-500 whitespace-nowrap">
                            order_MbCdEfGhI1234
                        </td>
                    </tr> -->

                     <!-- Sample Row 3: Failed -->
                     <!-- <tr class="bg-white hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                           #TXN10581
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            20 Apr 2025, 18:50
                        </td>
                        <td class="px-4 py-3">
                            user1@example.com
                        </td>
                         <td class="px-4 py-3">
                            SEO Package - Basic
                        </td>
                         <td class="px-4 py-3 text-right font-medium">
                            8000.00
                        </td>
                        <td class="px-4 py-3 text-center">
                           <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Failed
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-500 whitespace-nowrap">
                           N/A
                        </td>
                    </tr> -->

                    <!-- Add more rows as needed -->

                    <!-- Example of Empty State within Table (If needed, usually handled outside) -->
                    <!--
                    <tr>
                         <td colspan="7" class="text-center py-10 text-gray-500 italic">
                             No transaction logs found matching your criteria.
                         </td>
                    </tr>
                    -->

                </tbody>
            </table>
        </div> <!-- End Responsive Table Wrapper -->

        <!-- Pagination (Optional Example Structure) -->
        <!--
        <nav class="flex items-center justify-between pt-4 mt-6 border-t" aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500">Showing <span class="font-semibold text-gray-900">1-10</span> of <span class="font-semibold text-gray-900">1000</span></span>
            <ul class="inline-flex items-center -space-x-px">
                <li>
                    <a href="#" class="block py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                        <span class="sr-only">Previous</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </a>
                </li>
                <li> -->
                    <!-- Active page example -->
                <!--    <a href="#" aria-current="page" class="z-10 py-2 px-3 leading-tight text-blue-600 bg-blue-50 border border-blue-300 hover:bg-blue-100 hover:text-blue-700">1</a>
                </li>
                <li>
                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                </li> -->
                <!-- ... other page numbers ... -->
        <!--        <li>
                    <a href="#" class="block py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                        <span class="sr-only">Next</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    </a>
                </li>
            </ul>
        </nav>
        -->

    </div> <!-- End Container -->
