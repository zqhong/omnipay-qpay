<?php

namespace Omnipay\QPay\Message;

class DownloadStatementRequest extends AbstractRequest
{
    protected $billDate;

    protected $billType;

    protected $tarType;

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return 'https://qpay.qq.com/cgi-bin/sp_download/qpay_mch_statement_down.cgi';
    }

    /**
     * @return mixed
     */
    public function getBillDate()
    {
        return $this->billDate;
    }

    /**
     * @param mixed $billDate
     */
    public function setBillDate($billDate)
    {
        $this->billDate = $billDate;
    }

    /**
     * @return mixed
     */
    public function getBillType()
    {
        return $this->billType;
    }

    /**
     * @param mixed $billType
     */
    public function setBillType($billType)
    {
        $this->billType = $billType;
    }

    /**
     * @return mixed
     */
    public function getTarType()
    {
        return $this->tarType;
    }

    /**
     * @param mixed $tarType
     */
    public function setTarType($tarType)
    {
        $this->tarType = $tarType;
    }
}