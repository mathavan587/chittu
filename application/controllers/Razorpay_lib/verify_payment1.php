<?php
require 'vendor/autoload.php';
use Razorpay\Api\Api;   
include 'config.php';
    $api = new Api($keyId,$keySecret);
    

    $paymentId = $this->input->post('razorpay_payment_id');
    $orderId = $this->input->post('razorpay_order_id');
    $signature = $this->input->post('razorpay_signature');
    $attributes = [
        'razorpay_order_id' => $orderId,
        'razorpay_payment_id' => $paymentId,
        'razorpay_signature' => $signature
    ];

    try {
        $attributes = [
            'razorpay_order_id' => $orderId,
            'razorpay_payment_id' => $paymentId,
            'razorpay_signature' => $signature
        ];
    
        $api->utility->verifyPaymentSignature($attributes);
  print_r($attributes);
        echo "Payment Verified Successfully!";
    } catch (Exception $e) {
        echo "Payment Verification Failed!";
    }