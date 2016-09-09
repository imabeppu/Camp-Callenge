<?php

$teisu=$_GET['teisu'];
$sosu=array(2,3,5,7);
$a='a';
$b='b';
$soinsu=array();
$hairetu=0;

echo '元の数 '.$teisu.'<br>';

while($teisu!=1){//元の数が１になるまで素因数分解
if($teisu==0){//元の数が０なら終わり
break;}
if($a==$b){//１桁以外の素因数がある場合終わり
break;}
$a=$b;//１桁以外の素因数判別用
foreach($sosu as $value){//素因数分解
if($teisu%$value!=null){
continue;}
$soinsu[$hairetu]=$value;//素因数の格納
$hairetu=$hairetu+1;
$teisu=$teisu/$value;
$a=$teisu;}//一桁以外の素因数判別用
}
echo '一桁の素因数 ';
foreach($soinsu as $value){echo $value.',';}//一桁の素因数の表示
if($teisu>1){echo '<br>'.'その他 '.$teisu;}