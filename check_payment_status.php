<?php

require_once 'sdk/Lunapay.php';

$lunapay = new Lunapay();
$lunapay->token = $lunapay->getToken();
$lunapay->payment_id = '994606717568'; //get payment_id from callback or redirect page

echo $status = $lunapay->checkPaymentStatus();