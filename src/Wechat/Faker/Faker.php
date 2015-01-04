<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 18:18
 */

namespace Wechat\Faker;

use Wechat\Snoopy;

/**
 * 用于fake微信服务器请求
 * Class Faker
 * @package Wechat\Faker
 */
class Faker {

    public static $token = null;

    public static $url = null;

    public $method = 'GET';

    public $requestBody = null;

    public $response = null;

    public $xml = null;

    public function fake(){

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
        $snoopy->submit( static::$url , $this->requestBody );
        $response = $snoopy->results;
        return $response;
    }

    public function postXML( $xml ){
        $snoopy = new Snoopy();
        $snoopy->_connect( $fp );
        $snoopy->_httprequest(static::$url, $fp, static::$url, 'POST', "text/xml", $xml);
        $response = $snoopy->results;
        return $response;
    }

}