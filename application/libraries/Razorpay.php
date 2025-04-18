<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require  'vendor/autoload.php'; // Load Composer's autoloader

use Razorpay\Api\Api;

class Razorpay {
    private $api;

    public function __construct() {
        $api_key = config_item('razorpay_key');  // Your Razorpay Key ID
        $api_secret = config_item('razorpay_secret'); // Your Razorpay Secret
        $this->api = new Api($api_key, $api_secret);
    }

    public function get_api_instance() {
        return $this->api;
    }
}
