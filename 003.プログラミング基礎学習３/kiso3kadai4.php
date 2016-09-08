<?php
function my_profile(){
echo '今別府侑馬<br>';
echo '1991年9月14日生まれ<br>';
echo '趣味はゲームです。<br>';
return true;
}
$honto=my_profile();
if($honto==true){
echo 'この処理は正しく実行出来ました';}
else{
echo '正しく実行できませんでした';}