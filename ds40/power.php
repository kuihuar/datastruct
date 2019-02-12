<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/8
 * Time: 上午9:42
 */

function mypower( $x, $n){
    if($n == 0) return 1;
    if($n == 1) return $x;

    $res = 1; $temp = $x;
    while($n){
        echo $n." \r\n";
        echo decbin($n)." \r\n";
        if($n & 1){
            $res *= $temp;
            echo "== ".decbin($n)."     \r\n";

        }
        $n >>= 1;
        $temp *= $temp;
    }
    return $res;
}

var_dump(mypower(2,9));