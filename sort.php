<?php

$arr=array(3,3432,43,1,34,2,37,98,45);
function swap(&$arr, $i, $j){
	$temp=$arr[$i];
	$arr[$i]=$arr[$j];
	$arr[$j]=$temp;
}
function printArr($arr){
//reset($srr);
	for($i=0;$i<count($arr);$i++){
		printf("%d=%d\n",$i,$arr[$i]);
		//printf($arr[$i]);
	}
}
/**
 *插入排序，默认第一个元素是有序的
 *从第一个元素后的元素开始往前找，找到应该呆的位置
 *然后把应该呆的位置的已有的记录挨个往后挪移一位
 *前面的默认是有序的
 */
/*for($i=1;$i<sizeof($arr);$i++)//对于待排记录挨个做一次插入排序处理，其中有一个不用处理，就是$i=0
{
	for($j=$i;$j>0;$j--)//这里注意的，排好的是哪一段，哪$i=5时，$i从0到5已经是有序的
	{
		if($arr[$j]<$arr[$j-1]){
			swap($arr,$j, $j-1);
		}
	}
}
*/

/**
 * 改进的插入排序
 * 不用交换，省空间，省时间
 * 每个交换要用三次赋值
 *$arr=array(3,3432,43,1,34,36,45432,76,9659,2,37,98,45);
 */
/*for($i=1;$i<count($arr);$i++){
	$temp=$arr[$i];
	$j=$i-1;
	while($j>=0 && $temp<$arr[$j]){//$temp和它前面的这些j相比
		$arr[$j+1]=$arr[$j];//如果小的话，往后拉一位
		$j=$j-1;
	}
	//此时$j后面就是i的正确位置，回填
	$arr[$j+1]=$temp;
}
*/

/**
 *加监视哨的插入排序
 *array[0]位置无用的，为了省略边费判断
 */
/*$arr=array(8,3,3432,43,1,34,36,45432,76,9659,2,37,98,45);
for($i=2;$i<count($arr);$i++){
	$arr[0]=$arr[$i];
	$j=$i-1;
	while($arr[0]<$arr[$j]){//$temp和它前面的这些j相比
		$arr[$j+1]=$arr[$j];//如果小的话，往后拉一位
		$j=$j-1;
	}
	//此时$j后面就是i的正确位置，回填
	$arr[$j+1]=$arr[0];
}

array_splice($arr, 0,1);//($arr[0]);
printArr($arr);*/
/**
 * 二分法插入排序
 */
echo "start...\r\n";

function binarysort(&$arr){
	for($i=1;$i<count($arr);$i++){
		echo "\r\n++++++++++$i++++++++++\r\n";
		$temp=$arr[$i];
		//记录已经排好位置的左右位置
		$left=0;$right=$i-1;
		//开始查找待插入记录的正确位置
		while($left<=$right){
			if($left==$right){
				echo 'if: '."\$left=$left\r\n\$right=$right\r\n";
				echo "ceil((\$left+\$right)/2)= ".ceil(($left+$right)/2)."\r\n"; 
			}
			echo "in while:\$left=$left\r\n\$right=$right\r\n";
			$middle=ceil(($left+$right)/2);
			if($temp < $arr[$middle]){
				$right=$middle-1;
			}else{
				$left=$middle+1;
			}
			//echo '$middle='.$middle;echo "\r\n";
		}
		echo "\$left=$left\r\n";
			for($j=$i-1;$j>=$left;$j--){
				$arr[$j+1]=$arr[$j];
			}
			echo "\$arr[\$left]=".$arr[$left]."\r\n";
			$arr[$left] = $temp;
		echo "\r\n==========$i===========\r\n";
	}
}



/*
function bsort(&$arr){
	for($i=1;$i<count($arr);$i++){
		$temp=$arr[$i];
		$left=0;$right=$i-1;
		while($left<=$right){
			$middle=ceil(($left+$right)/2);
			if($temp < $arr[$middle])
				$right=$middle-1;
			else
				$left=$middle+1;
		}
		for($j=$i-1;$j>=$left;$j--)
			$arr[$j+1]=$arr[$j];
		$arr[$left]=$temp;


	}
}*/
function bubbleSort(&$arr){
	$n=count($arr);
	for($i=1;$i<$n;$i++){//n-1次循环
		for($j=$n-1;$j>=$i;$j--){
			if($arr[$j] < $arr[$j-1]){
				swap($arr,$j,$j-1);
			}
		}
	}
}


function bbsort(&$arr){
	$n=count($arr);
	for($i=1;$i<$n;$i++){
		$noswap=true;
		for($j=$n-1;$j>=$i;$j--){
			if($arr[$j] < $arr[$j-1]){
				swap($arr, $j, $j-1);
				$noswap=false;
			}
		}
		if($noswap)return;
	}
}
//直接选择排序
/*function straightSelectSort(&$arr){
	for($i=0;$i<count($arr)-1;$i++){
		$smallest=$i;//假设自己是最小的
		//开始向后扫描所有剩余记录
		for($j=$i+1;$j<count($arr);$j++){
			//如果发现更小的记录，记录它的位置if($arr[$j]<$arr[$smallest]){
				$smallest=$j;
			}
		}
		//将第i小的记录放在数组中的第i个位置 
		swap($arr, $i,$smallest);
	}
}*/
$arr=array(8,3,3432,43,1,34,36,454,76,45);
/*function modifiedInsertSort(&$arr, $n, $delta){
	for($i=$delta;$i<$n;$i+=$delta){
		for($j=$i; $j>=$delta;$j-=$delta){
			if($arr[$j] < $arr[$j-$delta]){
				swap($arr, $j, $j-$delta);
			}
		}
	}
}*/
//shell排序
//增量每次除以2递减的SHELL排序
/*function shellSort($arr){
	$n=count($arr);
	//var_dump($n/2);
	//增量$delta每除以2递减
	for($delta=floor($n/2); $delta>0;$delta=floor($delta/2)){
		//分别对$delta个子序列排序
		echo "=============================\r\n";
		echo "\$delta=$delta\r\n";
		for($j=0;$j<$delta;$j++){
			echo "\$arr[$j]=".$arr[$j]."\t";
			echo "\$n-\$j= ".$n."-".$j."\t";
			echo "\$delta= $delta\r\n";
			//modifiedInsertSort($arr[$j], $n-$j,$delta);
		}
	}
}*/
//SHELL排序
function shelsort(&$arr, $delta){
	$n=count($arr);
	do{
		$delta=ceil($delta/2);
		for($i=$delta;$i<$n;$i++){
			$temp=$arr[$i];
			$j=$i-$delta;
			while($j>=0&&$temp<$arr[$j]){//$temp和它前面的这些j相比
				$arr[$j+$delta]=$arr[$j];//如果小的话，往后拉一位
				$j=$j-$delta;
			}
			//此时$j后面就是i的正确位置，回填
			$arr[$j+$delta]=$temp;
		}
		
	}while($delta>1);
}

function shellSort(Array &$arr){
	$n=count($arr);
	$delta=$n;
	do{
		$delta=ceil($delta/2);
		for($i=$delta;$i<$n;$i++){
			echo "\$j=$j\t";
			while($j>=0 && $temp<$arr[$j]){
				$arr[$j+$delta]=$arr[$j];
				$j=$j-$delta;
			}
			$arr[$j+$delta]=$temp;
		}
	}while($delta>1);
}

function shellsor(&$arr){
	$n=count($arr);
	$delta=ceil($n/2);
	while($delta>=1){
		for($i=$delta;$i<$n;$i++){
			$temp=$arr[$i];
			for($j=$i-$delta;$j>=0&&$arr[$j]>$temp;$j-=$delta){
				$arr[$j+$delta]=$arr[$j];
			}
			$arr[$j+$delta]=$temp;
		}
		$delta-=ceil($delta/2);
	}
}


function quicksort(&$arr, $left, $right){
	if($left>=$right) return;
	$pos=partition($arr, $left, $right);
	quicksort($arr, $left, $pos-1);
	quicksort($arr, $pos+1, $right);
}
function partition(&$arr, $left, $right){
	$temp=$arr[$left];
	while($left<$right){
		while($left<$right && $arr[$right] >= $temp)
			$right--;
		$arr[$left]=$arr[$right];
		while($left<$right && $arr[$left]<=$temp)
			$left++;
		$arr[$right]=$arr[$left];
	}
	$arr[$left]=$temp;
	return $left;
}
$arr=array(9,4,3,2,8,99,95,945,4,7,-1);
printArr($arr);
echo "\r\n================\r\n";
$len=count($arr)-1;
quicksort($arr,0,$len);
printArr($arr);






















		/*'db_host' => '192.168.125.43:3309,192.168.125.43:3309', 
		'db_name' => 'log_stat', 'db_user' => 'lnxxt', 'db_pass' => 'u0qyrYHZ.0', 
		'db_type' => 'mysql', 'db_char' => 'utf8', 'db_pefix' => 'ts' */














