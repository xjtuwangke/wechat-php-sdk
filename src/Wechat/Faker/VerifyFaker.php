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
            'timestamp' => $this->timestamp ,
            'nonce' => $this->nounce ,
            'token' => $this->_token ,
        );
        sort( $this->requestBody , SORT_STRING );
        $this->requestBody['signature'] = sha1( implode( '' , $this->requestBody ) );
        unset( $this->requestBody['token'] );
        $this->_url .= '&echostr=' .  substr( 0 , 12 , sha1( rand( 0 , 65535 ) ) );
    }

}