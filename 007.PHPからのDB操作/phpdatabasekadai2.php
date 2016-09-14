<?php

try{
$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}
$insert="insert into profiles(profilesID,name,tell,age,birthday)value(:pro,:name,:tell,:age,:birthday)";
$query=$pdo_object->prepare($insert);
$query->bindValue(':pro',6);
$query->bindValue(':name','鈴木誠');
$query->bindValue(':tell','03-456-7890');
$query->bindValue(':age',22);
$query->bindValue(':birthday','1994-8-15');
$query->execute();


$pdo_object=NULL;