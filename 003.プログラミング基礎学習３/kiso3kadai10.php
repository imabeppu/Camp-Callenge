<?php
$imabe=array('id'=>'123','name '=>'imabeppu','birth '=>'1991,9/14','adress'=>'saitama');  //プロフィール
$imamura=array('id'=>'124','name '=>'imamura','birth '=>'1989,5/1','adress'=>'tokyou');
$murata=array('id'=>'125','name '=>'murata','birth '=>'1975,5/1','adress'=>'kagosima');


$joho=array($imabe,$imamura,$murata);

foreach($joho as $key=>$value){
if($key==2){break;}
foreach($value as $key=>$value){
if($key=='id'){
continue;}
if($key=='adress'){
continue;}
echo $key.$value.'<br>';}
}