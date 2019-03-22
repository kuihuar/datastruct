<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/3/5
 * Time: 下午12:10
 */
/*
array_change_key_case($arr,CASE_LOWER);
array_change_key_case($arr, CASE_UPPER);
array_chunk($arr,3,TRUE);
array_column($arr,'first_column','id');
array_combine($keyarr, $valuearr);
array_count_values($arr);
count($arr);
array_unique($arr);
array_values($arr);
array_keys($arr, $search_value);
array_search($needle, $haystack);
array_diff_assoc($arr1,$arr2);//差集带索引
array_diff_key($arr1, $arr2);//差集使用键名
array_diff($arr1,$arr2);
array_diff_uassoc($arr1, $arr2, $key_compare_fun);
array_diff_ukey($arr1, $arr2, $key_compare_func_callback);

array_fill_keys($key,$value);
array_fill($start_index, $num, $value);
array_filter($arr, $callback);
array_flip($arr);//交换键和值

array_intersect($arr1, $arr2);
array_intersect_key($arr, $arr2);
array_intersect_ukey($arr1, $arr2, $key_compare_func);
array_intersect_assoc($arr1, $arr2);
array_intersect_uassoc($arr1, $arr2, $key_compare_func_callback);

array_key_exists($key, $search_array);
//array_key_first($arr);
//array_key_last($arr);
array_keys($arr, $search_value);
array_map($callback, $arr);
array_merge($arr,$arr2);
array_merge_recursive($arr1, $arr2);
array_multisort($arr1, $arr1_sort_order=SORT_ASC, $arr1_sort_flags=SORT_NUMERIC);
array_multisort($volume, SORT_DESC, $edition,SORT_ASC, $data);
array_pad($arr, $pad_size=8, $pad_value='***');
array_rand($input_array,$num);
array_pop($arr);
array_push($arr,$mixed_val);
array_reduce($arr,$callback,$imxed_initial=null);
array_replace($arr,$arr2);//使用后面数组相同KEY的元素替换
array_replace($arr, $arr2);
array_reverse($arr,$preserve_keys);
array_search($needle, $haystack);
array_shift($arr);
array_unshift($arr, $mixed_val);
array_slice($arr, $offset, $len, $preserve_keys);
array_splice($arr, $offset, $len, $replacement);
array_sum($arr);


array_udiff($arr1, $arr2, $data_compare_func_callback);
array_udiff_assoc($arr1,$arr2,$data_compare_func_callback);
array_udiff_uassoc($arr1, $arr2, $ddata_compare_func, $key_compare_func);
array_uintersect($arr1, $arr2,$data_compare_func);
array_walk($arr, $callback);
array_walk_recursive($arr, $callback,$userdata);
asort($arr,$sort_flags);
arsort($arr, $sort_flags);

compact($varname, $mixedval);
extract($var_array,$extract_type, $prefix);
current($arr);
each($arr);
while(list($key, $val) = each($arr)){exit;}
end($arr);
in_array($needle, $haystack);
key_exists($key, $array);
key($arr);
ksort($arr, $sort_flags);
krsort($arr, $sort_flags);

natsort($arr);
natcasesort($arr);
next($arr);
pos($arr);//==current($arr);
prev($arr);
range($low,$high, $step);
reset($arr);
rsort($arr,$sort_flags);

shuffle($arr);
sizeof($arr);
uasort($arr,$compare_function);
uksort($arr, $cmp_function);
usort($arr, $cmp_function);
*/



/*strpos($haystack, $needle, 5);
substr_count();
substr($str, $start, $len);
strstr($haystack, $needle, $before_needle=FALSE);
stristr($haystack, $needle, $before_needle=TRUE);*/

//addcslashes($str, $charlist);
/*addslashes();
bin2hex($str);
rtrim();
chr($ascii);
chunk_split($string, $chunklen, $end);*/
//var_dump(chunk_split('1234',2,':'));
/*foreach(count_chars('Two Ts and one F', 1) as $k=>$val){
    //echo $val.'=='.chr($k)."\r\n";
}
crc32($str);
explode($delimiter, $string,$limit);
fprintf($handle, "%04d-%02d-%-2d", $year, $month, $day);
hex2bin("6578616d706c65206865782064617461");
htmlentities($html,$quote_style=ENT_CPMPAT,$charset);
htmlspecialchars($str);
htmlspecialchars_decode();
htmlentity_decode();
implode($glue, $array);//arr to string*/
//var_dump(lcfirst('Student'));
//$r = levenshtein('carrrot', 'carrrotabcd');
//$r = similar_text('carrrot', 'carrrotabcd');
//ltrim($str);
//md5_file($filename);
//md5($str);
//metaphone();
//var_dump($r);
//setlocale(LC_MONETARY,'zh_CN.UTF-8');
//$s = money_format('%.2n', 1234567.3);
////var_dump($s);
//var_dump(nl_langinfo(56));
//nlbr();
//var_dump(ord('A'));
//$s = number_format(1234567);
//parse_str('a=b&c=d', $output);
//var_dump($output);
//quotemeta($str);//转义正则元字符
//rtrim($str, $charlist);
//sha1($str);
//sha1_file($file);
//sprintf();//return a format string;
//sscanf();//根据指定格式解析指定的字符
//soundex('str');//发音比较
//
//$auth = "24\tLewis Carroll";
//$n = sscanf($auth, "%d\t%s %s", $id, $first, $last);
//echo "<author id='$id'>
//    <firstname>$first</firstname>
//    <surname>$last</surname>
//</author>\n";
//
//str_getcsv($csv);
//$csv = array_map('str_getcsv', file('data.csv'));

function ab($a, $b){
    return $a.$b;
}
$a = 'a';
$b= 'b';

$c = ab($a,$b);
echo $c;

return '0';




