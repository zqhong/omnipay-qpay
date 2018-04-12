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

    /**
     * @return mixed
     */
    public function getBillDate()
    {
        return $this->getParameter('bill_date');
    }

    /**
     * @param mixed $billDate
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBillDate($billDate)
    {
        return $this->setParameter('bill_date', $billDate);
    }

    /**
     * @return mixed
     */
    public function getBillType()
    {
        return $this->getParameter('bill_type');
    }

    /**
     * @param mixed $billType
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBillType($billType)
    {
        return $this->setParameter('bill_type', $billType);
    }

    /**
     * @return mixed
     */
    public function getTarType()
    {
        return $this->getParameter('tar_type');
    }

    /**
     * @param mixed $tarType
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setTarType($tarType)
    {
        return $this->setParameter('tar_type', $tarType);
    }
}