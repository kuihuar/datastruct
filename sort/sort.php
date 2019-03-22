<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/3/22
 * Time: 上午10:43
 */



function bubbleSort(&$arr){
    $len=count($arr);
    for($i=0;$i<$len;$i++){
        printf("i=%d\n",$i);
        //for($j=$len-1;$j>$i;$j--){
        for($j=1;$j<$len-$i;$j++){
            printf("i=%d,j=%d,$[j]=%d,$[j-1]=%d\n",$i,$j,$arr[$j],$arr[$j-1]);
            if($arr[$j] < $arr[$j-1]){
                $temp = $arr[$j];
                $arr[$j]=$arr[$j-1];
                $arr[$j-1]=$temp;
            }
        }
    }
}

function selectSort(&$arr){
    $len=count($arr);
    for($i=0;$i<$len;$i++){
        printf("i=%d,$[i]=%d\n",$i,$arr[$i]);
    }
}
function printArr($arr){
    echo '[ ';
    for($i=0;$i<count($arr);$i++){
        echo $arr[$i].' ';
    }
    echo ']';
}
function domerge(&$arr, $low, $middle, $high){
    static $num=0;
    //$left = array_slice($arr, $low,$middle-$low+1);
    //$right = array_slice($arr, $middle+1, $high-($middle+1)+1);
    $num++;
    var_dump("<<<<<<<<{  ".$num."       ");
    var_dump("myMerge,arr,\$low=$low and \$middle=$middle and \$high=$high");
    for($a=$low;$a<=$middle;$a++){
        $left[]=$arr[$a];
    }
    for($b=$middle+1;$b<=$high;$b++){
        $right[]=$arr[$b];
    }
    $left = array_slice($arr, $low, $middle-$low+1);
    $right = array_slice($arr, $middle+1, $high-($middle+1)+1);
    echo 'buff1= ';printArr($left);
    echo '   buff2= ';printArr($right);
    $i=$low;
    var_dump(".......\$i===$i........");
    while (!empty($left) && !empty($right)){
        /*$p1 = array_shift($left);
        $p2 = array_shift($right);
        var_dump("\$p1==$p1");
        var_dump("\$p2==$p2");
        if($p1 < $p2){
            $arr[$i++]=$p1;
            array_unshift($right, $p2);
        }else{
            $arr[$i++]=$p2;
            array_unshift($left, $p1);
        }*/
        if($left[0] < $right[0]){
            $arr[$i++] = array_shift($left);
        }else{
            $arr[$i++] = array_shift($right);
        }
    }
    while (!empty($left)){
        $arr[$i++] = array_shift($left);
    }
    while (!empty($right)){
        $arr[$i++] = array_shift($right);
    }
    echo '  arr= ';printArr($arr);
    var_dump("        {  ".$num."   }>>>>>>>>>>>.\n");
}
$arr = [10,2,14,36,7,9,3,1,8,5];
function mergeSort(&$arr, $low, $high){
    if($low < $high){
        $middle = intdiv(($low+$high),2);
       // var_dump("===\$middle=$middle");
        mergeSort($arr, $low, $middle);
        mergeSort($arr, $middle+1, $high);
        domerge($arr, $low, $middle, $high);
    }
}
mergeSort($arr,0,count($arr)-1);
printArr($arr);