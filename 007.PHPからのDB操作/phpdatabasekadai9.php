<?php
echo '<html>
  <head>
    <title>PHPからのDBアクセス課題9</title>
  </head>
  <body>
 プロフィールデータ挿入フォーム<br>
    <form action="phpdatabasekadai9.php" method="post">
     <p>profilesID<input type="text" name="profilesID"><p/> 
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
$insert="insert into profiles(profilesID,name,tell,age,birthday)value(:pro,:name,:tell,:age,:birthday)";
$query=$pdo_object->prepare($insert);
$query->bindValue(':pro',$profilesID);
$query->bindValue(':name',$name);
$query->bindValue(':tell',$tell);
$query->bindValue(':age',$age);
$query->bindValue(':birthday',$birth);
$query->execute();


$pdo_object=NULL;
echo '挿入完了しました';
}
echo '</body>
</html>';
