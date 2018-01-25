<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/24
 * Time: 17:38
 * Author: 鲁强
 */

namespace Julong\LaravelPay;




class Pay
{
    static public function alipay($config){
        return new \Julong\Pay\Alipay\Pay($config);
    }

    static public function wechatpay($config){
        return new \Julong\Pay\WechatPay\Pay($config);
    }
}