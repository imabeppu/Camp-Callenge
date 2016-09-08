<?php
$imabe=array('id '=>'123','name '=>'imabeppu','birth '=>'1991,9/14','adress '=>'saitama');  //プロフィール
$imamura=array('id '=>'124','name '=>'imamura','birth '=>'1989,5/1','adress '=>'tokyou');
$murata=array('id '=>'125','name '=>'murata','birth '=>'1975,5/1','adress '=>'kagosima');

function profile($userA,$userB,$userC,$name){
if(strstr($userA['name '],$name)){
$kotae=$userA;}
elseif(strstr($userB['name '],$name)){
$kotae=$userB;}
elseif(strstr($userC['name '],$name)){
$kotae=$userC;}
return $kotae;
}

//$joho=profile($imabe,$imamura,$murata,'ima');
$joho=profile($imabe,$imamura,$murata,'imamu');
foreach($joho as $key=>$value){
echo $key.$value.'<br>';}
