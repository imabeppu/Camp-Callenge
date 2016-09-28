<?php

//DBへの接続用を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayashi','password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//課題8　エラーモードの変更　
        return $pdo;
    } catch (PDOException $e) {
       echo '接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage();
      $_SESSION = array();//課題４　セッション情報が残っているとinsert.phpに移動した時表示されてしまうので消去
     echo '<br>'.return_top();//exitの後にあると消えてしまうのでトップページへのリンク挿入
     exit;
     }
}

//課題７　データベースアクセスの処理をinsert_result.phpからdbaccesUtil.phpに切り離し。元のページで使えるように関数にした
function insert($pdo,$name,$birthday,$tell,$type,$comment){
//ｄｂ接続を確立
$insert_db = $pdo;

//DBに全項目のある1レコードを登録するSQL
$insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
        . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";

//クエリとして用意
$insert_query = $insert_db->prepare($insert_sql);

//SQL文にセッションから受け取った値＆現在時をバインド
$insert_query->bindValue(':name',$name);
$insert_query->bindValue(':birthday',$birthday);
$insert_query->bindValue(':tell',$tell);
$insert_query->bindValue(':type',$type);
$insert_query->bindValue(':comment',$comment);
//$insert_query->bindValue(':newDate',time());課題６　元の記述
// 課題６　time()では日付が秒でしか表示されないのでdate()に置き換え
$insert_query->bindValue(':newDate',date("Y/m/d/H/i/s"));
//SQLを実行
$insert_query->execute();
}
