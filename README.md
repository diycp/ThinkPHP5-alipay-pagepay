# ThinkPHP5 支付宝电脑支付扩展库（2017年7月21日）
## 单一支付和多种支付
- 单种支付指只包含电脑网站支付、手机网站支付、APP支付、当面付其中一种，和 交易查询接口、交易关闭接口、交易退款接口、交易退款查询接口和查询账单下载地址接口
- 多种支付指该函目前所有的电脑网站支付、手机网站支付、APP支付、当面付和其他统一接口

## 使用说明
- 在默认配置情况下，将文件夹拷贝到根目录即可, 其中<code>extend</code>目录为支付扩展目录, <code>application\extra\alipay.php</code>为配置文件
- 需要在配置文件<code>application\extra\alipay.php</code>中填写必要的参数

## 注意
错误采用抛出异常的方式, 可根据自己的业务在统一接口进行修改

## 用法
#### 电脑网站支付 Pagepay.php
调用 <code>\alipay\Pagepay::pay($params)</code> 即可

#### 交易查询接口 Query.php
调用 <code>\alipay\Query::exec($query_no)</code> 即可

#### 交易退款接口 Refund.php
调用 <code>\alipay\Refund::exec($params)</code> 即可

#### 退款统一订单查询 RefundQuery.php
调用 <code>\alipay\RefundQuery::exec($params)</code> 即可

#### 交易关闭接口 Close.php
调用 <code>\alipay\Close::exec($query_no)</code> 即可

#### 查询账单下载地址接口 Datadownload.php
调用 <code>\alipay\Datadownload::exec($bill_type, $bill_date)</code> 即可
