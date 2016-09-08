<?php
function kake($tekito,$go=5,$type=false){
if($type==false){
echo $tekito*$go;}
elseif($type==true){
echo $tekito*$go*$tekito*$go;}
}