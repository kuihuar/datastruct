<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/1/31
 * Time: 下午10:59
 */

class Solution{
    private $res=[];
    private $n = 3;
    public function gen(){
        $this->backtrack($this->res, "", $this->n,$this->n);
        return $this->res;
    }
    private function backtrack(&$res, $str, $left, $right){
        /*if($left ==0 && $right == 0){
            $this->res[] = $str;
            echo $str."\r\n";
            return;
        }*/
        if($left == $right)
            echo $str."\r\n";

        if($left > 0){
            $this->backtrack($arr, $str."(", $left-1, $right);
        }
        if($right > 0){
            $this->backtrack($arr, $str.")", $left, $right-1);
        }
    }

}
$solution = new Solution();
$res = $solution->gen();