<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 18:39
 */

namespace Wechat\Faker;

/**
 * 接收普通消息
 * Class TextMsgFaker
 * @package Wechat\Faker
 */
class MsgFaker extends Faker{

    public $toUser = null;

    public $fromUser = null;

    public $msgId = null;

    public $method = 'POST';

    public $xml = null;

    const CRYPT_MODE_NONE = 0;

    const CRYPT_MODE_AES = 1;

    public $crypt_mode = self::CRYPT_MODE_NONE;

    public $crypt_safe_mode = true;

    public function checkMsgEncrypt(){
        if( $this->crypt_mode === static::CRYPT_MODE_AES ){
            $xml = <<<XML
<xml>
{$this->xml}
</xml>
XML;
            $msg_encrypt = $this->encodeAES( $xml );

            //msg_signature=sha1(sort(Token、timestamp、nonce, msg_encrypt))

            $tmpArray = array(
                'token' => $this->_token ,
                'timestamp' => $this->timestamp ,
                'nonce' => $this->nounce ,
                'msg_encrypt' => $msg_encrypt ,
            );
            sort( $tmpArray , SORT_STRING );
            $msg_signature = sha1( implode( '' , $tmpArray ) );
            $this->_url.= '&msg_signature=' . $msg_signature;

            if( $this->crypt_safe_mode ){
                $this->xml = <<<XML
<xml>
{$this->xml}
  <Encrypt><![CDATA[{$msg_encrypt}]]</Encrypt>
</xml>
XML;
            }
            else{
                $this->xml = <<<XML
<xml>
  <ToUserName><![CDATA[{$this->toUser}]]></ToUserName>
  <Encrypt><![CDATA[{$msg_encrypt}]]</Encrypt>
</xml>
XML;
            }
        }
        else{
            $this->xml = <<<XML
<xml>
{$this->xml}
</xml>
XML;
        }
    }

}