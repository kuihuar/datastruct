<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 下午1:03
 */

class Singleton{
    private static $instance;
    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
    private static $attr;
    public static function getInstance(){
        if(null == static::$instance){
            static::$instance = new static();
        }
        return static::$instance;
    }

}

for($i=0; $i< 5;$i++){
    $instance = Singleton::getInstance($i);
    var_dump($instance);
}
