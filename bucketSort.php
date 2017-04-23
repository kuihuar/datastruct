<?php
function printArr($arr){
	foreach ($arr as $key => $value) {
		printf("%d\t", $value);
	}
	printf("\r\n");
}

function bucketSort_nice(&$arr){
	$temp=$arr;
	$max=max($arr);
	$min=min($arr);
	$count=array();
	$n=$max-$min+1;
	$count=array_fill($min, $n, 0);
	for($i=0;$i<$n;$i++)
		$count[$arr[$i]]++;
	for($i=$min+1;$i<=$max;$i++)
		$count[$i]=$count[$i]+$count[$i-1];
	for($i=$max-1;$i>=0;$i--){
		$key=--$count[$temp[$i]];
		$arr[$key]=$temp[$i];
	}
}
function bucketSort($arr){
	$temp=$arr;
	$min=min($arr);
	$max=max($arr);
	$count=array_fill($min, $max-$min+1, 0);
	$n=$max-$min+1;
	for ($i=0; $i <$n; $i++) { 
		$count[$arr[$i]]++;
	}
	foreach ($count as $key => $value) {
		for($i=0;$i<$value;$i++)
			echo "\$key=$key\t";
			$result[]=$key;
	}
	return $result;
}