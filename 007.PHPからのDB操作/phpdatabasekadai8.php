<?php
echo '<html>
  <head>
    <title>PHPからのDBアクセス課題8</title>
  </head>
  <body>
 
    <form action="phpdatabasekadai8.php" method="post">
     <p>名前<input type="text" name="名前"><p/> 
	 
<p><input type="submit" value="送信する"></p>
    </form>';
	 

if(!isset($_POST["名前"])){echo '名前を入れてください';}
elseif($_POST["名前"]==null){echo '名前を入れてください';}
else{
	$name=$_POST["名前"];
try{
$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}
$select="select * from profiles where name like '%$name%'";
$query=$pdo_object->prepare($select);
$query->execute();
$result=$query->fetchall(PDO::FETCH_ASSOC);
foreach($result as $value){foreach($value as $key=>$value){echo $key.$value;}echo '<br>';}
$pdo_object=NULL;
}
  echo '</body>
</html>';
