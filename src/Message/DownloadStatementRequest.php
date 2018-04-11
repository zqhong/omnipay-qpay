<?php

namespace Omnipay\QPay\Message;

class DownloadStatementRequest extends AbstractRequest
{
    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return 'https://qpay.qq.com/cgi-bin/sp_download/qpay_mch_statement_down.cgi';
    }
}