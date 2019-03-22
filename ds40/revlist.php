<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/3/15
 * Time: 上午7:58
 */
class Solution {
    function reverseList($head) {
        $cur = $head;
        $prev = null;
        while($cur){
            $cur->next = $prev;
            $prev = $cur;
            $cur=$cur->next;
        }
        return $prev;
    }
}