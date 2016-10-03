<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>削除確認画面</title>
</head>
  <body>
    <?php
    if(isset($_POST['mode']) && $_POST['mode']=='result_detail'){
    session_start();
    $result = $_SESSION['userID'.$_POST['id']];
    //ＤＢにアクセスしないのでif文消去
    ?>
    <h1>削除確認</h1>
    以下の内容を削除します。よろしいですか？<br>
    ＩD:<?php echo $result[0]['userID'];?><br>
    名前:<?php echo $result[0]['name'];?><br>
    生年月日:<?php echo $result[0]['birthday'];?><br>
    種別:<?php echo ex_typenum($result[0]['type']);?><br>
    電話番号:<?php echo $result[0]['tell'];?><br>
    自己紹介:<?php echo $result[0]['comment'];?><br>
    登録日時:<?php echo date('Y年n月j日　G時i分s秒', strtotime($result[0]['newDate'])); ?><br>

    <form action="<?php echo DELETE_RESULT; ?>" method="POST">
      <?php hiddenID();
      modecheck('delete');
      ?>
      <input type="submit" name="YES" value="はい"style="width:100px">
    </form><br>
    <form action="<?php echo RESULT_DETAIL; ?>" method="POST">
      <?php hiddenID();
      reresult();
      ?>
      <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
    </form>

    <?php
  }else{
      echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
  }
    echo return_top();
    ?>
   </body>
</html>
