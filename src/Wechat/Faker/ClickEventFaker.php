<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/5
 * Time: 00:00
 */

namespace Wechat\Faker;


class ClickEventFaker extends EventFaker{

    public $message = array(
        'Event' => 'CLICK' ,
        'EventKey' => 'key' ,
    );

    public function key( $key ){
        $this->message['EventKey'] = $key;
        return $this;
    }
}