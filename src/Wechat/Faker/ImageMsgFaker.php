<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 23:37
 */

namespace Wechat\Faker;


class ImageMsgFaker extends MsgFaker{

    public $message = array(
        'MsgType' => 'image' ,
        'PicUrl' => 'http://baidu.com' ,
        'MediaId' => '123456' ,
    );

    public function url( $value ){
        $this->message['PicUrl'] = $value;
        return $this;
    }

    public function mediaId( $value ){
        $this->message['MediaId'] = $value;
        return $this;
    }

}