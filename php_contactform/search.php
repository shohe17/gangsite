<?php 
  require_once('function.php');
  require_once('dbconnect.php');

  //$nicknameに空白を代入
  $nickname = '';
  //もしデータにある名前を取得できたときに実行
  if (isset($_GET['nickname'])) {
    //$nicknameに$_GET['nickname']を代入
    //GETされたときにnicknameに代入する
    $nickname = $_GET['nickname'];
}

  //SQL実行
  //選択テーブルから全てのカラム、名前を選択
  $stmt = $dbh->prepare('SELECT * FROM surveys WHERE nickname like ?');
  //nicknameの一部が合っていれば出力するように指定
  $stmt->execute(["%$nickname%"]);
  //全てを読み込み
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
    <!-- h関数の$result変数名がnickname変数値を呼び出す -->
    <p><?php echo h($result['nickname']); ?></p>
    <!-- h関数の$result変数名がemail変数値を呼び出す -->
    <p><?php echo h($result['email']); ?></p>
    <!-- h関数の$result変数名がcontent変数値を呼び出す -->
    <p><?php echo h($result['content']); ?></p>
  <?php endforeach; ?>
</body>
</html>