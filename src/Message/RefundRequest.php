<?php

namespace Omnipay\QPay\Message;

class RefundRequest extends AbstractRequest
{
    protected $transactionId;

    protected $outTradeNo;

    protected $outRefundNo;

    protected $refundFee;

    protected $refundAccount;

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return 'https://api.qpay.qq.com/cgi-bin/pay/qpay_refund.cgi';
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param mixed $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return mixed
     */
    public function getOutTradeNo()
    {
        return $this->outTradeNo;
    }

    /**
     * @param mixed $outTradeNo
     */
    public function setOutTradeNo($outTradeNo)
    {
        $this->outTradeNo = $outTradeNo;
    }

    /**
     * @return mixed
     */
    public function getOutRefundNo()
    {
        return $this->outRefundNo;
    }

    /**
     * @param mixed $outRefundNo
     */
    public function setOutRefundNo($outRefundNo)
    {
        $this->outRefundNo = $outRefundNo;
    }

    /**
     * @return mixed
     */
    public function getRefundFee()
    {
        return $this->refundFee;
    }

    /**
     * @param mixed $refundFee
     */
    public function setRefundFee($refundFee)
    {
        $this->refundFee = $refundFee;
    }

    /**
     * @return mixed
     */
    public function getRefundAccount()
    {
        return $this->refundAccount;
    }

    /**
     * @param mixed $refundAccount
     */
    public function setRefundAccount($refundAccount)
    {
        $this->refundAccount = $refundAccount;
    }
}