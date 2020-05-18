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
You can requesting tokens by doing the following configuaration at ```sdk\Lunapay.php``` line 38-40
```php
$this->client_id = 'your-client-id'; 
$this->lunakey = 'your-lunakey';
$this->luna_signature_key = 'your-signature-key';

``` 

### Send Payment 
***You required to configure the following code at ```payment.php``` to send payment.***
```php
$lunapay->amount = 'your-payment-amount'; 
$lunapay->reference_no = 'your-reference-no'; 
$lunapay->item = 'your-item'; 
$lunapay->callback_url = 'your-callback-url'; 
$lunapay->email = 'your-email'; 
$lunapay->name = 'your-name'; 
```

Specify the redirect_url if you want to redirect to your site after payment complete, only receipt will display if redirect_url is not present after payment complete
```php
$lunapay->redirect_url = 'your-redirect-url'; 
```

Specify the cancel url if you want to have cancel indicator at payment page
```php
$lunapay->redirect_url = 'your-redirect-url'; 
```

