<?php 
  require_once('function.php');
  require_once('dbconnect.php');

  //$nicknameに空白を代入
  $nickname = '';
  //もしデータにある名前を取得できたとき
  if (isset($_GET['nickname'])) {
    $nickname = $_GET['nickname'];
}

  //SQL実行
  //選択テーブルから全てのカラム、名前を選択
  $stmt = $dbh->prepare('SELECT * FROM surveys WHERE nickname like ?');
  //nicknameの一部が合っていれば出力するように指定
  $stmt->execute(["%$nickname%"]);
  //全てを見込み
  $results = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
</head>
<body>
  <form action="" method="get">
    <p>検索したいお名前を入れてください</p>
    <input type="text" name="nickname">
    <input type="submit" value="検索">
  </form>
  <!-- 画面への表示 -->
  <?php foreach ($results as $result): ?>
    <p><?php echo h($result['nickname']); ?></p>
    <p><?php echo h($result['email']); ?></p>
    <p><?php echo h($result['content']); ?></p>
  <?php endforeach; ?>
</body>
</html>