<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 23:44
 */

namespace Wechat\Faker;


class LinkMsgFaker extends MsgFaker{

    public $message = array(
        'MsgType' => 'link' ,
        'Title' => '消息标题' ,
        'Description' => '消息描述' ,
        'Url' => 'http://baidu.com/' ,
    );

    public function link( $title , $desc , $url ){
        $this->message['Title'] = $title;
        $this->message['Description'] = $desc;
        $this->message['Url'] = $url;
        return $this;
    }


}