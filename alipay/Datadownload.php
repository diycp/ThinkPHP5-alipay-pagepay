<?php

namespace alipay;

use think\Loader;

Loader::import('alipay.pagepay.service.AlipayTradeService');
loader::import('alipay.pagepay.buildermodel.AlipayDataDataserviceBillDownloadurlQueryContentBuilder');

/**
* 统一收单线下交易查询接口
*
* 用法:
* 调用 \alipay\Datadownload::exec($bill_type, $bill_date) 即可
*/
class Datadownload
{
    /**
     * 主入口
     * @param  string $bill_type trade/signcustomer, trade指商户基于支付宝交易收单的业务账单；signcustomer是指基于商户支付宝余额收入及支出等资金变动的帐务账单；
     * @param  string $bill_date 日期, 单格式为yyyy-MM-dd，月账单格式为yyyy-MM。
     */
    public static function exec($bill_type, $bill_date)
    {
        // 1.校检参数
        self::checkParams($bill_type, $bill_date);

        // 2.设置请求参数
        $RequestBuilder = new \AlipayDataDataserviceBillDownloadurlQueryContentBuilder();
        $RequestBuilder->setBillType($bill_type);
        $RequestBuilder->setBillDate($bill_date);

        // 3.获取配置
        $config = config('alipay');
        $Response = new \AlipayTradeService($config);

        // 4.请求
        $result = $Response->downloadurlQuery($RequestBuilder);

        // 5.转为数组格式返回
        return json_decode(json_encode($result), true);
    }

    /**
     * 校检参数
     */
    private static function checkParams($bill_type, $bill_date)
    {
        if (!in_array($bill_type, ['trade', 'signcustomer'])) {
            self::processError('账单类型不正确');
        }

        if (!strtotime($bill_date)) {
            self::processError('日期格式不正确');
        }
    }

    /**
     * 统一错误处理接口
     * @param  string $msg 错误描述
     */
    private static function processError($msg)
    {
        throw new \think\Exception($msg);
    }
}