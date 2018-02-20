"# laravel-pay" 
# install  
    composer require julong/pay   
    composer require julong/laravel-pay  
    php artisan vendor:publish  
# config  
## edit config/app.php  
### add aliases   
    'pay' => Julong\LaravelPay\Facades\pay::class ,
### providers  
    \Julong\LaravelPay\PayServiceProvider::class , 
## edit config/pay.php  
   此处配置请自行修改   
# Use   
### write in your controller
//setParam($subject="test",$total_amount =  "0.01",$body= "购买测试商品0.01元",$timeout_express = "1m")   

    $alipay = Pay::alipay();   
    $content = $alipay->setParam()->toPay();   
    echo $content;   
## return_url    
### use   
    $alipay = Pay::alipay();   
    $res = $alipay->returnUrl();   
### return   
      return [
          'out_trade_no'=>'',//商户订单号
          'trade_no'=>'',//支付宝交易号
          ];

## notify_url    
### use   
    $alipay = Pay::alipay();   
    $res = $alipay->checkSyncPay();   
### return     
     return [  
          'out_trade_no'=>'',//商户订单号  
          'trade_no'=>'',//支付宝交易号  
          'trade_status'=>'',//交易状态  
        ];    
 
# 微信   
## 用法  
### 支付
    $payModel = Pay::wechat()
                         ->setParam(
                          100,
                          date('YmdHis')
                         )->toPay();
     echo ($payModel);
    /**
     * function setParam
     * @param string $total_fee 总金额（元）
     * @param string $out_trade_no 订单号
     * @param string $body 标题如 武汉光谷-周黑鸭
     * @param string $redirectUrl 支付完成同步跳转路径
     * @param string $timeout_express 订单过期时间如201802202359
     * @param string $fee_type 默认CNY
     * @param string $attach 附加数据如 武汉光谷分店
     * @param string $trade_type 默认MWEB
     * @param string $detail  订单详情默认空
     * @param string $device_info 设备号默认空
     * @return $this
     */
     
### 核验
    $out_trade_no = 201802212359;
    $payModel = Pay::wechat()->toCheck($out_trade_no);
