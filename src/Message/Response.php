<?php

namespace Omnipay\QPay\Message;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse
{
    /**
     * @return boolean
     */
    public function isSuccessful()
    {
        if (isset($this->getData()['return_code']) && $this->getData()['return_code'] === 'SUCCESS') {
            return true;
        }

        return false;
    }
}