<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/3/14
 * Time: 下午12:49
 */

class Solution{
    function topKFrequent($nums, $k){
        $heap = new SplMaxHeap();
        $arr=[];
        $res=[];
        for ($i=0;$i < count($nums);$i++){
            $arr[$nums[$i]] += 1;
        }
        foreach ($arr as $index=>$v){
            $heap->insert($v);
        }
        while (!$heap->isEmpty()){
            $v = $heap->extract();
            $res = array_search($arr, $v);
        }
        return $res;
    }
}

$solution = new Solution();

$r = $solution->topKFrequent([4,1,-1,2,-1,2,3],2);
var_dump($r);