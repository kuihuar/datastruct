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
//print_r(combination(['a','b','c'],2));
//https://www.cnblogs.com/ZuoAndFutureGirl/p/9028287.html
//next  数组中存储的是这个字符串前缀和后缀的中相同字符串的长度。
function kmpSearch($s, $p){
    $next = getNextVal($p);
    $sLen = count($s);$pLen = count($p);
    while($i < $sLen && $j < $pLen){
        if($j == -1 || $s[$i] == $p[$j]){
            $i++;$j++;
        }else{
            $j = $next[$j];
        }
    }
    if($j == $pLen)
        return $i - $j;
    else
        return -1;
}
function getNextVal($p){
    $pLen = count($p);
    $next[0] = -1;
    $k = -1; $j=0;
    while(0 < $pLen-1){
        if($k == -1 || $p[$j] == $[$k]){
            $k++;
            $j++;
            if($p[$j] != $p[$k])
                $next[$j] = $k;
            else
                $next[$j] = $next[$k];
        }else{
            $k = $next[$k];
        }
    }
}
//字典树

