<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 23:49
 */

namespace Wechat\Faker;


class EventFaker extends MsgFaker{

    /**
     * 根据message生成内容
     */
    public function generateXML(){
        $content = '';
        foreach( $this->message as $key => $val ){
            $content.= <<<XML
 <{$key}><![CDATA[{$val}]]></{$key}>
XML;
        }
        $time = $this->timestamp;
        $this->xml = <<<XML
 <ToUserName><![CDATA[{$this->toUser}]]></ToUserName>
 <FromUserName><![CDATA[{$this->fromUser}]]></FromUserName>
 <CreateTime>{$time}</CreateTime>
 <MsgType><![CDATA[event]]></MsgType>
{$content}
XML;
    }
}