<?php

namespace Omnipay\QPay\Message;

use Omnipay\Common\Message\AbstractRequest as AbstractCommomRequest;

class RefundRequest extends AbstractRequest
{
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
        return $this->getParameter('transaction_id');
    }

    /**
     * @param mixed $transactionId
     * @return AbstractCommomRequest
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
     * @return AbstractCommomRequest
     */
    public function setOutTradeNo($outTradeNo)
    {
        return $this->setParameter('out_trade_no', $outTradeNo);
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
     * @return AbstractCommomRequest
     */
    public function setOutRefundNo($outRefundNo)
    {
        return $this->setParameter('out_refund_no', $outRefundNo);
    }

    /**
     * @return mixed
     */
    public function getRefundFee()
    {
        return $this->getParameter('refund_fee');
    }

    /**
     * @param mixed $refundFee
     * @return AbstractCommomRequest
     */
    public function setRefundFee($refundFee)
    {
        return $this->setParameter('refund_fee', $refundFee);
    }

    /**
     * @return mixed
     */
    public function getRefundAccount()
    {
        return $this->getParameter('refund_account');
    }

    /**
     * @param mixed $refundAccount
     * @return AbstractCommomRequest
     */
    public function setRefundAccount($refundAccount)
    {
        return $this->setParameter('refund_account', $refundAccount);
    }

    /**
     * @return mixed
     */
    public function getOpUserPasswd()
    {
        return $this->getParameter('op_user_passwd');
    }

    /**
     * @param mixed $opUserPasswd
     * @return AbstractCommomRequest
     */
    public function setOpUserPasswd($opUserPasswd)
    {
        return $this->setParameter('op_user_passwd', $opUserPasswd);
    }
}