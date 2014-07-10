<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14-7-10
 * Time: 22:36
 *
 * Controller与Wechat的接口类
 */



namespace Wechat;


interface Wechatable {

    public function onText( Wechat $wechat );

    public function onEvent( Wechat $wechat );

    public function onUnKnown( Wechat $wechat );

} 