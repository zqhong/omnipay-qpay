<?php

namespace Omnipay\QPay;

/**
 * @package Omnipay\QPay
 */
class QpayMchAPI
{
    protected $url;
    protected $isSSL;
    protected $timeout;
    protected $config = [
        'MCH_ID' => '',
        'SUB_MCH_ID' => '',
        'MCH_KEY' => '',
        'OP_USER_PASSWD' => '',
        'CERT_FILE_PATH' => '',
        'KEY_FILE_PATH' => '',
        'NOTIFY_URL' => '',
    ];

    /**
     * @param string $url 接口url
     * @param boolean $isSSL 是否使用证书发送请求
     * @param int $timeout 超时
     * @param array $config
     */
    public function __construct($url, $isSSL, $timeout = 5, $config = [])
    {
        $this->url = $url;
        $this->isSSL = $isSSL;
        $this->timeout = $timeout;
        $this->config = $config;
    }

    /**
     * 发送请求
     *
     * @param array $params
     * @return bool|mixed
     */
    public function reqQpay($params)
    {
        //商户号
        $params["mch_id"] = $this->config['MCH_ID'];
        //随机字符串
        $params["nonce_str"] = QpayMchUtil::createNoncestr();
        //签名
        $params["sign"] = QpayMchUtil::getSign($params, $this->config['MCH_KEY']);
        //生成xml
        $xml = QpayMchUtil::arrayToXml($params);

        if (isset($this->isSSL)) {
            $ret = $this->reqByCurlSSLPost($xml, $this->url, $this->timeout);
        } else {
            $ret = $this->reqByCurlNormalPost($xml, $this->url, $this->timeout);
        }
        return $ret;
    }

    /**
     * 发送退款请求
     *
     * @param array $orderInfo
     * @param integer $refundMoney
     * @return array
     */
    public function refund($orderInfo, $refundMoney)
    {
        if (!empty($orderInfo['QPayNo'])) {
            $params['transaction_id'] = $orderInfo['QPayNo'];
        } else {
            $params['out_trade_no'] = $orderInfo['tradeNO'];
        }

        $params['out_refund_no'] = $orderInfo['tradeNO'];
        $params['refund_fee'] = $refundMoney;

        $params['op_user_id'] = $this->config['MCH_ID'];
        $params['op_user_passwd'] = md5($this->config['OP_USER_PASSWD']);

        //商户号
        $params["mch_id"] = $this->config['MCH_ID'];
        //随机字符串
        $params["nonce_str"] = QpayMchUtil::createNoncestr();
        //签名
        $params["sign"] = QpayMchUtil::getSign($params, $this->config['MCH_KEY']);

        //生成xml
        $xml = QpayMchUtil::arrayToXml($params);

        $ret = $this->reqByCurlSSLPost($xml, 'https://api.qpay.qq.com/cgi-bin/pay/qpay_refund.cgi', 10);

        $result = QpayMchUtil::xmlToArray($ret);

        return $result;
    }

    /**
     * 查询订单
     *
     * @param array $order
     * @return array
     */
    public function orderQuery($order)
    {
        if (!empty($order->QPayNo)) {
            $params['transaction_id'] = $order->QPayNo;
        } else {
            $params['out_trade_no'] = $order['tradeNO'];
        }

        //商户号
        $params["mch_id"] = $this->config['MCH_ID'];
        //随机字符串
        $params["nonce_str"] = QpayMchUtil::createNoncestr();
        //签名
        $params["sign"] = QpayMchUtil::getSign($params, $this->config['MCH_KEY']);

        $qpayApi = new QpayMchAPI('https://qpay.qq.com/cgi-bin/pay/qpay_order_query.cgi', null, 10);
        $result = $qpayApi->reqQpay($params);

        return QpayMchUtil::xmlToArray($result);
    }

    /**
     * 通用curl 请求接口。post方式
     * @param     $params
     * @param     $url
     * @param int $timeout
     *
     * @return bool|mixed
     */
    public function reqByCurlNormalPost($params, $url, $timeout = 10)
    {
        return $this->reqByCurl($params, $url, $timeout, false);
    }

    /**
     * 使用ssl证书请求接口。post方式
     * @param     $params
     * @param     $url
     * @param int $timeout
     *
     * @return bool|mixed
     */
    public function reqByCurlSSLPost($params, $url, $timeout = 10)
    {
        return $this->reqByCurl($params, $url, $timeout, true);
    }

    private function reqByCurl($params, $url, $timeout = 10, $needSSL = false)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //是否使用ssl证书
        if (isset($needSSL) && $needSSL != false) {
            curl_setopt($ch, CURLOPT_SSLCERTTYPE, 'PEM');
            curl_setopt($ch, CURLOPT_SSLCERT, $this->config['CERT_FILE_PATH']);
            curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');
            curl_setopt($ch, CURLOPT_SSLKEY, $this->config['KEY_FILE_PATH']);
        }
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $ret = curl_exec($ch);
        if ($ret) {
            curl_close($ch);
            return $ret;
        } else {
            $error = curl_errno($ch);
            print_r($error);
            curl_close($ch);
            return false;
        }
    }
}