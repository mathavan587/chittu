

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto mt-8 px-4">
        <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-700">New Order</h2>
            <div class="space-x-2">
            <button class="bg-blue-600 text-white px-4 py-1 rounded shadow">Single Order</button>
            <!-- <button class="bg-gray-200 text-gray-700 px-4 py-1 rounded shadow">Mass Order</button> -->
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Add New Form -->
            <div>
            <h3 class="text-gray-700 font-semibold mb-2">🛒 Add new</h3>
                <form class="space-y-4" action="<?=base_url("user/placeOrder")?>" id="orderForm" method="post">
                    <div>
                    <label class="block text-sm font-medium text-gray-600">Category</label>
                    <select name="category" class="w-full border rounded px-3 py-2">
                    <option>Choose a category</option>
                    <?php
                    foreach($categories as $s){
                    ?>
                    <option value="<?=$s->category?>" ><?=$s->category?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div>
                    <label class="block text-sm font-medium text-gray-600">Order Service</label>
                    <select name="service" class="w-full border rounded px-3 py-2">
                        <option>Choose a service</option>
                    </select>
                    </div>
                    <div>
                    <label class="block text-sm font-medium text-gray-600">Link</label>
                    <input type="url" name="link" placeholder="https://" class="w-full border rounded px-3 py-2" />
                    </div>
                    <div>
                    <label class="block text-sm font-medium text-gray-600">Quantity</label>
                    <input type="number" name="quantity" id="qty" class="w-full border rounded px-3 py-2" />




                    <label class="block text-sm font-medium text-gray-600">Amount</label>
                    <input type="text" id="Amt" name="amount" class="w-full border rounded px-3 py-2" />

                    <!-- <label class="block text-sm font-medium text-gray-600">percentage</label> -->
                    <input type="hidden" id="percentage" name="percentage" class="w-full border rounded px-3 py-2" />

                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow">Place Order</button>
                </form>
            </div>

            <!-- Order Resume -->
            <div>
            <h3 class="text-gray-700 font-semibold mb-2">🛍️ Order Resume</h3>
            <div class="space-y-4">
                <div>
                <label class="block text-sm font-medium text-gray-600">Service Name</label>
                <input type="text" id="resume-service-name" class="w-full border rounded px-3 py-2" readonly />
                </div>
                <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Minimum</label>
                    <input type="text" id="resume-min"  class="w-full border rounded px-3 py-2" readonly />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Maximum</label>
                    <input type="text" id="resume-max" class="w-full border rounded px-3 py-2" readonly />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Price/1k</label>
                    <input type="text" id="resume-price" class="w-full border rounded px-3 py-2" readonly />
                </div>
                </div>
                <div>
                <label class="block text-sm font-medium text-gray-600">Description</label>
                <textarea id="resume-desc" class="w-full border rounded px-3 py-2" rows="6" readonly></textarea>
                </div>
            </div>
            </div>
        </div>
        </div>
    </main>

  

