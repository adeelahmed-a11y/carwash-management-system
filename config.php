<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
 
define('CLIENT_ID', 'AfpPFfqyYFVWrvTxHok500Jfr6H5imd-WSi5aLL71Ffbx4peES54ye45YJtS4ylHfFmTq9I4ee5rTWMH');
define('CLIENT_SECRET', 'EH7Y12GxBIOdGT_0D9qSSI6b0MzzKaw0C-_WJERucvnSeDJ_eyawUjYA8oaDPsbb-z9wJZdUB3rsk4fw');
 
define('PAYPAL_RETURN_URL', 'http://localhost/final/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/final/cancel.php');
define('PAYPAL_CURRENCY', 'USD'); // set your currency here
 
$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live