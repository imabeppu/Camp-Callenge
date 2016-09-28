<?php require_once '../common/scriptUtil.php';
  session_start(); //課題４で使うのでsessionstart()の宣言位置を移動
 ?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php
    if(!empty($_POST['name']) && !empty($_POST['type'])
            && !empty($_POST['tell']) && !empty($_POST['comment'])
           && $_POST['year']!="----" && $_POST['month']!="--" && $_POST['day']!="--"//課題2　年月日が--でも通過しないよう修正
           ){

        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];
        //課題4　再入力の際にセッション情報を使うため年月日をそれぞれ格納
        $post_year = $_POST['year'];
        $post_month = $_POST['month'];
        $post_day = $_POST['day'];

        //セッション情報に格納
        $_SESSION['name'] = $post_name;
        $_SESSION['birthday'] = $post_birthday;
        $_SESSION['type'] = $post_type;
        $_SESSION['tell'] = $post_tell;
        $_SESSION['comment'] = $post_comment;
        $_SESSION['year'] = $post_year;
        $_SESSION['month'] = $post_month;
        $_SESSION['day'] = $post_day;
    ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">
          <input type="submit" name="yes" value="はい">
          <input type="hidden" name="link" value="no"><?php //課題5　hiddenされたフォーム
          ?>
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
            <input type="hidden" name="sai" value="go">
        </form>

    <?php }else{ ?>
        <h1>入力項目が不完全です</h1><br>
        <?php
        //課題3　どの入力項目が不完全か表示
        if(empty($_POST['name'])){
          echo '名前が未入力です'.'<br>';
          //課題４　セッションに入力情報を保存
        }else{$name=$_POST['name'];
          $_SESSION['name']=$name;
        }
      if(empty($_POST['tell'])){
        echo '電話番号が未入力です'.'<br>';
      }else{$tell=$_POST['tell'];
        $_SESSION['tell']=$tell;
      }
      if(empty($_POST['comment'])){
        echo '自己紹介が未入力です'.'<br>';
      }else {$comment=$_POST['comment'];
        $_SESSION['comment']=$comment;
      }
      if($_POST['year']=="----"){
         $umare='生年月日が未入力です'.'<br>';
      }else{$year=$_POST['year'];
        $_SESSION['year']=$year;
      }
      if($_POST['month']=="--"){
        $umare='生年月日が未入力です'.'<br>';
      }else{$month=$_POST['month'];
        $_SESSION['month']=$month;
      }
      if($_POST['day']=="--"){
        $umare='生年月日が未入力です'.'<br>';
      }else{$day=$_POST['day'];
        $_SESSION['day']=$day;
      }
      if(isset($umare)){
        echo $umare;
      }

      ?>
        再度入力を行ってください
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
            <input type="hidden" name="sai" value="go">
        </form>
    <?php }?>
    <br>
    <?php echo return_top();//課題 １トップページへのリンクを実装
     ?>
</body>
</html>
