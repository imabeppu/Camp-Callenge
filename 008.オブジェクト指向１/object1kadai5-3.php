<?php
require_once 'object1kadai5-4.php';
session_chk();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">

    <title><?php echo SHOW; ?></title>
  </head>
  <body>
    <p>在庫一覧</p>
    <?php  zaikohyouji(); ?>
    <a href=<?php echo INPUT; ?> >商品情報入力ページに戻る</a>
    <a href=<?php echo LOGOUT; ?> >ログアウト</a>
  </body>
  </html>
