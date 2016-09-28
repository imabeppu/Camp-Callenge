<?php require_once '../common/scriptUtil.php';
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <input type="text" name="name"
    <?php
    //課題4　再入力の際の初期値
    if(isset($_SESSION['name'])){echo 'value="'.$_SESSION['name'].'"';}
     ?>>
    <br><br>

    生年月日:　
    <select name="year">
        <option value="----">----</option>
        <?php
        //課題４　セッションに保存された再入力情報に合致する項目にcheckedを挿入
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>"
        <?php
        if(isset($_SESSION['year'])){if("$i"==$_SESSION['year']){echo 'selected="selected"';}}
        ?>
        ><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value="--">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>"
          <?php
        if(isset($_SESSION['month'])){if("$i"==$_SESSION['month']){echo 'selected="selected"';}}
        ?>
        ><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
        <option value="--">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>"
          <?php
          if(isset($_SESSION['day'])){if("$i"==$_SESSION['day']){echo 'selected="selected"';}}
          ?>
          ><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <input type="radio" name="type" value="エンジニア"
    <?php
    //課題４　セッションに保存された再入力情報に合致する項目にcheckdedを挿入
    if(!isset($_SESSION['type'])){echo 'checked="checked"';}
    elseif($_SESSION['type']=="エンジニア"){echo 'checked="checked"';}
    ?>
    >エンジニア<br>
    <input type="radio" name="type" value="営業"
    <?php
    if(isset($_SESSION['type'])){if($_SESSION['type']=="営業"){echo 'checked="checked"';}}
    ?>
    >営業<br>
    <input type="radio" name="type" value="その他"
    <?php
    if(isset($_SESSION['type'])){if($_SESSION['type']=="その他"){echo 'checked="checked"';}}
    ?>>その他<br>
    <br>

    電話番号:
    <input type="text" name="tell" value="<?php if(isset($_SESSION['tell'])){echo $_SESSION['tell'];}//課題４　再入力の際の初期値 ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard" ><?php if(isset($_SESSION['comment'])){echo $_SESSION['comment'];}//課題4　再入力の際の初期値 ?></textarea><br><br>

    <input type="submit" name="btnSubmit" value="確認画面へ">
    </form>
    <br>
    <?php
　//課題 1トップページへのリンクを実装
    echo return_top();
//課題４　使用したセッション情報が次に入力する際に残らないよう消す
  $_SESSION = array();
  ?>
</body>

</html>
