<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 18:55
 */

namespace Wechat\Faker;


class TextMsgFaker extends MsgFaker{

    public $text = null;

    public function fake(){
        $time = time();
        $this->msgId = $this->msgId?:rand(1111111111,999999999);
        $this->xml = <<<XML
<xml>
 <ToUserName><![CDATA[{$this->toUser}]]></ToUserName>
 <FromUserName><![CDATA[{$this->fromUser}]]></FromUserName>
 <CreateTime>{$time}</CreateTime>
 <MsgType><![CDATA[text]]></MsgType>
 <Content><![CDATA[{$this->text}]]></Content>
 <MsgId>{$this->msgId}</MsgId>
 </xml>
XML;
    }
}