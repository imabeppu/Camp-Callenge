<?php

//DBへの接続を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
  //htmlを正常に実行するためtry-catchの位置変更
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayashi','password');
        //SQL実行時のエラーをtry-catchで取得できるように設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

//レコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_profiles($name, $birthday, $type, $tell, $comment){
    //db接続を確立
    try{
    $insert_db = connect2MySQL();
  }catch(PDOException $e) {
         return $e->getMessage();
      }
    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
            . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";

    //現在時をdatetime型で取得
    $datetime =new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    //クエリとして用意
    $insert_query = $insert_db->prepare($insert_sql);

    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query->bindValue(':name',$name);
    $insert_query->bindValue(':birthday',$birthday);
    $insert_query->bindValue(':tell',$tell);
    $insert_query->bindValue(':type',$type);
    $insert_query->bindValue(':comment',$comment);
    $insert_query->bindValue(':newDate',$date);

    //SQLを実行
    try{
        $insert_query->execute();
    } catch (PDOException $e) {
        //接続オブジェクトを初期化することでDB接続を切断
        $insert_db = null;
        return $e->getMessage();
    }

    $insert_db = null;
    return null;
}

function serch_all_profiles(){
    //db接続を確立
   try{
    $search_db = connect2MySQL();
    }catch(PDOException $e) {
           return $e->getMessage();
        }
    $search_sql = "SELECT * FROM user_t";

    //クエリとして用意
    $seatch_query = $search_db->prepare($search_sql);
    //SQLを実行
    try{
        $seatch_query->execute();
    } catch (PDOException $e) {
        $search_db = null;//ｄｂ切断出来ていなかったので修正、これ以下の関数も同様に修正
        return $e->getMessage();
    }
//ｄｂ切断していなかったので追加、これ以下の関数にも同様に追加
$search_db = null;
    //全レコードを連想配列として返却
    return $seatch_query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * 複合条件検索を行う
 * @param type $name
 * @param type $year
 * @param type $type
 * @return type
 */
function serch_profiles($name=null,$year=null,$type=null){
    //db接続を確立
    try{
    $search_db = connect2MySQL();
  }catch(PDOException $e) {
         return $e->getMessage();
      }
    $search_sql = "SELECT * FROM user_t";
    $flag = false;
    //issetだけ、!=nullだけだと正常に動作しないので両方を先に判定
    if(isset($name) && $name!=null){
        $search_sql .= " WHERE name like :name";
        $flag = true;
    }
    if(isset($year) && $year!=null){
      //$flag=falseになっていたので$flag==falseに修正
    if($flag == false){
        $search_sql .= " WHERE birthday like :year";
        $flag = true;
    }else{
        $search_sql .= " AND birthday like :year";
    }
  }
    if(isset($type) && $type!=null){
    if($flag == false){
        $search_sql .= " WHERE type = :type";
    }else {
        $search_sql .= " AND type = :type";
    }
  }

    //クエリとして用意
    $seatch_query = $search_db->prepare($search_sql);
//上でbind先が設定されてない事があるのでその場合bindしない
    if(isset($name) && $name != null){$seatch_query->bindValue(':name','%'.$name.'%');}
    if(isset($year) && $year != null){$seatch_query->bindValue(':year','%'.$year.'%');}
    if(isset($type) && $type != null){$seatch_query->bindValue(':type',$type);}
    //SQLを実行
    try{
        $seatch_query->execute();
    } catch (PDOException $e) {
        $search_db=null;
        return $e->getMessage();
    }
$search_db=null;
    //該当するレコードを連想配列として返却
    return $seatch_query->fetchAll(PDO::FETCH_ASSOC);
}



function profile_detail($id){
    //db接続を確立
    try{
    $detail_db = connect2MySQL();
  }catch(PDOException $e) {
         return $e->getMessage();
      }
    $detail_sql = "SELECT * FROM user_t WHERE userID=:id";

    //クエリとして用意
    $detail_query = $detail_db->prepare($detail_sql);

    $detail_query->bindValue(':id',$id);

    //SQLを実行
    try{
        $detail_query->execute();
    } catch (PDOException $e) {
        $detail_db=null;
        return $e->getMessage();
    }
$detail_db = null;
    //レコードを連想配列として返却
    return $detail_query->fetchAll(PDO::FETCH_ASSOC);
}

function delete_profile($id){
    //db接続を確立
    try{
    $delete_db = connect2MySQL();
  }catch(PDOException $e) {
         return $e->getMessage();
      }
  //誤字修正
    $delete_sql = "DELETE  from user_t WHERE userID=:id";

    //クエリとして用意
    $delete_query = $delete_db->prepare($delete_sql);

    $delete_query->bindValue(':id',$id);

    //SQLを実行
    try{
        $delete_query->execute();
    } catch (PDOException $e) {
        $delete_db=null;
        return $e->getMessage();
    }
    $delete_db=null;
    return null;
}

//update_profile()が無かったので作る
function update_profile($id,$name,$birthday,$type,$tell,$comment){
  //db接続を確立
  try{
  $update_db = connect2MySQL();
}catch(PDOException $e) {
       return $e->getMessage();
    }
  $update_sql = "UPDATE  user_t
  SET name=:name,birthday=:birthday,type=:type,tell=:tell,comment=:comment,newDate=:newDate
  WHERE userID=:id";
   //現在時をdatetime型で取得
   $datetime =new DateTime();
   $date = $datetime->format('Y-m-d H:i:s');
  //クエリとして用意
  $update_query = $update_db->prepare($update_sql);

  //SQL文にセッションから受け取った値＆現在時をバインド
  $update_query->bindValue(':name',$name);
  $update_query->bindValue(':birthday',$birthday);
  $update_query->bindValue(':tell',$tell);
  $update_query->bindValue(':type',$type);
  $update_query->bindValue(':comment',$comment);
  $update_query->bindValue(':newDate',$date);
  $update_query->bindValue(':id',$id);
  //SQLを実行
  try{
     $update_query->execute();
   }catch (PDOException $e) {
     $update_db=null;
     return $e->getMessage();
   }
   $update_db=null;
   return null;
  }
