<?php
require 'vendor/autoload.php';
use Razorpay\Api\Api;

class amt
{

    public function pay($data)
    {

        include 'config.php';

        $api   = new Api($keyId, $keySecret);
        $order = $api->order->create([
            'receipt'         => 'ORD_12345',
            'amount'          => $data["data"]['amt'], // Amount in paise (50000 paise = ₹500)
            'currency'        => 'INR',
            'payment_capture' => 1, // Auto-capture payment

        ]);

        $orderId = $order['id'];

        include 'pay1.php';
// $this->verify_payment();
    }

    public function verify_payment($data)
    {
      include 'config.php';
      $api = new Api($keyId,$keySecret);
      
  
      $paymentId = $data['razorpay_payment_id'];
      $orderId = $data['razorpay_order_id'];
      $signature = $data['razorpay_signature'];
      $attributes = [
          'razorpay_order_id' => $orderId,
          'razorpay_payment_id' => $paymentId,
          'razorpay_signature' => $signature
      ];

    //   print_r($data);
  
      try {     
          $attributes = [
              'razorpay_order_id' => $orderId,
              'razorpay_payment_id' => $paymentId,
              'razorpay_signature' => $signature
          ];
      
          $api->utility->verifyPaymentSignature($attributes);
  //   print_r($attributes);
          echo "Payment Verified Successfully!";
      } catch (Exception $e) {
          echo "Payment Verification Failed!";
      }
    }
}
