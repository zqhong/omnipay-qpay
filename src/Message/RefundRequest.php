<?php

namespace Omnipay\QPay\Message;

/**
 * @package Omnipay\QPay\Message
 */
class RefundRequest extends AbstractRequest
{
    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return 'https://qpay.qq.com/cgi-bin/pay/qpay_refund_query.cgi';
    }
}