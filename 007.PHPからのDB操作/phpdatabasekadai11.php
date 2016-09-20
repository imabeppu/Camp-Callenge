<?php
echo '<html>
  <head>
    <title>PHPからのDBアクセス課題11</title>
  </head>
  <body>
 プロフィールＩＤで指定したレコードのプロフィールＩＤ以外の要素を上書き出来るフォーム<br>
    <form action="phpdatabasekadai11.php" method="post">
     <p>プロフィールＩＤ(半角数字)<input type="text" name="profilesID"><p/> 
     <p>名前<input type="text" name="name"><p/> 
	 <p>電話番号<input type="text" name="tell"><p/> 
	 <p>年齢<input type="text" name="age"><p/> 
	 <p>誕生日<input type="text" name="birth"><p/> 
	 
     <p><input type="submit" value="送信する"></p>
     </form>';
	 

if(!isset($_POST["profilesID"]
,$_POST["name"]
,$_POST["tell"]
,$_POST["age"]
,$_POST["birth"]
)){echo '空欄をすべてを入力して下さい';}
elseif($_POST["profilesID"]==null){echo '空欄をすべてを入力して下さい';}
elseif($_POST["name"]==null){echo '空欄をすべてを入力して下さい';}
elseif($_POST["tell"]==null){echo '空欄をすべてを入力して下さい';}
elseif($_POST["age"]==null){echo '空欄をすべてを入力して下さい';}
elseif($_POST["birth"]==null){echo '空欄をすべてを入力して下さい';}


else{
	$profilesID=$_POST["profilesID"];
	$name=$_POST["name"];
	$tell=$_POST["tell"];
	$age=$_POST["age"];
	$birth=$_POST["birth"];
	
try{
$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}
//$sql="update profiles set name=':name',age=':age',birthday=':birthday',tell=':tell' where profilesID=':pro'";
$sql="update profiles set name=:name,age=:age,birthday=:birthday,tell=:tell where profilesID=:pro";
$query=$pdo_object->prepare($sql);
$query->bindValue(':pro',$profilesID);
$query->bindValue(':name',$name);
$query->bindValue(':tell',$tell);
$query->bindValue(':age',$age);
$query->bindValue(':birthday',$birth);
$query->execute();

$select="select * from profiles";
$query=$pdo_object->prepare($select);
$query->execute();
$result=$query->fetchall(PDO::FETCH_ASSOC);
foreach($result as $value){foreach($value as $key=>$value){echo $key.$value;}echo '<br>';}

$pdo_object=NULL;
echo '上書き完了';
}

echo '</body>
</html>';
