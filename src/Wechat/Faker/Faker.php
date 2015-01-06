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

    public $method = 'GET';

    public $requestBody = null;

    public $getParameters = array();

    public $response = null;

    public $xml = null;

    public $config = null;

    public $timestamp = null;

    public function __construct( Config $config = null ){
        if( $config ){
            $this->config = $config;
        }
        else{
            $this->config = new Config;
        }
        $this->timestamp = time();
        $this->nonce = rand( 111111 , 999999 );
    }

    public function generateURL(){
        $this->getParameters[ 'timestamp' ] = $this->timestamp;
        $this->getParameters[ 'nonce' ] = $this->nonce;
        $tmpArray = [ $this->config->token , $this->nonce , $this->timestamp ];
        sort( $tmpArray , SORT_STRING );
        $this->getParameters[ 'signature' ] = sha1( implode( '' , $tmpArray ) );
        $requestArray = array();
        foreach( $this->getParameters as $key => $val ){
            $val = urlencode( $val );
            $requestArray[] = "{$key}={$val}";
        }
        return $this->config->url . '?' . implode( '&' , $requestArray );
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
        $snoopy->submit( $this->generateURL() , $this->requestBody );
        $response = $snoopy->results;
        return $response;
    }

    public function postXML( $xml ){
        $header[]="Content-Type: text/xml; charset=utf-8";
        $header[]="Content-Length: ".strlen($xml);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->generateURL());
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close( $ch );
        return $output;
    }

}