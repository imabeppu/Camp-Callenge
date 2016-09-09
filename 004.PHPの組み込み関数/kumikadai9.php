<?php
$fp=fopen('kumikadai89.txt','r');
$file_txt=fgets($fp);
echo $file_txt;
fclose($fp);