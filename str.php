<?php



/**
 * 朴素模式
 */
function findPat($s, $p, $startIndex)
{
	$lastIndex = strlen($s) - strlen($p);
	var_dump($lastIndex);
	if($lastIndex < $startIndex){
		return -1;
	}
	// i指向s内部的游标	// j指向p内部的游标
	$i = $startIndex;$j=0;
	while($i<=strlen($s) && $j<strlen($p)){
		var_dump("\$i=$i");
		var_dump("\$j=$j");
		if(substr($s, $j,1) == substr($p,$i,1)){
			var_dump("substr(\$s,\$j,1)=".substr($s, $j,1));
			var_dump("substr(\$p,\$i,1)=".substr($p, $i,1));
			$i++;
			$j++;
		}else{
			$i=$j-$j+1;
			$j=0;
		}
		/*if($j==strlen($p))
			return ($i-$j);
		else
			return -1;*/ 
	}
}


echo 'liujianfenshiwangba'

$s="abcdefabcdeff";
$p="abcdeff";
findPat($s, $p, 3);

