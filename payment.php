<?php

require_once 'sdk/Lunapay.php';

$lunapay = new Lunapay();
$lunapay->token = $lunapay->getToken();
$lunapay->amount = $_POST['amount']; 
$lunapay->reference_no = date("YmdHis"); 
$lunapay->item = $_POST['item']; 
$lunapay->quantity = '';
$lunapay->description = '';
$lunapay->callback_url = 'https://webhook.site/bfe3cbd8-e879-4e72-bf81-69d5d5c6d8f3'; 
$lunapay->redirect_url = ''; 
$lunapay->cancel_url = ''; 
$lunapay->phone = '';
$lunapay->email = $_POST['email']; 
$lunapay->name = $_POST['name']; 
$lunapay->group_id = ''; 

$payment =  json_decode($lunapay->createPayment());
$payment_link = $payment->payment_url;

header("Location: ".$payment_link);