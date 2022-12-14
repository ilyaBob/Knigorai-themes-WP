<?php

include 'simple_html_dom.php';

$html = new simple_html_dom();
$html->load_file(pods_field_display('url_book'));

$scripts = $html->find('[text/javascript]');

$arr = []; // Массив всех скриптов с сайта
foreach ($scripts as $item) {
   array_push($arr, $item);
}
$strArr = implode($arr);

preg_match_all('/\{"title":"[0-9]+","file":"[a-z0-9A-Z.\/:\-_\%"]+"\}/', $strArr, $match);
$resultArrayBooks = []; // Готовый массив с файлами

foreach ($match[0] as $item) {
   $resultSplite = explode('"', $item);
   array_push($resultArrayBooks, ['title' => $resultSplite[3], 'file' => $resultSplite[7]]);
}