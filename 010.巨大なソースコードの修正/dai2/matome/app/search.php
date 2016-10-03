<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>ユーザー情報検索画面</title>
</head>
  <body>
    <form action="<?php echo SEARCH_RESULT ?>" method="GET">

        名前:
        <br>
        <input type="text" name="name">
        <br><br>

        生年:
        <br>
        <select name="year">
            <option value="">----</option>
            <?php
            for($i=1950; $i<=2010; $i++){ ?>
              <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php } ?>
        </select>年生まれ
        <br><br>

        種別:
        <br>
        <?php
        for($i = 1; $i<=3; $i++){ ?>
        <input type="radio" name="type" value="<?php echo $i; ?>"><?php echo ex_typenum($i);?><br>
        <?php } ?>
        <input type="radio" name="type" value="">選択しない<br><!-- 選択したくないのに間違えてボタン押した時のため -->
        <input type="radio" name="type"value="" checked="checked" style="display:none;" /><!-- 未選択時typeを送る -->
        <br>
        <input type="submit" name="btnSubmit" value="検索">
      </form>
      <?php echo return_top();  //トップへのリンク挿入
      ?>
  </body>
</html>
