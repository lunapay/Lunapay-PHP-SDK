<?php

/**
 * Class Lunapay
 * @version 0.0.1
 * @copyright © 2019 LUNAPAY SDN BHD 
 */


class Lunapay
{
	 private $client_id;
	 private $lunakey;
	 private $luna_signature_key;
	 private $current_url;

	 public $token;
	 public $payment_id;

	 public $amount;
	 public $reference_no;
	 public $item;
	 public $quantity;
	 public $description;
	 public $callback_url;
	 public $redirect_url;
	 public $cancel_url;
	 public $phone;
	 public $email;
	 public $name;
	 public $group_id;
	
	 
	 public function __construct()
     {

        $this->current_url ='https://sandbox.lunapay.com';  //change to https://app.lunapay.com for production
        $this->client_id = ''; 
        $this->lunakey = '';
        $this->luna_signature_key = '';

        // please change client_id, lunakey and luna_signature_key parameters to your own. 
     }

    public function getToken(){

	    $curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->current_url.'/oauth/token',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => array('grant_type' => 'client_credentials','client_id' => $this->client_id,'client_secret' => $this->lunakey),
		));

		$response = curl_exec($curl);
		$response = json_decode($response);
		$token = $response->access_token;

		curl_close($curl);
		return $token;
    }

    public function checksum(){

    	$string = 'amount'.$this->amount
          .'|email'.$this->email
          .'|item'.$this->item
          .'|name'.$this->name
          .'|callback_url'.$this->callback_url
          .'|reference_no'.$this->reference_no;

    	return hash_hmac('sha256', $string, $this->luna_signature_key);
    }

    public function createPayment(){

    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->current_url.'/api/payments/payment/secure',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => array('amount' => $this->amount,'reference_no' => $this->reference_no,'item' => $this->item,'quantity' => $this->quantity,'description' => $this->description,'callback_url' => $this->callback_url,'redirect_url' => $this->redirect_url,'cancel_url' => $this->cancel_url,'phone' => $this->phone,'email' => $this->email,'name' => $this->name,'group_id' => $this->group_id,'checksum' => $this->checksum()),
		  CURLOPT_HTTPHEADER => array(
		    "Accept: application/json",
		    "Authorization: Bearer ".$this->token
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;

    }



    public function checkPaymentStatus(){
    	$curl = curl_init();

		 curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->current_url.'/api/payments/'.$this->payment_id.'/status',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer ".$this->token,
		    "Accept: application/json"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;

    }



}
?>