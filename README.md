# ThinkPHP5 支付宝电脑支付扩展库
## 单一支付和多种支付
- 单种支付指只有一种方法, 例如电脑支付, 但查询接口,关闭接口,退款,退款查询接口和对账单下载接口全部都包含
- 多种支付指该函目前所有的APP支付, 手机支付, 电脑支付和当面付, 不过是低耦合, 只选其中一部分删除企业也可以

## 使用说明
将文件夹拷贝到根目录即可, 其中<code>extend</code>目录为扩展目录, <code>application\extra\alipay.php</code>为配置文件

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
