<?php

namespace Omnipay\QPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\QPay\Message\RefundRequest;

class Gateway extends AbstractGateway
{
    /***
     * @return string
     */
    public function getName()
    {
        return 'QPay';
    }

    /**
     * 需要参数：
     * refund_id 或 out_refund_no 或 transaction_id 或 out_trade_no，四者选一
     *
     * @see https://qpay.qq.com/qpaywiki/showdocument.php?pid=38&docid=63
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function refund(array $parameters = array())
    {
        return $this->createRequest(RefundRequest::class, $parameters);
    }
}