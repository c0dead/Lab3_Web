<?php
/* Ex. 1 a */
$str = 'ahb acb aeb aeeb adcb axeb';
$regexp = '/a..b/'; // ищем подстроки по шаблону: буква 'a', два любых символа, буква 'b'
$matches = array(); // пустой массив
$count = preg_match_all($regexp, $str, $matches);
echo "Найдено ссылок: ${count}\n";
var_dump($matches);

/* Ex. 1 b */
$str2 = 'a1b2c3';
$regexp2 = '/[0-9]/';
// $matches[0] is the complete match
// $matches[1] is the match for the first subpattern enclosed in '(...)' and so on
// преобразуем строку так, чтобы вместо чисел стояли их кубы
$result = preg_replace_callback($regexp2, function ($matches) { return $matches[0]**3; }, $str2);
echo $result;