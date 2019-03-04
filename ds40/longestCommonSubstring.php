<?php
function longestCommonSubstring(){
    $str2 = 'abcdefg[876543';
    $str1 = 'xyzabcd]876543';
    for($i=-1; $i<strlen($str1); $i++) {
        for ($j = -1; $j < strlen($str2); $j++) {
            $dp[$i][$j]="";
        }
    }
    for($i=0; $i<strlen($str1); ++$i){
        for($j=0; $j<strlen($str2);++$j){
            if($str1{$i} == $str2{$j}){
                $dp[$i][$j] = $dp[$i-1][$j-1] . $str1{$i};
                //$dp[$i][$j] = $dp[$i-1][$j-1] + 1;
            }else{
                //dp[$i][$j]="";//连续子串
                //$dp[$i][$j] = max($dp[$i-1][$j], $dp[$i][$j-1]);//子序列
                $dp[$i][$j] = strlen($dp[$i-1][$j]) >  strlen($dp[$i][$j-1])?$dp[$i-1][$j]:$dp[$i][$j-1];//子序列
            }
        }
    }
    for($i=-1; $i<strlen($str1); $i++) {
        for ($j = -1; $j < strlen($str2); $j++) {
            //echo  "dp[$i][$j]=".  $dp[$i][$j]."\t";
            echo $dp[$i][$j]."\t";
        }
        echo "\r\n";
    }
    return $dp[strlen($str1)-1][strlen($str2)-1];
}


$res = longestCommonSubstring();
var_dump($res);