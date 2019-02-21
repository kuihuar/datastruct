<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 下午1:03
 */
//多例模式
class Multiton{
    private static $instance=[];
    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
    public static function getInstance($instanceKey){
        if(!isset(self::$instance[$instanceKey])){
            self::$instance[$instanceKey] = new self();
        }
        return static::$instance[$instanceKey];
    }

}

for($i=0; $i< 5;$i++){
    $instance = Multiton::getInstance($i);
    var_dump($instance);
}

for($i=0; $i< 5;$i++){
    $instance = Multiton::getInstance($i);
    var_dump($instance);
}
