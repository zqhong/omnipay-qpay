<?php

namespace Omnipay\QPay\Message;

use Omnipay\Common\Message\AbstractRequest as AbstractCommomRequest;
use Omnipay\QPay\QpayMchAPI;

abstract class AbstractRequest extends AbstractCommomRequest
{
    /**
     * @return string
     */
    abstract protected function getEndpoint();

    public function getData()
    {
        return $this->getParameters();
    }

    /**
     * Get send data.
     *
     * @param  mixed $data
     * @return Response
     * @throws \Exception
     */
    public function sendData($data)
    {
        $api = new QpayMchAPI($this->getEndpoint(), true, 5, [
            'MCH_ID' => $this->getParameter('mch_id'),
            'SUB_MCH_ID' => '',
            'MCH_KEY' => $this->getParameter('mch_key'),
            'OP_USER_PASSWD' => $this->getParameter('op_user_passwd'),
            'CERT_FILE_PATH' => $this->getParameter('cert_file_path'),
            'KEY_FILE_PATH' => $this->getParameter('key_file_path'),
            'NOTIFY_URL' => $this->getParameter('notify_url'),
        ]);

        $result = $api->reqQpay($data);
        return new Response($this, $result);
    }

    /**
     * @return mixed
     */
    public function getCertFilePath()
    {
        return $this->getParameter('cert_file_path');
    }

    /**
     * @param mixed $certFilePath
     * @return AbstractCommomRequest
     */
    public function setCertFilePath($certFilePath)
    {
        return $this->setParameter('cert_file_path', $certFilePath);
    }

    /**
     * @return mixed
     */
    public function getMchId()
    {
        return $this->getParameter('mch_id');
    }

    /**
     * @param mixed $mchId
     * @return AbstractCommomRequest
     */
    public function setMchId($mchId)
    {
        return $this->setParameter('mch_id', $mchId);
    }

    /**
     * @return mixed
     */
    public function getMchKey()
    {
        return $this->getParameter('mch_key');
    }

    /**
     * @param mixed $mchKey
     * @return AbstractCommomRequest
     */
    public function setMchKey($mchKey)
    {
        return $this->setParameter('mch_key', $mchKey);
    }

    /**
     * @return mixed
     */
    public function getKeyFilePath()
    {
        return $this->getParameter('key_file_path');
    }

    /**
     * @param mixed $keyFilePath
     * @return AbstractCommomRequest
     */
    public function setKeyFilePath($keyFilePath)
    {
        return $this->setParameter('key_file_path', $keyFilePath);
    }

    /**
     * @return mixed
     */
    public function getNotifyUrl()
    {
        return $this->getParameter('notify_url');
    }

    /**
     * @param mixed $notifyUrl
     * @return AbstractCommomRequest
     */
    public function setNotifyUrl($notifyUrl)
    {
        return $this->setParameter('notify_url', $notifyUrl);
    }

    /**
     * @return mixed
     */
    public function getOpUserId()
    {
        return $this->getParameter('op_user_id');
    }

    /**
     * @param mixed $opUserId
     * @return mixed
     */
    public function setOpUserId($opUserId)
    {
        return $this->getParameter('op_user_id');
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
}