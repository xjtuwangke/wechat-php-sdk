<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 23:40
 */

namespace Wechat\Faker;


class VideoMsgFaker extends MsgFaker{

    public $message = array(
        'MsgType' => 'video' ,
        'ThumbMediaId' => '654321' ,
        'MediaId' => '123456' ,
    );

    public function thumbMediaId( $value ){
        $this->message['ThumbMediaId'] = $value;
        return $this;
    }

    public function mediaId( $value ){
        $this->message['MediaId'] = $value;
        return $this;
    }

}