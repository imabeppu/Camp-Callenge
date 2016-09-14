<?php
$access_time=date('Y年m月d日G時i分s秒');
setcookie('LastLoginDate',$access_time);

$lastDate=$_COOKIE['LastLoginDate'];
echo $lastDate;