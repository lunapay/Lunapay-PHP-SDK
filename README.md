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
***You required to configure the following code at*** ```payment.php``` ***to send payment.***
```php
$lunapay->amount = 'payment-amount'; 
$lunapay->reference_no = 'payment-reference-no'; 
$lunapay->item = 'payment-item'; 
$lunapay->callback_url = 'payment-callback-url'; 
$lunapay->email = 'customer-email'; 
$lunapay->name = 'customer-name'; 
```

Specify the **redirect_url** if you want to redirect to your site after payment complete, leave it blank will display lunapay payment receipt.
```php
$lunapay->redirect_url = 'payment-redirect-url'; 
```

Specify the **cancel_url** if you want to have cancel indicator at payment page
```php
$lunapay->cancel_url = 'payment-cancel-url'; 
```

Specify the **group_id** if you want generate payment link on specific group. You can create new group id at lunapay dashboard, leave it blank will automatically added the payment link to default group.
```php
$lunapay->group_id = 'payment-group-id'; 
```

Specify all of this to added more information when send payment
```php
$lunapay->quantity = 'payment-item-quantity';
$lunapay->description = 'payment-item-description';
$lunapay->phone = 'customer-phone';
```