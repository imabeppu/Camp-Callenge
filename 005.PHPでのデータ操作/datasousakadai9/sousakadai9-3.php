<?php
    require_once 'sousakadai9-4.php';
    require_once 'sousakadai9-6.php';

    session_chk();

  //  $get_data = array();

    //if(!empty($_GET['name'])){
      //  $get_data['name'] = $_GET['name'];
//    }
  //  if(!empty($_GET['year'])){
    //    $get_data['honbun'] = $_GET['honbun'];
//}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title><?php echo SHOW ?></title>
</head>
<body>
入力フォーム
<form action="<?php echo SHOW ?>" method="GET">
    名前:
    <input type="text" name="name" value="">
    <br><br>

    本文：　
    <textarea name="honbun"></textarea>


    <br><br>

    <input type="submit" name="btnSubmit" value="書き込み">
</form>
    <?php
    if(!isset($_GET['name'])  || !isset($_GET['honbun'])
  ){
        echo '入力を行ってください。<br>';
    }else{
      $name=$_GET['name'];
$honbun=$_GET['honbun'];
    kakikomi($name,$honbun);
  }
echo '<p>掲示板本文</p>';
require_once 'sousakadai9-4.php';
    if(!isset($file_txt)){}
      else{
    echo $file_txt;}
    ?>

</body>
</html>
