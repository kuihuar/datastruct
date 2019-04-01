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
function mergeSort(&$arr, $low, $high){
    if($low < $high){
        $middle = intdiv(($low+$high),2);
        // var_dump("===\$middle=$middle");
        mergeSort($arr, $low, $middle);
        mergeSort($arr, $middle+1, $high);
        domerge($arr, $low, $middle, $high);
    }
}
//mergeSort($arr,0,count($arr)-1);

$arr = [6,10,2,12,11,7,4,9,3,1,8,5];
function quickSort(&$arr, $low, $high){
    if($low < $high){
        $position = partition($arr, $low, $high);
        var_dump("\$low = $low and \$high = $high ||| and \$position = $position");
        quickSort($arr, $low, $position-1);
        quickSort($arr, $position+1, $high);
    }
}
function partition(&$arr, $low, $high){
    static $num=0;
    $temp = $arr[$low];
    var_dump("swap>>>>>>>>>>{ \$num=(".$num++.") }\$temp = $arr[$low]");
    while($low < $high){
        while($low < $high && $arr[$high] > $temp)
            $high--;
        $arr[$low] = $arr[$high];
        var_dump("{ (\$high--) \$num=(".$num++.") }\$arr[$low] = \$arr[$high]");
        while ($low < $high && $arr[$low] < $temp)
            $low++;
        $arr[$high] = $arr[$low];
        var_dump("{ (\$low++)\$num=(".$num++.") } \$arr[$high] = \$arr[$low]");
    }
    $arr[$low] = $temp;
    var_dump("swap>>>>>>>>>>{ \$num=(".$num++.") }\$arr[$low] = $temp");
    return $low;
}
function partition1(&$arr, $low, $high){
    $position=$high;
    $firsthigh=$low;
    for($i=$low;$i<$high;$i++){
        if($arr[$i] < $arr[$position]){
            swap($arr, $i, $position);
        }
    }
    swap($arr, $position, $firsthigh);
    var_dump("\$firsthigh = $firsthigh");
    printArr($arr);
    return $firsthigh;
}
function swap(&$arr, $i, $j){
    var_dump("swap>>>>>>>>>   \$i==$i and \$arr[$i]=$arr[$i]  and \$j==$j  and \$arr[$j]=$arr[$j]");
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}
//quickSort($arr,0, count($arr)-1);
function shellSort(&$arr){
    $n =$delta= count($arr);
    do{
        $delta = ceil($delta/2);
        for($i=$delta;$i<$n;$i++){
            for($j=$i;$j>=$delta;$j-=$delta){
                if($arr[$j] < $arr[$j-$delta]){
                    //swap($arr,$j, $j-$delta);
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j-$delta];
                    $arr[$j-$delta] = $temp;
                }
            }
        }
    }while($delta>1);
}

function shell_short(&$arr){
    $len = count($arr);
    /*for($gap = intdiv($len,2); $gap > 0; $gap=intdiv($gap, 2)){
        var_dump($gap);
        for($i = $gap; $i < $len; $i++){
            for($j=$i-$gap; $j >=0; $j-=$gap){
                $t=$j+$gap;
                var_dump("\$j=$j and [\$j+\$gap][$j+$gap][$t] and \$gap=$gap");
                if ($arr[$j] > $arr[$j + $gap]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + $gap];
                    $arr[$j + $gap] = $temp;
                }
            }
        }
    }*/
    for($gap=intdiv($len,2); $gap > 0; $gap = intdiv($gap, 2)){
        for($i=$gap;$i < $len; $i++){
            for($j=$i-$gap; $j>=0 && $arr[$j] > $arr[$j+$gap]; $j-=$gap){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+$gap];
                $arr[$j+$gap] = $temp;
            }
        }
    }
}

function shell_short1(&$arr){
    $n = count($arr);
    for($gap=floor($n/2);$gap>0;$gap=floor($gap/=2)){
        var_dump("+++++++++++++++++++++++   \$gap=$gap   +++++++++++++++++++");
        for($i=$gap;$i<$n;$i++){
            var_dump("---------   \$i=$i   ----------");
            for($j=$i-$gap;$j>=0 && $arr[$j+$gap]<$arr[$j];$j-=$gap){
                var_dump("\$arr[$j+$gap]< \$arr[$j] and \$j=$j and  \$i=$i");
                //if($arr[$j+$gap]<$arr[$j]){// 这里再比较就是多余的了
                    $temp=$arr[$j];
                    $arr[$j]=$arr[$j+$gap];
                    $arr[$j+$gap]=$temp;
                //}
            }
        }
    }
}

$arr= [8,76, 81, 60, 22, 98, 33, 12, 79,7];
shell_short1($arr);
printArr($arr);