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
}