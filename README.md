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
$alipay = Pay::alipay();   
$content = $alipay->setParam()->toPay();   
echo $content;   
