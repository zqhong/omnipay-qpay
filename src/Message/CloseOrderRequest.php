<?php

namespace Omnipay\QPay\Message;

class CloseOrderRequest extends AbstractRequest
{
    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return 'https://qpay.qq.com/cgi-bin/pay/qpay_close_order.cgi';
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
}