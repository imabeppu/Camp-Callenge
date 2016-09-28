<?php require_once '../common/scriptUtil.php'; ?>
<?php require_once '../common/dbaccesUtil.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>
  <?php
  //課題５　hiddenなフォームから値を受け取ったかどうかでこのページに直接アクセスしたか判定
  if(!isset($_POST['link'])){
    echo '不正なアクセスです'.'<br>';
  }
  //課題５　直接アクセスした場合dbへの書き込み処理は実行しない
  else{
    session_start();
    $name = $_SESSION['name'];
    $birthday = $_SESSION['birthday'];
    $type = $_SESSION['type'];
    $tell = $_SESSION['tell'];
    $comment = $_SESSION['comment'];
//課題７　ここにあったｄｂアクセスの処理をdbaccesUtil.phpに切り離した
//課題８　エラーが発生した際メッセージ表示し、その時点でscriptを終了させる事でどこのエラーなのか分かりやすくする処理
    try{
     $pdo = connect2MySQL();
     insert($pdo,$name,$birthday,$type,$tell,$comment);
     $pdo = null;//接続オブジェクトを初期化することでDB接続を切断
}catch(PDOException $e){
  $pdo = null;
  echo'次記のエラーにより処理を中断します:'.$e->getMessage();
  $_SESSION = array();//課題４　セッション情報が残っているとinsert.phpに移動した時表示されてしまうので消去
  echo '<br>'.return_top();
  exit;
}
?>

    <h1>登録結果画面</h1><br>
    名前:<?php echo $name;?><br>
    生年月日:<?php echo $birthday;?><br>
    種別:<?php echo $type?><br>
    電話番号:<?php echo $tell;?><br>
    自己紹介:<?php echo $comment;?><br>
    以上の内容で登録しました。<br>
  <?php } ?>

    <?php echo return_top();
   $_SESSION = array();//課題４　セッション情報が残っているとinsert.phpに移動した時表示されてしまうので消去
    ?>

</body>

</html>
