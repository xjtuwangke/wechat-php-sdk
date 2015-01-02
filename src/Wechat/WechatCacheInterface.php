<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/3
 * Time: 01:28
 */

namespace Wechat;


interface WechatCacheInterface {

    public function put( $key , $value , $expires );

    public function forget( $key );

    public function get( $key );

}