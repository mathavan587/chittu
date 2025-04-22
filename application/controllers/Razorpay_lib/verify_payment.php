<?php
function placeOrder()
{
    require_once('/vendor/autoload.php');
    $api = new \Razorpay\Api\Api('YOUR_KEY_ID', 'YOUR_KEY_SECRET');

    $paymentId = $this->input->post('razorpay_payment_id');
    $orderId   = $this->input->post('razorpay_order_id');
    $signature = $this->input->post('razorpay_signature');

    $category_id = $this->input->post('category_id');
    $service_id = $this->input->post('service_id');
    $link = $this->input->post('link');
    $quantity = $this->input->post('quantity');
    $amount = $this->input->post('amount');

    $attributes = [
        'razorpay_order_id' => $orderId,
        'razorpay_payment_id' => $paymentId,
        'razorpay_signature' => $signature
    ];

    try {
        $api->utility->verifyPaymentSignature($attributes);

        $this->load->model('Apimodel');
        $this->Apimodel->tablename = 'orders';

        $data = [
            'category_id' => $category_id,
            'service_id' => $service_id,
            'link' => $link,
            'quantity' => $quantity,
            'amount' => $amount,
            'razorpay_payment_id' => $paymentId,
            'razorpay_order_id' => $orderId,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->Apimodel->insertData($data);

        echo json_encode(['status' => 'success', 'message' => 'Payment verified and order placed']);
    } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
        echo json_encode(['status' => 'error', 'message' => 'Payment verification failed']);
    }
}
