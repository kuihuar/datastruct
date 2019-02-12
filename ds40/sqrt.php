<?php

class Solution
{
    function mySqrt($x)
    {
        if ($x == 0 || $x == 1) {
            return $x;
        }

        $left = 1;
        $right = $x;
        while ($left < $right ) {
            $mid = ($left + $right) >> 1;
            $tem = $mid * $mid;
            if($tem == $x) {
                return $mid;
            }elseif ($tem > $x) {
                $right = $mid -1;
            }else{
                $left = $mid +1;
                $res = $mid;
            }

        }

        return $res;
    }
}
$s = new Solution();
$res = $s->mySqrt(9);
var_dump(decbin(5));
var_dump(strlen(decbin(-5)));
var_dump(decbin(-5));
var_dump(4&-4);
exit;

var_dump($res);