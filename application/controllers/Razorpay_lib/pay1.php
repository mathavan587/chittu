<!-- Razorpay and jQuery -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>

    var options = {
        "key": "<?= $keyId ?>", 
        "amount": "<?= $data["data"]['amt'] ?>", 
        "currency": "INR",
        "name": "Chittu",
        "description": "Purchase Description",
        "order_id": "<?= $orderId ?>", 
        "handler": function (response){
   
                $.ajax({
                    url: '<?=base_url('user/verify_payment')?>',
                    type: 'POST',
                    data: {
                        razorpay_payment_id: response.razorpay_payment_id,
                        razorpay_order_id: response.razorpay_order_id, 
                        razorpay_signature: response.razorpay_signature,
                        category: '<?=$data["data"]['category']?>',
                        service: '<?=$data["data"]['service']?>',
                        link: '<?=$data["data"]['link']?>',
                        quantity: '<?=$data["data"]['quantity']?>',
                        amount: '<?=$data["data"]['amt']?>',
                        user_id: '<?=$data["data"]['user_id']?>'
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Payment Verified!',
                            text: 'Your payment was successfully verified.',
                            confirmButtonColor: '#3085d6'
                        });
                        console.log(data);
                    },
                    error: function(err) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Verification Failed!',
                            text: 'Could not verify your payment.',
                            confirmButtonColor: '#d33'
                        });
                        console.log(err);
                    }
                });
        },
        "prefill": {
            "name": "<?= $data["data"]['name'] ?>",
            "email": "<?= $data["data"]['email'] ?>",
            "contact": "<?=$data["data"]['contact']?>"
        }
    };

    var rzp1 = new Razorpay(options);
    rzp1.open();
</script>
