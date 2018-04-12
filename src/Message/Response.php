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
        $data = $this->getData();

        if (
            is_array($data) &&
            // return_code，通信标识，取值：SUCCESS/FAIL
            isset($data['return_code']) &&
            $data['return_code'] === 'SUCCESS' &&

            // result_code，业务结果，取值：SUCCESS/FAIL
            isset($data['result_code']) &&
            $data['result_code'] === 'SUCCESS'
        ) {
            return true;
        }

        // 对账单下载
        // 成功返回是纯文本
        if (
            $this->getRequest() instanceof DownloadStatementRequest &&
            is_string($data)
        ) {
            return true;
        }

        return false;
    }
}