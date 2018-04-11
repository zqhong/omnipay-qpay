<?php

namespace Omnipay\QPay\Message;

class QueryRefundRequest extends AbstractRequest
{
    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return 'https://qpay.qq.com/cgi-bin/pay/qpay_refund_query.cgi';
    }
}