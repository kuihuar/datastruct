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
	//初始化桶
	$count=array_fill($min, $n, 0);
	//统计每个取值出现的次数
	printArr($temp);
	for($i=0;$i<$n;$i++)
		$count[$arr[$i]]++;
	//统计 小于等于$i的元素的个数
	printArr($count);
	for($i=$min+1;$i<=$max;$i++)
		$count[$i]=$count[$i]+$count[$i-1];
	//按顺序输出的有序序列
	//从大到小输出为了保持稳定性
	printArr($count);
	for($i=$max-1;$i>$min;$i--){
		$key=--$count[$temp[$i]];
		echo "\$i=$i\t\$temp[$i]=".$temp[$i]."\t\$count[\$temp[$i]]=".($count[$temp[$i]]+1)."\t\$key=$key\r\n";
		$arr[$key]=$temp[$i];
	}
	printArr($arr);
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
$arr=array(7,3,8,9,6,1,8,1,2);
bucketSort_nice($arr);