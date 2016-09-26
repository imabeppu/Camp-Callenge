<?php

if(!isset($_POST["username"]
)){$username=null;}
elseif($_POST["username"]==null){$username=null;}
else{$username=$_POST["username"];

  try{
  $pdo_object= new PDO('mysql:host=localhost;dbname=zaikokanri;charset=utf8','imabe','ppu');
  }
  catch(PDOException $Exception){
   	die('接続に失敗しました:'.$Exception->getMessage());
  }
  $select="select pass from userdata where name=:name";
  $query=$pdo_object->prepare($select);
  $query->bindValue(':name',$username);
  $query->execute();
  $result=$query->fetchall(PDO::FETCH_ASSOC);
  foreach($result as $value){foreach($value as $value){$value;}}
  $pdo_object=NULL;
  }

function nyuryoku(){
global $syubetu;
global $price;
global $name;
global $kigen;
try{
$pdo_object= new PDO('mysql:host=localhost;dbname=zaikokanri;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
die('接続に失敗しました:'.$Exception->getMessage());
}
$insert="insert into zaikodata(syubetu,name,price,kigen)value(:syubetu,:name,:price,:kigen)";
$query=$pdo_object->prepare($insert);
$query->bindValue(':syubetu',$syubetu);
$query->bindValue(':name',$name);
$query->bindValue(':price',$price);
$query->bindValue(':kigen',$kigen);
$query->execute();
$pdo_object=NULL;
echo '挿入完了しました';
}

function zaikohyouji(){
try{
$pdo_object= new PDO('mysql:host=localhost;dbname=zaikokanri;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

$select="select * from zaikodata";
$query=$pdo_object->prepare($select);
$query->execute();
$result=$query->fetchall(PDO::FETCH_ASSOC);
foreach($result as $value){foreach($value as $key=>$value){echo $key.$value;}echo '<br>';}
$pdo_object=NULL;
}


function session_chk(){
    $period_time = 3600;
    session_start();
    if(!empty($_SESSION['last_access'])){
        if((mktime() - $_SESSION['last_access']) > $period_time){
            echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'?mode=timeout">';
            logout_s();
            exit;
        }else{
            $_SESSION['last_access']=mktime();
        }
    }else{
        echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'">';
        exit;
    }
}

function logout_s(){
    session_unset();
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 1800, '/');
    }
    session_destroy();
}
function logout(){
    session_unset();
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 1800, '/');
    }
    //session_destroy();
}


const LOGIN = 'object1kadai5-1.php';
const INPUT = 'object1kadai5-2.php';
const SHOW = 'object1kadai5-3.php';
const REDIRECT = 'object1kadai5-5.php';
const LOGOUT ='object1kadai5-6.php';
