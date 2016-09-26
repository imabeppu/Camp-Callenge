<?php
const USER_PAGE_SUBMIT = 'btnRegUser';

const MSG_REGIST_OK = '登録が完了しました。';
const MSG_INPUT_ERR = '入力内容に誤りがあります。';














function jikanwari($jikan,$youbi){
  try{
$pdo_object= new PDO('mysql:host=localhost;dbname=dbsousa;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

$select="select subjects,kousi from t_users
where time=:jikan
and youbi=:awabi";
$query=$pdo_object->prepare($select);
$query->bindValue(":jikan",$jikan);
$query->bindValue(":awabi",$youbi);
$query->execute();
$result=$query->fetchall(PDO::FETCH_ASSOC);
foreach($result as $value){foreach($value as $key=>$value){echo $value.'<br>';}}
$pdo_object=NULL;
}



function kakikae($jikan,$youbi,$subject,$kousi){
  try{
$pdo_object= new PDO('mysql:host=localhost;dbname=dbsousa;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

$select="update t_users set
subjects=:subject,
kousi=:kousi
where time=:jikan
and youbi=:awabi";
$query=$pdo_object->prepare($select);
$query->bindValue(":jikan",$jikan);
$query->bindValue(":awabi",$youbi);
$query->bindValue(":subject",$subject);
$query->bindValue(":kousi",$kousi);
$query->execute();
$result=$query->fetchall(PDO::FETCH_ASSOC);
foreach($result as $value){foreach($value as $key=>$value){echo $value.'<br>';}}
$pdo_object=NULL;
}

function subject(){
  try{
$pdo_object= new PDO('mysql:host=localhost;dbname=dbsousa;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

$select="select name from m_subjects";
$query=$pdo_object->prepare($select);
$query->execute();
$result=$query->fetchall(PDO::FETCH_ASSOC);
foreach($result as $value){foreach($value as $key=>$value){echo '<input type="radio" name="subjects" value="'.$value.'"'.'>'.$value;}}
$pdo_object=NULL;
}



function kousi(){
  try{
$pdo_object= new PDO('mysql:host=localhost;dbname=dbsousa;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

$select="select name from kousi";
$query=$pdo_object->prepare($select);
$query->execute();
$result=$query->fetchall(PDO::FETCH_ASSOC);
foreach($result as $value){foreach($value as $key=>$value){echo '<input type="radio" name="kousi" value="'.$value.'"'.'>'.$value;}}
$pdo_object=NULL;
}
