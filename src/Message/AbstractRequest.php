<?php

namespace Omnipay\QPay\Message;

use Omnipay\Common\Message\AbstractRequest as AbstractCommomRequest;
use Omnipay\QPay\QpayMchAPI;

abstract class AbstractRequest extends AbstractCommomRequest
{
    protected $certFilePath;

    protected $mchId;

    protected $mchKey;

    protected $keyFilePath;

    protected $notifyUrl;

    protected $opUserId;

    protected $opUserPasswd;

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
     * @param string $key
     * @return mixed
     */
    protected function getParameter($key)
    {
        if (property_exists($this, $key)) {
            return $this->$key;
        }

        return parent::getParameter($key);
    }


    /**
     * @return mixed
     */
    public function getCertFilePath()
    {
        return $this->certFilePath;
    }

    /**
     * @param mixed $certFilePath
     */
    public function setCertFilePath($certFilePath)
    {
        $this->certFilePath = $certFilePath;
    }

    /**
     * @return mixed
     */
    public function getMchId()
    {
        return $this->mchId;
    }

    /**
     * @param mixed $mchId
     */
    public function setMchId($mchId)
    {
        $this->mchId = $mchId;
    }

    /**
     * @return mixed
     */
    public function getMchKey()
    {
        return $this->mchKey;
    }

    /**
     * @param mixed $mchKey
     */
    public function setMchKey($mchKey)
    {
        $this->mchKey = $mchKey;
    }

    /**
     * @return mixed
     */
    public function getKeyFilePath()
    {
        return $this->keyFilePath;
    }

    /**
     * @param mixed $keyFilePath
     */
    public function setKeyFilePath($keyFilePath)
    {
        $this->keyFilePath = $keyFilePath;
    }

    /**
     * @return mixed
     */
    public function getNotifyUrl()
    {
        return $this->notifyUrl;
    }

    /**
     * @param mixed $notifyUrl
     */
    public function setNotifyUrl($notifyUrl)
    {
        $this->notifyUrl = $notifyUrl;
    }

    /**
     * @return mixed
     */
    public function getOpUserId()
    {
        return $this->opUserId;
    }

    /**
     * @param mixed $opUserId
     */
    public function setOpUserId($opUserId)
    {
        $this->opUserId = $opUserId;
    }

    /**
     * @return mixed
     */
    public function getOpUserPasswd()
    {
        return $this->opUserPasswd;
    }

    /**
     * @param mixed $opUserPasswd
     */
    public function setOpUserPasswd($opUserPasswd)
    {
        $this->opUserPasswd = $opUserPasswd;
    }
}