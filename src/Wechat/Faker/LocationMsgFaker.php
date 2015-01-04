<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 23:41
 */

namespace Wechat\Faker;


class LocationMsgFaker extends MsgFaker{

    public $message = array(
        'MsgType' => 'location' ,
        'Location_X' => '23.134521' ,
        'Location_Y' => '113.358803' ,
        'Scale' => '20' ,
        'Label' => '位置信息' ,
    );

    public function location( $x , $y , $scale = 20 , $label = '位置信息' ){
        $this->message['Location_X'] = $x;
        $this->message['Location_Y'] = $y;
        $this->message['Scale'] = $scale;
        $this->message['Label'] = $label;
        return $this;
    }

}