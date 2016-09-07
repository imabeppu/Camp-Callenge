<?php

$syubetu=$_GET['syubetu'];
$sougaku=$_GET['sougaku'];
$kosu=$_GET['kosu'];

echo'種別 ';             

if($syubetu==1){
echo '雑貨';
}elseif($syubetu==2){
echo '生鮮食品';
}elseif($syubetu==3){
echo 'その他';
}

echo '<br>';
echo '総額 '.$sougaku.'円'.'<br>';
echo '１個当たりの値段 '.$sougaku/$kosu.'円'.'<br>';
echo '獲得ポイント ';




if($sougaku>=5000){
echo $sougaku*5/100;
}elseif($sougaku>=3000){
echo $sougaku*4/100;
}else{
echo 0;
}