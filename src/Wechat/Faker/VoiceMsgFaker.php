<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 23:37
 */

namespace Wechat\Faker;


class VoiceMsgFaker extends MsgFaker{

    public $message = array(
        'MsgType' => 'voice' ,
        'Format' => 'amr' ,
        'MediaId' => '123456' ,
    );

    public function format( $value ){
        $this->message['Format'] = $value;
        return $this;
    }

    public function mediaId( $value ){
        $this->message['MediaId'] = $value;
        return $this;
    }

}