<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 23:56
 */

namespace Wechat\Faker;


class UnSubscribeEventFaker extends EventFaker{

    public $message = array(
        'Event' => 'unsubscribe'
    );

}