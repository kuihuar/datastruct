<?php
$heap=new SplMaxHeap();
$arr=array(4,6,7,3,2,9,5,1,8);
for($i=0;$i<count($arr)-1;$i++)
{
    $heap->insert($arr[$i]);
}
$arr=array();
while(!$heap->isEmpty())
{
$arr[]=$heap->extract();
}
print_r($arr);
