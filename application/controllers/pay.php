<?php
include "Razorpay_lib/amt.php";
$amt  = new amt();
$data = (["data" => [
    "name"    => "Mathavan",
    "email"   => "lokki@gmail.com",
    "contact" => "8148668359",
    "amt"     => "50000",
],
]);
$amt->pay($data);
