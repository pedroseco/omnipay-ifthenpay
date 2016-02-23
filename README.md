Ifthenpay gateway for Omnipay
==============
![Multibanco](https://raw.githubusercontent.com/ifthenpay/omnipay-ifthenpay/master/mb.png)

**This is the Ifthenpay gateway for omnipay payment processing library**

[![Build Status](https://travis-ci.org/ifthenpay/omnipay-ifthenpay.svg?branch=master)](https://travis-ci.org/ifthenpay/omnipay-ifthenpay)
[![Latest Stable Version](https://poser.pugx.org/ifthenpay/omnipay-ifthenpay/v/stable)](https://packagist.org/packages/ifthenpay/omnipay-ifthenpay) [![License](https://poser.pugx.org/ifthenpay/omnipay-ifthenpay/license)](https://packagist.org/packages/ifthenpay/omnipay-ifthenpay)

Ifthenpay is one Portuguese payment method that allows the customer to pay by bank reference.
This plugin will allow you to generate a payment Reference that the customer can then use to pay for his order on the ATM or Home Banking service. This plugin uses one of the several gateways/services available in Portugal, IfthenPay, and a contract with this company is required. See more at [Ifthenpay](https://ifthenpay.com).

### Composer Configuration

Include the omnipay-ifthenpay package as a dependency in your `composer.json`:

    "ifthenpay/omnipay-ifthen": "1.*"

### Installation

Run `composer install` to download the dependencies.

### Usage
**Create a MB Reference**
```php
use Omnipay\Omnipay;

//you should use our own 50 char length key
$chaveAntiPhishing = "XXXXXX";

// Setup payment gateway
$gateway = Omnipay::create('Ifthenpay');

$gateway->setEntidade("XXXXX");
$gateway->setSubEntidade("XXX");
$gateway->setCurrency('EUR');
$gateway->setChaveAntiPhishing($chaveAntiPhishing);

$response = $gateway->purchase(['amount' => '100.99', 'transactionId' => '1'])->send();

if ($response->isSuccessful()) {
    // payment was successful: update database and store the transaction details
    $dadosMB = json_decode($response->getTransactionDetails());

    echo "Entidade: ".$dadosMB->entidade;
    echo "<br/>Referencia: ".$dadosMB->transactionReference;
    echo "<br/>Valor: ".$dadosMB->valor;
}
```

**Callback Validation**

```php
$response = $gateway->completePurchase(array('transactionReference' => '995 000 109','amount' => '100.99','currency' => 'EUR', 'ChaveAntiPhishingCallback' => 'XXXXXX'))->send();

if ($response->isSuccessful())
{
    //Configured AntiPhishing key matches with the received AntiPhishing key
    //This means that the payment was made
    echo "Sucesso";
}
```
