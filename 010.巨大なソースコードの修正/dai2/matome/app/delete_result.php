<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>削除結果画面</title>
</head>
<body>
    <?php
    if(isset($_POST['mode']) && $_POST['mode']=='delete'){
    $result = delete_profile($_POST['id']);
    //エラーが発生しなければ表示を行う
    if(!isset($result)){
    ?>
    <h1>削除確認</h1>
    削除しました。<br>
    <?php
    }else{
        echo 'データの削除に失敗しました。次記のエラーにより処理を中断します:'.$result;
        //詳細画面に戻るボタン追加
        ?>
        <form action="<?php echo RESULT_DETAIL; ?>" method="POST">
          <?php reresult(); ?>
          <input type="hidden" name="id" value=<?php echo $_POST['id']; ?>>
          <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
  <?php
  }
}else{
  echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
}
  echo '<br>'.return_top();
  ?>
</body>
</html>
