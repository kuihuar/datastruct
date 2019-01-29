<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/1/27
 * Time: 下午7:50
 */

class Sf{

    public function isValid(String $s){
        $len = null;
        do{
            $len = strlen($s);
            $s = str_replace('()','');
            $s = str_replace('[]','');
            $s = str_replace('{}','');
        }while($len != strlen($s));

        return strlen($s) == 0;
    }
}