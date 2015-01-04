<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/5
 * Time: 00:01
 */

namespace Wechat\Faker;


class ViewEventFaker extends EventFaker{

    public $message = array(
        'Event' => 'VIEW' ,
        'EventKey' => 'key' ,
    );

    public function view( $key ){
        $this->message['EventKey'] = $key;
        return $this;
    }
}