<?php
$global=3;

function bai(){
static $local=1;
global $global;
$global=$global*2;
echo 'global'.$global;
echo 'local'.$local++;
echo '<br>';}
for($i=0; $i<20; $i++){bai();}