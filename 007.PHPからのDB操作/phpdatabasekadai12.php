<?php
echo '<html>
  <head>
    <title>PHPからのDBアクセス課題12</title>
  </head>
  <body>
 名前、年齢、誕生日で複合検索できるフォーム<br>
    <form action="phpdatabasekadai12.php" method="post">

     <p>名前<input type="text" name="name"><p/>

	 <p>年齢<input type="text" name="age"><p/>
	 <p>誕生日<input type="text" name="birth"><p/>

     <p><input type="submit" value="送信する"></p>
     </form>';


if(!isset($_POST["name"]
,$_POST["age"]
,$_POST["birth"]
)){echo '空欄をすべてを入力して下さい';}
elseif($_POST["name"]==null){echo '空欄をすべてを入力して下さい';}
elseif($_POST["age"]==null){echo '空欄をすべてを入力して下さい';}
elseif($_POST["birth"]==null){echo '空欄をすべてを入力して下さい';}


else{

	$name=$_POST["name"];
	$age=$_POST["age"];
	$birth=$_POST["birth"];

try{
$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}

$select="select * from profiles
 where name  like '%$name%'
 and age like '%$age%'
 and birthday like '%$birth%'
";
$query=$pdo_object->prepare($select);
$query->execute();
$result=$query->fetchall(PDO::FETCH_ASSOC);
foreach($result as $value){foreach($value as $key=>$value){echo $key.$value;}echo '<br>';}


$pdo_object=NULL;
}

echo '</body>
</html>';
