<?php
echo '<html>
  <head>
    <title>PHPからのDBアクセス課題10</title>
  </head>
  <body>
 プロフィールＩＤで指定したレコードを消去出来るフォーム<br>
    <form action="phpdatabasekadai10.php" method="post">
     <p>プロフィールＩＤ(半角数字)<input type="text" name="profilesID"><p/> 
    
	 
<p><input type="submit" value="送信する"></p>
    </form>';
	 

if(!isset($_POST["profilesID"])){echo '数字を入力して下さい';}

elseif($_POST["profilesID"]==null){echo '数字を入力して下さい';}

else{
	$profilesID=$_POST["profilesID"];
	
try{
$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','imabe','ppu');
}
catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
}
$sql="delete from profiles where profilesID=$profilesID";
$query=$pdo_object->prepare($sql);
$query->execute();


$pdo_object=NULL;
echo '消去完了しました';
}
echo '</body>
</html>';
