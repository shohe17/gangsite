<?php 
  //呼び出し
  require_once('function.php');
  require_once('dbconnect.php');
  //やりたいことを選択
  $stmt = $dbh->prepare('SELECT * FROM surveys');
  //prepareを出力
  $stmt->execute();
  //出力結果を全て結果を全て読み込む
  $results = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>一覧</title>
</head>
<body>
  <!-- foreachで配列されているnicknameから順に処理していく -->
  <?php foreach($results as $result): ?>
    <p><?php echo h($result['nickname']); ?></p>
    <p><?php echo h($result['email']); ?></p>
    <p><?php echo h($result['content']); ?></p>
  <?php endforeach; ?>
</body>
</html>