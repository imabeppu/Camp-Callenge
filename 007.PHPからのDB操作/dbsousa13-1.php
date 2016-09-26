<?php
require_once 'dbsousa13-2.php';

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>DBアクセス課題13</title>
        <meta charset="UTF-8">
        <style>
            body {
                font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, Osaka, sans-serif;
                fontsize:14px;
            }
            ul li {
                display: inline;
            }
            table tr th {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>○×塾　時間割表</h1>
        <ul>
            <li>・<a href="dbsousa13-3.php" target="_self">時間割登録</a></li>
        </ul>
        <p>時間割</p>
        <hr>
        <table border="1">
            <tr>
                <th width="100"></th>
                <th width="100">月</th>
                <th width="100">火</th>
                <th width="100">水</th>
                <th width="100">木</th>
                <th width="100">金</th>
            </tr>

            <tr>
                <th>1時間目</th>
                <td><?php  jikanwari(1,'月');  ?></td>
                <td><?php  jikanwari(1,'火');  ?></td>
                <td><?php  jikanwari(1,'水');  ?></td>
                <td><?php  jikanwari(1,'木');  ?></td>
                <td><?php  jikanwari(1,'金');  ?></td>

            </tr>
            <tr>
                <th>2時間目</th>
                  <td><?php jikanwari(2,'月'); ?></td>
                  <td><?php jikanwari(2,'火'); ?></td>
                  <td><?php jikanwari(2,'水'); ?></td>
                  <td><?php jikanwari(2,'木'); ?></td>
                  <td><?php jikanwari(2,'金'); ?></td>
            </tr>
            <tr>
                <th>3時間目</th>
                  <td><?php jikanwari(3,'月'); ?></td>
                  <td><?php jikanwari(3,'火'); ?></td>
                  <td><?php jikanwari(3,'水'); ?></td>
                  <td><?php jikanwari(3,'木'); ?></td>
                  <td><?php jikanwari(3,'金'); ?></td>
            </tr>
            <tr>
                <th>4時間目</th>
                  <td><?php jikanwari(4,'月'); ?></td>
                  <td><?php jikanwari(4,'火'); ?></td>
                  <td><?php jikanwari(4,'水'); ?></td>
                  <td><?php jikanwari(4,'木'); ?></td>
                  <td><?php jikanwari(4,'金'); ?></td>
            </tr>
            <tr>
                <th>5時間目</th>
                <td><?php jikanwari(5,'月'); ?></td>
                  <td><?php jikanwari(5,'火'); ?></td>
                  <td><?php jikanwari(5,'水'); ?></td>
                  <td><?php jikanwari(5,'木'); ?></td>
                  <td><?php jikanwari(5,'金'); ?></td>
            </tr>

        </table>

    </body>
</html>
