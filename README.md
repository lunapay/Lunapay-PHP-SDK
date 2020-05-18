# Lunapay-PHP-SDK
Welcome to Lunapay PHP SDK. This repository contains Lunapay's PHP SDK and samples for REST API.

## Lunapay API Documentation
Refer [Lunapay API Documentation](https://docs.lunapay.com/) for more details. Here are few quick links to get you there faster.

* [Requesting Tokens](https://docs.lunapay.com/doc/token)
* [Send Secure Payment](https://docs.lunapay.com/doc/payment/secure)
* [Send Payment](https://docs.lunapay.com/doc/payment/normal)
* [Payment Callback Notification](https://docs.lunapay.com/doc/payment/callback)
* [Payment Status](https://docs.lunapay.com/doc/paymentstatus)
* [Get Payment Group Data](https://docs.lunapay.com/doc/paymentGroup/data)

## Getting Started
### Requesting Tokens

```php
	$this->current_url ='https://sandbox.lunapay.com';  //change to https://app.lunapay.com for production
	$this->client_id = ''; 
	$this->lunakey = '';
	$this->luna_signature_key = '';

``` 

