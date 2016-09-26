<?php
    require_once 'object1kadai5-4.php';

    //if(!isset($_POST["username"]
  //  )){$username=null;}
  //  elseif($_POST["username"]==null){$username=null;}
  //  else{$username=$_POST["username"];
    //syougou();}

   $pass='nasi';
   if(isset($value)){
   $pass = $value;
   }

    $chkpass=null;
    if(empty($_POST['password'])){
        $chkpass=null;
    }else{
        $chkpass=$_POST['password'];
    }


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title><?php echo LOGIN ?></title>
</head>
<body>
    <h1>ログイン画面</h1>

    <?php
   if($chkpass!==$pass){
        if($chkpass!==null){
            echo 'ユーザー名とログインパスワードが一致しません<br>';
        }else{
            echo 'ユーザー名とログインパスワードを入力してください<br>';
        }
        ?>
        <form action="<?php echo LOGIN ?>" method="POST">
            <a>username<input type="text" name="username"></a>
            <a>password<input type="text" name="password"></a>
            <input type="submit" name="btnSubmit" value="ログイン">
        </form>
    <?php
    }else{
        echo 'ログインに成功しました。三秒後にサービストップに移動します';
        echo '<meta http-equiv="refresh" content="3;URL='.INPUT.'">';
        session_start();
        $_SESSION['last_access']=mktime();}
    ?>
</body>
</html>
