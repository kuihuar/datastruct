<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/1/20
 * Time: 下午4:58
 */
//取任意数的组合
/**
 * @param $arr input array
 * @param $m   input select num
 */
function combination($arr, $m){
    $res = [];
    $len = count($arr);

    if($m <=0 || $m >$len)
        return $res;
    for($i = 0; $i < $len; $i++){
        $t = [$arr[$i]];
        if($m == 1){
            $res[] = $t;
        }else{
            $b = array_slice($arr, $i+1);
            $c = combination($b, $m-1);
            foreach($c as $v){
                $res[] = array_merge($t, $v);
            }
        }
    }
    return $res;
}
$s = combination(['a','b','c','d','e'], 4);
function arrangement($a, $m) {
    $r = array();

    $n = count($a);
    if ($m <= 0 || $m > $n) {
        return $r;
    }

    for ($i=0; $i<$n; $i++) {
        $b = $a;
        $t = array_splice($b, $i, 1);
        if ($m == 1) {
            $r[] = $t;
        } else {
            $c = arrangement($b, $m-1);
            foreach ($c as $v) {
                $r[] = array_merge($t, $v);
            }
        }
    }
    return $r;
}
print_r(combination(['a','b','c'],2));