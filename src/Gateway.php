<?php

namespace Omnipay\QPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\QPay\Message\CloseOrderRequest;
use Omnipay\QPay\Message\DownloadStatementRequest;
use Omnipay\QPay\Message\QueryOrderRequest;
use Omnipay\QPay\Message\QueryRefundRequest;
use Omnipay\QPay\Message\RefundRequest;
use Omnipay\QPay\Message\TradePayRequest;

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
     * 支付
     *
     * @see https://qpay.qq.com/qpaywiki/showdocument.php?pid=38&docid=58
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(TradePayRequest::class, $parameters);
    }

    /**
     * 订单查询
     *
     * @see https://qpay.qq.com/qpaywiki/showdocument.php?pid=38&docid=60
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function queryOrder(array $parameters = [])
    {
        return $this->createRequest(QueryOrderRequest::class, $parameters);
    }

    /**
     * 关闭订单
     *
     * @see https://qpay.qq.com/qpaywiki/showdocument.php?pid=38&docid=61
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function closeOrder(array $parameters = [])
    {
        return $this->createRequest(CloseOrderRequest::class, $parameters);
    }

    /**
     * 申请退款
     *
     * @see https://qpay.qq.com/qpaywiki/showdocument.php?pid=38&docid=62
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest(RefundRequest::class, $parameters);
    }

    /**
     * 退款查询
     *
     * @see https://qpay.qq.com/qpaywiki/showdocument.php?pid=38&docid=63
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function queryRefund(array $parameters = [])
    {
        return $this->createRequest(QueryRefundRequest::class, $parameters);
    }

    /**
     * 对账单下载
     *
     * @see https://qpay.qq.com/qpaywiki/showdocument.php?pid=38&docid=64
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function downloadStatement(array $parameters = [])
    {
        return $this->createRequest(DownloadStatementRequest::class, $parameters);
    }
}