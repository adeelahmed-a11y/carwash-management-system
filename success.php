<?php
include_once "header.php";
include_once "config.php";
// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();
 
    if ($response->isSuccessful()) {
        // The customer has successfully paid.
        $arr_body = $response->getData();
 
        $payment_id = $arr_body['id'];
        $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        $payer_email = $arr_body['payer']['payer_info']['email'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $currency = PAYPAL_CURRENCY;
        $payment_status = $arr_body['state'];
        
        $booking_id=$_SESSION['booking_id'];
        $sql="update booking set payment_id='$payment_id', payment_status='$payment_status' where id='$booking_id'";
        $result=mysqli_query($con,$sql);
        if($result){
            echo '<script>swal("Successfully", "Booking sent successfully", "success").then(function() { window.location = "booking.php";  });</script>';
        }
        else{
            echo '<script>swal("Error", "Sorry something went wrong", "error");</script>';
        }
    } else {
        echo $response->getMessage();
    }
} else {
    echo '<script>swal("Error", "Transaction is declined", "error");</script>';
}
?>
</body>
</html>