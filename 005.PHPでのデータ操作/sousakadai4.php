<?php 
session_start();
if ($_SESSION['date']==null){
        print('初回の訪問です。セッションを開始します。');
     $_SESSION['date']=date('Y年m月d日G時i分s秒');
     
    }else{
    echo $_SESSION['date'];
	$_SESSION['date']=date('Y年m月d日G時i分s秒');
	}
	
    