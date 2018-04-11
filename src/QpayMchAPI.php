<?php

namespace Omnipay\QPay;

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

        $this->config['MCH_ID'] = $config['MCH_ID'];
        $this->config['SUB_MCH_ID'] = $config['SUB_MCH_ID'];
        $this->config['MCH_KEY'] = $config['MCH_KEY'];
        $this->config['OP_USER_PASSWD'] = $config['OP_USER_PASSWD'];
        $this->config['CERT_FILE_PATH'] = $config['CERT_FILE_PATH'];
        $this->config['KEY_FILE_PATH'] = $config['KEY_FILE_PATH'];
        $this->config['NOTIFY_URL'] = $config['NOTIFY_URL'];
    }

    /**
     * 发送请求
     *
     * @param array $params
     * @return array
     */
    public function reqQpay($params)
    {
        $params["mch_id"] = $this->config['MCH_ID'];
        $params["nonce_str"] = QpayMchUtil::createNoncestr();
        $params['notify_url'] = $this->config['NOTIFY_URL'];
        $params['op_user_id'] = $this->config['MCH_ID'];
        $params['op_user_passwd'] = md5($this->config['OP_USER_PASSWD']);

        $params["sign"] = QpayMchUtil::getSign($params, $this->config['MCH_KEY']);
        $xml = QpayMchUtil::arrayToXml($params);

        if (isset($this->isSSL)) {
            $ret = $this->reqByCurlSSLPost($xml, $this->url, $this->timeout);
        } else {
            $ret = $this->reqByCurlNormalPost($xml, $this->url, $this->timeout);
        }

        return (array)QpayMchUtil::xmlToArray($ret);
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
            curl_close($ch);
            return false;
        }
    }
}