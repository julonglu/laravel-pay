"# laravel-pay" 
# install  
    composer require julong/pay   
    composer require julong/laravel-pay  
    php artisan vendor:publish  
# config  
## edit config/app.php  
### add aliases   
    'pay' => Julong\Laravel\Facades\pay::class ,
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
## 同步跳转    
### 用法   
    $alipay = Pay::alipay();   
    $res = $alipay->returnUrl();   
### 返回   
      return [
          'out_trade_no'=>'',//商户订单号
          'trade_no'=>'',//支付宝交易号
          ];

## 异步验证    
### 用法   
    $alipay = Pay::alipay();   
    $res = $alipay->checkSyncPay();   
### 返回     
     return [  
          'out_trade_no'=>'',//商户订单号  
          'trade_no'=>'',//支付宝交易号  
          'trade_status'=>'',//交易状态  
        ];    
 
