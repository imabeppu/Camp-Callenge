<?php

require_once 'dbsousa13-2.php';
$errflg = false;
$isSubmit = false;
if (isset($_POST[USER_PAGE_SUBMIT])) {
    $isSubmit = true;

    if (!empty($_POST['youbi']) && !empty($_POST['jigen']) && !empty($_POST['subjects']) && !empty($_POST['kousi'])) {

        $youbi = $_POST['youbi'];
        $jigen = $_POST['jigen'];
        $subject = $_POST['subjects'];
        $kousi = $_POST['kousi'];
        kakikae($jigen,$youbi,$subject,$kousi);

      }
     else {
        $errflg = true;
    }
  }


?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>DBアクセス -ＵＰＤＡＴＥ </title>
        <meta charset="UTF-8">
        <style>
            body {
                font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, Osaka, sans-serif;
                fontsize:14px;
            }
            ul li {
                display: inline;
            }
        </style>
    </head>
    <body>
        <h2>○×塾　受験者登録</h2>
        <?php
            if ($isSubmit == true && $errflg == false ) {
        ?>
        <p><?=MSG_REGIST_OK?></p>
        <a href="dbsousa13-1.php">トップへ戻る</a><br>
        <a href="dbsousa13-3.php">続けて入力</a>
        <?php
            } else {
                if ($errflg == true) {
                    echo '<p>'.MSG_INPUT_ERR.'</p>';
                } else {
                    echo '<p>全て必須項目です。</p>';
                }
        ?>
        <form action="dbsousa13-3.php" method="post">
            <table>
                <tr>
                    <td>
                        曜日：
                    </td>
                    <td>
                        <input type="radio" name="youbi" value="月">月
                        <input type="radio" name="youbi" value="火">火
                        <input type="radio" name="youbi" value="水">水
                        <input type="radio" name="youbi" value="木">木
                        <input type="radio" name="youbi" value="金">金
                    </td>
                </tr>
                <tr>
                    <td>
                        時限：
                    </td>
                    <td>
                        <input type="radio" name="jigen" value="1">1
                        <input type="radio" name="jigen" value="2">2
                        <input type="radio" name="jigen" value="3">3
                        <input type="radio" name="jigen" value="4">4
                        <input type="radio" name="jigen" value="5">5
                    </td>
                </tr>
                <tr>
                    <td>
                        科目：
                    </td>
                    <td>
                        <?php
                            subject();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        講師：
                    </td>
                    <td>
                        <?php
                            kousi();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="<?=USER_PAGE_SUBMIT?>" value="登録">
                        <br><a href="dbsousa13-1.php">トップへ戻る</a>
                    </td>
                </tr>
            </table>
        </form>
        <?php
            }
        ?>
    </body>
</html>
