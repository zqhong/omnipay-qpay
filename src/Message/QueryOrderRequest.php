<?php

namespace Omnipay\QPay\Message;

class QueryOrderRequest extends AbstractRequest
{
    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return 'https://qpay.qq.com/cgi-bin/pay/qpay_order_query.cgi';
    }
}