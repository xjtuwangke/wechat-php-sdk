<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 18:55
 */

namespace Wechat\Faker;


class TextMsgFaker extends MsgFaker{

    public $message = array(
        'MsgType' => 'text' ,
        'Content' => ''
    );

    public function content( $value ){
        $this->message['Content'] = $value;
        return $this;
    }
}