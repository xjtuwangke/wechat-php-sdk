<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 23:56
 */

namespace Wechat\Faker;


class ScanEventFaker extends EventFaker{

    public $message = array(
        'Event' => 'SCAN' ,
        'EventKey' => 123123123 ,
        'Ticket' => 123321 ,
    );

    public function qrcode( $value , $ticket){
        $this->message['EventKey'] = $value;
        $this->Ticket['EventKey'] = $ticket;
        return $this;
    }
}