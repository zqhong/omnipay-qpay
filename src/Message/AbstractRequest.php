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
}