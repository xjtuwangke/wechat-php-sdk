<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/1/6
 * Time: 16:28
 */

namespace Wechat\Faker;


class Config {

    public $token = null;

    public $url = null;

    public $appid = null;

    public $encodingAESKey = null;

    const CRYPT_MODE_NONE = 0;

    const CRYPT_MODE_AES = 1;

    public $crypt_mode = self::CRYPT_MODE_NONE;

    public $crypt_safe_mode = true;

    public static $default = array();

    public function __construct(){
        foreach( static::$default as $key => $val ){
            $this->{$key} = $val;
        }
    }

}
