<?php

namespace alipay;

use think\Loader;

Loader::import('alipay.pagepay.service.AlipayTradeService');
loader::import('alipay.pagepay.buildermodel.AlipayTradeQueryContentBuilder');

/**
* 统一收单线下交易查询接口
*
* 用法:
* 调用 \alipay\Query::exec($query_no) 即可
*/
class Query
{
    // 商户订单号(out_trade_no) or 支付宝交易号(trade_no) 二选一
    const QUERY_TYPE = 'trade_no';

    public static function exec($query_no)
    {
        // 1.设置请求参数
        $RequestBuilder = new \AlipayTradeQueryContentBuilder();
        if (self::QUERY_TYPE == 'trade_no') {
            $RequestBuilder->setTradeNo(trim($query_no));
        } else {
            $RequestBuilder->setOutTradeNo($query_no);
        }

        // 2.获取配置
        $config = config('alipay');
        $aop    = new \AlipayTradeService($config);

        // 3.发起请求
        $response = $aop->Query($RequestBuilder);

        // 4.转为数组格式返回
        return json_decode(json_encode($response), true);
    }
}