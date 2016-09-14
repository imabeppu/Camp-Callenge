<?php
try{
$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

$sql="update profiles set name='松岡修造',age=48,birthday='1967-11-06' where profilesID=1";
$query=$pdo_object->prepare($sql);
$query->execute();




$pdo_object=NULL;