<?php

namespace Omnipay\QPay\Message;

class TradePayRequest extends AbstractRequest
{
    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return 'https://qpay.qq.com/cgi-bin/pay/qpay_unified_order.cgi';
    }
}
