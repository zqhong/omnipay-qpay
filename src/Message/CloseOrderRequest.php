<?php

namespace Omnipay\QPay\Message;

class CloseOrderRequest extends AbstractRequest
{
    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return 'https://qpay.qq.com/cgi-bin/pay/qpay_close_order.cgi';
    }
}