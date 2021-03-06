<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php
    if(isset($_POST['mode']) && $_POST['mode']=='update' or  isset($_POST['mode']) && $_POST['mode']=="RESULT"){
    session_start();
      if($_POST['mode'] =="RESULT"){
        $name = $_SESSION['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $birthday = $_SESSION['year'].'-'.sprintf('%02d',$_SESSION['month']).'-'.sprintf('%02d',$_SESSION['day']);
        $type = $_SESSION['type'];
        $tell = $_SESSION['tell'];
        $comment = $_SESSION['comment'];
      //idはPOSTで来るので変更
      $result = update_profile($_POST['id'],$name,$birthday,$type,$tell,$comment);
      //エラーが発生しなければ表示を行う
      if(!isset($result)){
      ?>
      <h1>更新確認</h1>
      名前:<?php echo $name;?><br>
      生年月日:<?php echo $birthday;?><br>
      種別:<?php echo ex_typenum($type);?><br>
      電話番号:<?php echo $tell;?><br>
      自己紹介:<?php echo $comment;?><br><br>
      以上の内容で更新しました。<br>
      <?php
      }else{
          echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result;
      }
    }
    else{
    //ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
    $confirm_values = array(
                            'name' => bind_p2s('name'),
                            'year' => bind_p2s('year'),
                            'month' =>bind_p2s('month'),
                            'day' =>bind_p2s('day'),
                            'type' =>bind_p2s('type'),
                            'tell' =>bind_p2s('tell'),
                            'comment' =>bind_p2s('comment'));

    //1つでも未入力項目があったら表示しない
    if(!in_array(null,$confirm_values, true)){
        ?>
        <h1>登録確認画面</h1><br>
        名前:<?php echo $confirm_values['name'];?><br>
        生年月日:<?php echo $confirm_values['year'].'年'.$confirm_values['month'].'月'.$confirm_values['day'].'日';?><br>
        種別:<?php echo ex_typenum($confirm_values['type']);?><br>
        電話番号:<?php echo $confirm_values['tell'];?><br>
        自己紹介:<?php echo $confirm_values['comment'];?><br><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo UPDATE_RESULT ?>" method="POST">
            <input type="hidden" name="id" value=<?php echo $_POST['id']; ?>>
            <input type="hidden" name="mode" value="RESULT" >
            <input type="submit" name="yes" value="はい">
        </form>
        <form action="<?php echo UPDATE  ?>" method="POST">
            <input type="hidden" name="mode" value="REINPUT" >
            <input type="hidden" name="id" value=<?php echo $_POST['id']; ?>>
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
        <?php
    }else {
        ?>
        <h1>入力項目が不完全です</h1><br>
        再度入力を行ってください<br>
        <h3>不完全な項目</h3>
        <?php
        //連想配列内の未入力項目を検出して表示
        foreach ($confirm_values as $key => $value){
            if($value == null){
                if($key == 'name'){
                    echo '名前';
                }
                if($key == 'year'){
                    echo '年';
                }
                if($key == 'month'){
                    echo '月';
                }
                if($key == 'day'){
                    echo '日';
                }
                if($key == 'type'){
                    echo '種別';
                }
                if($key == 'tell'){
                    echo '電話番号';
                }
                if($key == 'comment'){
                    echo '自己紹介';
                }
                echo 'が未記入です<br>';
            }
        }
        ?>
        <form action="<?php echo UPDATE  ?>" method="POST">
            <input type="hidden" name="mode" value="REINPUT" >
              <input type="hidden" name="id" value=<?php echo $_POST['id']; ?>>
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
        <?php
    }
  }

    //詳細画面に戻るボタンを追加
    //このページから戻る場合は1度ＤＢにアクセスしないと正確な情報が表示されないので詳細画面でセッションから情報を取得する処理は行わないようにする
    ?>
    <form action="<?php echo RESULT_DETAIL; ?>" method="POST">
      <input type="hidden" name="id" value=<?php echo $_POST['id']; ?>>
      <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
   <?php
 }else{
   echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
 }
    echo '<br>'.return_top();
    ?>
  </body>
</html>
