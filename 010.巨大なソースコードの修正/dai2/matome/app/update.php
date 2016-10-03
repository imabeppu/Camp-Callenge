<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>変更入力画面</title>
</head>
<body>
  <?php
 //直接アクセスした時の処理を挿入
  if(isset($_POST['mode']) && $_POST['mode']=='result_detail' or isset($_POST['mode']) && $_POST['mode']=='REINPUT'){?>
    <form action="<?php echo UPDATE_RESULT ?>" method="POST">
  <?php
    //何度もｄｂにアクセスして同じ情報を取得する必要もないのでセッションから取得
    session_start();
    $result = $_SESSION['userID'.$_POST['id']];
    if(isset($_POST['mode']) && $_POST['mode']=='REINPUT'){
      $name=form_value('name');
      $year=form_value('year');
      $month=form_value('month');
      $day=form_value('day');
      $type=form_value('type');
      $tell=form_value('tell');
      $comment=form_value('comment');
    }
    else{
    $name=$result[0]['name'];
    list($year, $month, $day) = explode('-', $result[0]['birthday']);
    $type=$result[0]['type'];
    $tell=$result[0]['tell'];
    $comment=$result[0]['comment'];
  }
    ?>
    名前:
    <input type="text" name="name" value="<?php echo $name; ?>">
    <br><br>

    生年月日:　
    <select name="year">
        <option value="">----</option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>" <?php if($i==$year){echo "selected";} ?>><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>" <?php if($i==$month){echo "selected";} ?>><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>" <?php if($i==$day){echo "selected";} ?>><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <?php
    for($i = 1; $i<=3; $i++){ ?>
    <input type="radio" name="type" value="<?php echo $i; ?>"<?php if($i==$type){echo "checked";}?>><?php echo ex_typenum($i);?><br>
    <?php } ?>
    <br>

    電話番号:
    <input type="text" name="tell" value="<?php echo $tell; ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $comment ?></textarea><br><br>
　　<?php hiddenID();
         modecheck('update');
?>

    <Div Align="left"><input type="submit" name="btnSubmit" value="以上の内容で更新を行う"></Div>
    </form>
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
    echo return_top(); ?>
</body>

</html>
