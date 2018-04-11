<?php

namespace Omnipay\QPay\Message;

use Omnipay\Common\Message\AbstractRequest as AbstractCommomRequest;
use Omnipay\QPay\QpayMchAPI;

abstract class AbstractRequest extends AbstractCommomRequest
{
    protected $mchId;

    protected $mchKey;

    protected $certFilePath;

    protected $keyFilePath;

    protected $notifyUrl;

    protected $opUserPassword;

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
            'MCH_ID' => $this->getMchId(),
            'SUB_MCH_ID' => '',
            'MCH_KEY' => $this->getMchKey(),
            'OP_USER_PASSWD' => $this->getOpUserPassword(),
            'CERT_FILE_PATH' => $this->getCertFilePath(),
            'KEY_FILE_PATH' => $this->getKeyFilePath(),
            'NOTIFY_URL' => $this->getNotifyUrl(),
        ]);

        $result = $api->reqQpay($data);
        return new Response($this, $result);
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
    public function getOpUserPassword()
    {
        return $this->opUserPassword;
    }

    /**
     * @param mixed $opUserPassword
     */
    public function setOpUserPassword($opUserPassword)
    {
        $this->opUserPassword = $opUserPassword;
    }


}