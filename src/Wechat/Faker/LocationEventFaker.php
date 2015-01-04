<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 23:58
 */

namespace Wechat\Faker;


class LocationEventFaker extends EventFaker{

    public $message = array(
        'Event' => 'LOCATION' ,
        'Latitude' => 12 ,
        'Longitude' => 12 ,
        'Precision' => 20 ,
    );

    public function location( $lat , $long , $precision ){
        $this->message['Latitude'] = $lat;
        $this->message['Longitude'] = $long;
        $this->message['Precision'] = $precision;
        return $this;
    }
}