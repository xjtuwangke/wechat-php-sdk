<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 23:52
 */

namespace Wechat\Faker;


class SubscribeEventFaker extends EventFaker{

    public $message = array(
        'Event' => 'subscribe'
    );

    public function qrscene( $value , $ticket){
        $this->message['EventKey'] = 'qrscene_' . $value;
        $this->message['Ticket'] = $ticket;
        return $this;
    }
}