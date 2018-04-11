<?php

namespace Omnipay\QPay;

class QpayMchUtil
{
    /**
     * 生成随机串
     * @param int $length
     *
     * @return string
     */
    public static function createNoncestr($length = 32)
    {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    /**
     * 将参数转为hash形式
     * @param $params
     * @return string
     */
    public static function buildQueryStr($params)
    {
        $arrTmp = array();
        foreach ($params as $k => $v) {
            //参数为空不参与签名
            if (isset($v) && $v != '') {
                array_push($arrTmp, "$k=$v");
            }
        }
        return implode('&', $arrTmp);
    }

    /**
     * 获取参数签名
     *
     * @param $params
     * @param string $mchKey
     * @return string
     */
    public static function getSign($params, $mchKey)
    {
        //第一步：对参数按照key=value的格式，并按照参数名ASCII字典序排序
        ksort($params);
        $stringA = QpayMchUtil::buildQueryStr($params);
        //第二步：拼接API密钥并md5
        $stringA = $stringA . "&key=" . $mchKey;
        $stringA = md5($stringA);
        //转成大写
        $sign = strtoupper($stringA);
        return $sign;
    }

    /**
     * 数组转换成xml字符串
     * @param $arr
     * @return string
     */
    public static function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key => $val) {
            if (is_numeric($val)) {
                $xml .= "<$key>$val</$key>";
            } else
                $xml .= "<$key><![CDATA[$val]]></$key>";
        }
        $xml .= "</xml>";
        return $xml;
    }

    /**
     * xml转换成数组
     * @param $xml
     * @return array
     */
    public static function xmlToArray($xml)
    {
        $arr = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $arr;
    }
}
