## Omnipay：QPay


### 安装
```bash
$ composer require -vvv zqhong/omnipay-qpay
```

### 使用
```php
<?php

include __DIR__ . '/vendor/autoload.php';

use Omnipay\Omnipay;

$gateway = Omnipay::getFactory()->create("QPay")
    ->setMchId('')
    ->setMchKey('')
    ->setCertFilePath('')
    ->setKeyFilePath('')
    ->setNotifyUrl('')
    ->setOpUserPasswd('');

// 订单查询
// 参数请参考：https://qpay.qq.com/qpaywiki/showdocument.php?pid=1&docid=5
$queryOrderRequest = $gateway->queryOrder([
    'transaction_id' => '',
]);
$queryOrderResponse = $queryOrderRequest->send();
if ($queryOrderResponse->isSuccessful()) {
    // 订单查询成功操作
}
```