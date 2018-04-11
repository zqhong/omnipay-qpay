<?php

namespace Omnipay\QPay\Message;

use Omnipay\Common\Message\AbstractRequest as AbstractCommomRequest;
use Omnipay\QPay\QpayMchUtil;

/**
 * @package Omnipay\QPay\Message
 */
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

    /**
     * @return string
     */
    public function getData()
    {
        $data = $this->parameters->all();

        $data['op_user_id'] = $this->mchId;
        $data['op_user_passwd'] = md5($this->opUserPassword);
        $data['nonce_str'] = QpayMchUtil::createNoncestr();
//        $data['sign'] = QpayMchUtil::getSign($data, $this->mchKey);

        $xml = QpayMchUtil::arrayToXml($data);

        return $xml;
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
        foreach ($data as $k => $v) {
            $this->setParameter($k, $v);
        }
        $xml = $this->getData();

        $this
            ->httpClient
            ->setConfig([
                'curl.options' => [
                    CURLOPT_SSLCERTTYPE => 'PEM',
                    CURLOPT_SSLCERT => $this->getCertFilePath(),
                    CURLOPT_SSLKEYTYPE => 'PEM',
                    CURLOPT_SSLKEY => $this->getKeyFilePath(),
                ],
            ])
            ->post($this->getEndpoint())
            ->setBody($xml)
            ->send()
            ->getBody();
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