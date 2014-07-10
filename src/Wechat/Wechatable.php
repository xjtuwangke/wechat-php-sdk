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

    public function onText( $wechat );

    public function onClick( $wechat );

    public function onEvent( $wechat );

    public function onImage( $wechat );

    public function onOther( $wechat );

} 