<?php
require_once 'object1kadai5-4.php';
session_chk();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">

    <title><?php echo 'INPUT'; ?></title>
  </head>
  <body>
 在庫データ入力フォーム<br>
    <form action=<?php echo INPUT;?> method="post">
     <p>種別<input type="text" name="syubetu"><p/>
     <p>名前<input type="text" name="name"><p/>
	 <p>値段<input type="text" name="price">円<p/>
	 <p>賞味期限、消費期限（無い場合は0と入力）<input type="text" name="kigen"><p/>

<p><input type="submit" value="送信する"></p>
    </form>
<?php
if(!isset($_POST["syubetu"]
,$_POST["name"]
,$_POST["price"]
,$_POST["kigen"]
)){echo '空欄をすべてを入力して下さい';}
elseif($_POST["syubetu"]==null){echo '空欄をすべてを入力して下さい';}
elseif($_POST["name"]==null){echo '空欄をすべてを入力して下さい';}
elseif($_POST["price"]==null){echo '空欄をすべてを入力して下さい';}
elseif($_POST["kigen"]==null){echo '空欄をすべてを入力して下さい';}


else{	$syubetu=$_POST["syubetu"];
	$name=$_POST["name"];
	$price=$_POST["price"];
	$kigen=$_POST["kigen"];
  nyuryoku();
}
?>
<a href=<?php echo SHOW; ?> >商品一覧</a>
<a href=<?php echo LOGOUT; ?> >ログアウト</a>

</body>
</html>
