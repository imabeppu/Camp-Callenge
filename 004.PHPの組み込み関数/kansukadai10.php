<?php
$stamp=date('Y/m/d/G/i/s');
$fp = fopen('kansukadai10.txt', 'w');
    fwrite($fp, $stamp.'状況開始<br>');
    fclose($fp);
     $gmnow = gmdate("m月 d日 H時i分s秒");
     echo '現在はケンブリッチ標準時で'.$gmnow.'です'.'<br>';
$stamp=date('Y/m/d/G/i/s');
$fp = fopen('kansukadai10.txt', 'a');
    fwrite($fp, $stamp.'状況終了');
    fclose($fp);


$file_txt = file_get_contents('kansukadai10.txt');
echo $file_txt;
