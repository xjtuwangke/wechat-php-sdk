<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 18:18
 */

namespace Wechat\Faker;

use Wechat\Snoopy;
use Wechat\Encrypt\Prpcrypt;

/**
 * 用于fake微信服务器请求
 * Class Faker
 * @package Wechat\Faker
 */
class Faker {

    public static $token = null;

    public static $url = null;

    public static $appid = null;

    public static $encodingAESKey = null;

    public $method = 'GET';

    public $requestBody = null;

    public $response = null;

    public $xml = null;

    public function __construct(){
        $this->_token = static::$token;
        $this->_appid = static::$appid;
        $this->_encodingAESKey = static::$encodingAESKey;
        $this->timestamp = time();
        $this->nounce = rand( 111111 , 999999 );
        $this->_url = static::$url . '?timestamp=' . $this->timestamp . '&nounce' . $this->nounce ;
    }

    public function fake(){

    }

    public function encodeAES( $string ){
        $pc = new Prpcrypt( $this->_encodingAESKey );
        list( $status , $encrypted ) = $pc->encrypt( $string, $this->_appid );
        return $encrypted;
    }

    public function send(){
        $this->fake();
        if( ! $this->xml ){
            $this->response = $this->sendForm();
        }
        else{
            $this->response = $this->postXML( $this->xml );
        }
        return $this->response;
    }

    public function sendForm(){
        $snoopy = new Snoopy();
        $snoopy->_submit_method = $this->method;
        $snoopy->submit( $this->_url , $this->requestBody );
        $response = $snoopy->results;
        return $response;
    }

    public function postXML( $xml ){
        $snoopy = new Snoopy();
        $snoopy->_connect( $fp );
        $snoopy->_httprequest($this->_url, $fp, $this->_url, 'POST', "text/xml", $xml);
        $response = $snoopy->results;
        return $response;
    }

}