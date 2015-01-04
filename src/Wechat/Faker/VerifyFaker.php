<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 18:23
 */

namespace Wechat\Faker;

/**
 * 验证消息真实性
 * Class VerifyFaker
 * @package Wechat\Faker
 */
class VerifyFaker extends Faker{

    public function fake(){
        $this->requestBody = array(
            'timestamp' => time() ,
            'nonce' => rand( 100000 , 999999 ) ,
            'token' => static::$token ,
        );
        ksort( $this->requestBody );
        $this->requestBody['signature'] = sha1( implode( '' , $this->requestBody ) );
        unset( $this->requestBody['token'] );
        $this->requestBody['echostr'] = substr( 0 , 12 , sha1( rand( 0 , 65535 ) ) );
    }

}