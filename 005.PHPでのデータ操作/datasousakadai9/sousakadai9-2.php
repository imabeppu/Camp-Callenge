<?php
    require_once 'sousakadai9-4.php';
    require_once 'sousakadai9-6.php';

    session_chk();

    if(!isset($_COOKIE['login_count']) && !isset($_COOKIE['last_login'])){
        $lcount = 1;
        $llogin = mktime();
        setcookie('login_count',$lcount);
        setcookie('last_login',$llogin);
        setcookie('SAVEDPHPSESSID',$_COOKIE['PHPSESSID']);
    }else if($_COOKIE['PHPSESSID']!=$_COOKIE['SAVEDPHPSESSID']){
        setcookie('login_count',$_COOKIE['login_count']+1);
        $lcount = $_COOKIE['login_count'];
        $llogin = $_COOKIE['last_login'];
        setcookie('last_login',mktime());
        setcookie('SAVEDPHPSESSID',$_COOKIE['PHPSESSID']);
    }else{
        $lcount = $_COOKIE['login_count'];
        $llogin = $_COOKIE['last_login'];
    }


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title><?php echo INPUT ?></title>
</head>
<body>
    <h1>掲示板ＴＯＰ</h1>
    今回で<?php echo $lcount ?>回目のアクセスです！　最終ログイン日時 <?php echo date('Y年m月d日 H時i分s秒',$llogin)?> <br>
    <a href=<?php echo SHOW; ?> >掲示板はこちら</a>

    <br><br>
</body>
</html>
