<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/4
 * Time: 18:39
 */

namespace Wechat\Faker;

/**
 * 接收普通消息
 * Class TextMsgFaker
 * @package Wechat\Faker
 */
class MsgFaker extends Faker{

    public $toUser = null;

    public $fromUser = null;

    public $msgId = null;

    public $method = 'POST';

    public $xml = null;

}