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

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->getParameter('transaction_id');
    }

    /**
     * @param mixed $transactionId
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setTransactionId($transactionId)
    {
        return $this->setParameter('transaction_id', $transactionId);
    }

    /**
     * @return mixed
     */
    public function getOutTradeNo()
    {
        return $this->getParameter('out_trade_out');
    }

    /**
     * @param mixed $outTradeNo
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setOutTradeNo($outTradeNo)
    {
        return $this->setParameter('out_trade_out', $outTradeNo);
    }
}