<?php

function bubbleSort(&$arr){
	$len = count($arr);
	for ($i=0; $i<$len-1;$i++){
		for($j=0; $j< $len-$i-1;$j++){
			if($arr[$j] > $arr[$j+1]){
				list($arr[$j], $arr[$j+1]) = [$arr[$j+1], $arr[$j]];
			}
		}
	}
}
function selectSort(&$arr){
	$len = count($arr);

	for($i=0; $i< $len-1; $i++){
		$smallIndex=$i;
		for($j=$i+1; $j<$len; $j++){
			if($arr[$j] <  $arr[$smallIndex])
				$smallIndex = $j;
		}
		list($arr[$i], $arr[$smallIndex]) = [$arr[$smallIndex], $arr[$i]];
	}
}
function insertSort(&$arr){
	$len = count($arr);
	for($i=1; $i<$len; $i++){
		for($j=$i; $j>0; $j--){
			if($arr[$j] < $arr[$j-1])
				list($arr[$j], $arr[$j-1]) = [$arr[$j-1], $arr[$j]];
		}
	}
}

$arr=[3,2,5,7,9,8];
//sinsertSort($arr);
var_dump($arr);