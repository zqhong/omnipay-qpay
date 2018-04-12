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

    /**
     * @return mixed
     */
    public function getRefundId()
    {
        return $this->getParameter('refund_id');
    }

    /**
     * @param mixed $refundId
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setRefundId($refundId)
    {
        return $this->setParameter('refund_id', $refundId);
    }

    /**
     * @return mixed
     */
    public function getOutRefundNo()
    {
        return $this->getParameter('out_refund_no');
    }

    /**
     * @param mixed $outRefundNo
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setOutRefundNo($outRefundNo)
    {
        return $this->setParameter('out_refund_no', $outRefundNo);
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
        return $this->getParameter('out_trade_no');
    }

    /**
     * @param mixed $outTradeNo
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setOutTradeNo($outTradeNo)
    {
        return $this->setParameter('out_trade_no', $outTradeNo);
    }
}