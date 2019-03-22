<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/3/9
 * Time: 上午7:12
 */
$i=0;
function mergeSort($arr, $low, $high){
    echo "in mergeSort{\$low===$low\t\$high===$high}\n";

    if($low < $high){
        $mid = intdiv(($low + $high),2);
        echo "++++\t\$mid=$mid\t+++++++\n";
        mergeSort($arr, $low, $mid);
        mergeSort($arr, $mid+1, $high);
        //mmerge($arr,$low,$mid,$high);
        //echo "in merge{\$mid===$mid}\n";
        //var_dump("\$mid===$mid\t\$low===$low\t\$high===$high");
        echo "in merge{\$low===$low\t\$mid===$mid\t\$high===$high}\n";
        //echo "in merge{\$mid===$mid\t\$low===$low\t\$high===$high}\n";
    }
}
mergeSort(['5','4','2','3','1','7','6','3'],0,8);
function mmerge($arr, $low, $mid, $high)
{
    $j = 0;
    for ($i = $low; $i < $mid; $i++) {
        $arrLow[] = $arr[i];
    }
    for ($i = $mid + 1; $i < $high; $i++) {
        $arrHigh[] = $arr[i];
    }

    while (!empty($arrLow) || !empty($arrHigh)) {
        if ($arrLow[0] <= $arrHigh[0]) {
            $arr[$j++] = $arrLow[0];
            array_shift($arrLow);
        } else {
            $arr[$j++] = $arrHigh[0];
            array_shift($arrHigh);
        }
    }
    while (!empty($arrLow)) {
        $a = array_shift($arrLow);
        $arr[$j++] = $a;
    }
    while (!empty($arrHigh)) {
        $a = array_shift($arrHigh);
        $arr[$j++] = $a;
    }
}