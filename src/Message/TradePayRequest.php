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

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->getParameter('body');
    }

    /**
     * @param mixed $body
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBody($body)
    {
        return $this->setParameter('body', $body);
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

    /**
     * @return mixed
     */
    public function getFeeType()
    {
        return $this->getParameter('fee_type');
    }

    /**
     * @param mixed $feeType
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setFeeType($feeType)
    {
        return $this->setParameter('fee_type', $feeType);
    }

    /**
     * @return mixed
     */
    public function getTotalFee()
    {
        return $this->getParameter('total_fee');
    }

    /**
     * @param mixed $totalFee
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setTotalFee($totalFee)
    {
        return $this->setParameter('total_fee', $totalFee);
    }

    /**
     * @return mixed
     */
    public function getSpbillCreateIp()
    {
        return $this->getParameter('spbill_create_ip');
    }

    /**
     * @param mixed $spbillCreateIp
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setSpbillCreateIp($spbillCreateIp)
    {
        return $this->setParameter('spbill_create_ip', $spbillCreateIp);
    }

    /**
     * @return mixed
     */
    public function getTradeType()
    {
        return $this->getParameter('trade_type');
    }

    /**
     * @param mixed $tradeType
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setTradeType($tradeType)
    {
        return $this->setParameter('trade_type', $tradeType);
    }
}
