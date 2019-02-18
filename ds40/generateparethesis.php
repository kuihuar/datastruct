<?php
/**
 * Created by PhpStorm.
 * User: jianfen1
 * Date: 2019/1/30
 * Time: 7:41 PM
 */

class Solution {
    function generateParenthesis($n) {
        $res = [];
        $this->helper("", $res, $n, $n);
        return $res;
    }
    function helper($str, &$res, $left, $right){
        var_dump($res);
        if($left ==0 && $right == 0){
            $res[] = $str;
            return;
        }
        if($left > 0) $this->helper($str + "(", $res, $left -1, $right);
        if($right > $left) $this->helper($str + ")", $res, $left, $right-1);
    }
}

$s = new Solution();
$s->generateParenthesis(3);