<?php

/*
$road = 5;//5路

if(isset($fd)){
    fclose($fd);
}
$inputFile = 'duolumerge.txt';

$fd = fopen($inputFile, "r");
$index = 0;
$temp = [];
while (($line = fgets($fd) )!==false){
    if(feof($fd)){
        fclose($fd);return;
    }
    if(count($temp) < 5){
        $temp[]=$line;
        continue;
    }else{
        sort($temp, SORT_NUMERIC);
        $writFile='duolu_'.$index;
        $filewhandle = fopen($writFile, "w");
        $s = implode("", $temp);
        fwrite($filewhandle, $s);
        fclose($filewhandle);
        $temp = [];
        passthru('cat '.$writFile);
    }
    $index++;
}*/

$index = 3;
$some=[];
$writFile='duolu_';
for($r=0; $r <= $index; $r++){
    $fd[$r] = fopen($writFile.$r, "r");
    $some[$r] =(int) fgets($fd[$r]);//先取一个

}
$go=[];

while (count($some)>=1){
    $min = min($some);
    array_push($go, $min);//最终结果
    $s = array_search($min, $some);
    if(feof($fd[$s])){
        unset($some[$s]);
        continue;
    }
    $new = fgets($fd[$s]);
    if($new){
        $some[$s] =(int) $new;
    }
}
for($r=0; $r <= $index; $r++){
    fclose($fd[$r]);

}
print_r($go);




