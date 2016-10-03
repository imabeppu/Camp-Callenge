<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索結果画面</title>
</head>
    <body>
        <h1>検索結果</h1>
        <table border=1>
            <tr>
                <th>名前</th>
                <th>生年</th>
                <th>種別</th>
                <th>登録日時</th>
            </tr>
        <?php
        $result = null;
        if(empty($_GET['name']) && empty($_GET['year']) && empty($_GET['type'])){
            $result = serch_all_profiles();
        }else{
            $result = serch_profiles($_GET['name'],$_GET['year'],$_GET['type']);
        }
        if(is_array($result)){//配列で$resultが戻って来ているか（エラーが出なかったか)判定
        foreach($result as $value){
        ?>
            <tr>
                <td><a href="<?php echo RESULT_DETAIL ?>?id=<?php echo $value['userID'].'">'.$value['name']; ?></a></td>
                <td><?php echo $value['birthday']; ?></td>
                <td><?php echo ex_typenum($value['type']); ?></td>
                <td><?php echo date('Y年n月j日　G時i分s秒', strtotime($value['newDate']));; ?></td>
            </tr>
        <?php
        }
      }else{
        echo 'データの検索に失敗しました。次記のエラーにより処理を中断します:'.$result;
      }
        ?>
        </table>
        <?php echo return_top();  //トップへのリンク挿入
        ?>
</body>
</html>
