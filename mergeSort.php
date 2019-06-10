<?php
function mergeSort($arr){
    $len = count($arr);
    if($len <= 1) return $arr;
    $middle = intval($len/2);
    $left = array_slice($arr,0, $middle);
    $right = array_slice($arr, $middle);
    return mymerge(mergeSort($left), mergeSort($right));
}
function mymerge($left, $right){
    $res = [];
    while (count($left)  && count($right) ){
        $x = array_shift($left);
        $y = array_shift($right);
        if($x <= $y){
            array_push($res, $x);array_unshift($right, $y);
        }else{
            array_push($res, $y);array_unshift($left, $x);
        }
    }
    if(count($left)) return array_merge($res, $left);
    if(count($right)) return array_merge($res, $right);
}
$arr=[2,3,5,2,3,9,8,3,2,7,4,9,8,0,4,587,93,47,59,8,2,6,83,4,9,65,2,18,7];
$arr = mergeSort($arr);
print_r($arr);
?>
