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
        return 'https://api.qpay.qq.com/cgi-bin/pay/qpay_refund.cgi';
    }
}