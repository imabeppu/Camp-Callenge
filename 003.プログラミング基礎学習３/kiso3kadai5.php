<?php

function profile(){
$id=123;
$name='今別府侑馬';
$birth='1991,9/14';
$adress='saitama';

return array($id,$name,$birth,$adress);
}
$joho= profile();
foreach($joho as $value){
echo $value.'<br>';}