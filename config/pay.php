<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/24
 * Time: 16:39
 * Author: 鲁强
 */
return [
  'alipay'=>[
      //应用ID,您的APPID。
      'app_id' => "2018011301825418",

      //商户私钥，您的原始格式RSA私钥
      'merchant_private_key' => '',  
      //'merchant_private_key' => file_get_contents("/data/JULONG/JLSERVER/config/key/app_private_key.pem"),  

      //异步通知地址
      'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",

      //同步跳转
      'return_url' => "",

      //编码格式
      'charset' => "UTF-8",

      //签名方式
      'sign_type'=>"RSA2",

      //支付宝网关
      'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

      //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
      'alipay_public_key' => '',  
      //'alipay_public_key' => file_get_contents("/data/JULONG/JLSERVER/config/key/zfb_public_key.pem"),

  ],
    'wechat'=>[

    ]
];
