<?php
echo '
﻿<html>
  <head>
    <title>データ操作課題7</title>
  </head>
  <body>
    <form action="sousakadai7.php" method="post">
     <p>名前<input type="text" name="name"><p/>
	 <p>性別<input type="radio" name="sex" value="男">男
     <input type="radio" name="sex"　value="女">女<p/>
     <p>趣味 <textarea name="syumi"></textarea><p/>

<p><input type="submit" value="送信する"></p>
    </form>';
    if(!isset($_POST["name"])
    ,!isset($_POST["sex"])
    ,!isset($_POST["syumi"])
    ){echo '入力してくだい<br>';
    }
    elseif($_POST["name"]==null){echo '入力してください<br>';
    }
    elseif($_POST["sex"]==null){echo '入力してください<br>';
    }
    elseif($_POST["syumi"]==null){echo '入力してください<br>';
    }
    else{
    $name=$_POST["name"];
    $seibetu=$_POST["sex"];
    $syumi=$_POST["syumi"];
    setcookie('lastinputdata','名前'.$name.'<br>'.'性別'.$seibetu.'<br>'.'趣味'.$syumi);

  }
  if(!isset($_COOKIE['lastinputdata'])){echo '初回の入力です';
  }else{$lastdata=$_COOKIE['lastinputdata'];}
    if(!isset($lastdata)){echo '初回の入力です';}
    else{echo $lastdata;}
echo ' </body>
</html>';
