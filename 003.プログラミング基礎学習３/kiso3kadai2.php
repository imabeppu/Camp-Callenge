<?php
function gusukisu($hanbetu){
if($hanbetu%2==0){
echo $hanbetu.'は偶数です';}
else{
echo $hanbetu.'は奇数です';}
}
gusukisu(5);
echo '<br>';
gusukisu(6);