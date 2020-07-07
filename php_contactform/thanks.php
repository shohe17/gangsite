<?php 
    require_once('function.php');
    require_once('dbconnect.php');
  // このコードを追加するとURLを直接入力してもindex.phpに画面が戻ります。まずif文の条件ですが、$_SERVER['REQUEST_METHOD']というスーパーグローバル変数に、
  // 画面を表示するときのリクエストのメソッドが入っている。送信ボタンを押すとPOSTになるはずなので、GETの場合は直接 URLを入力していると判断してます。
  // 条件がtrueだった場合に実行されるheader('Location: index.php');は、 
  // header関数というリダイレクトする関数を実行してます。リダイレクト先が今回はindex.phpとなっているため、 index.phpが表示されます。
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: index.php');
  }

  $nickname = $_POST['nickname'];
  $email = $_POST['email'];
  $content = $_POST['content'];

  $stmt = $dbh->prepare('INSERT INTO surveys (nickname, email, content) VALUE (?, ?, ?)');
  $stmt->execute([$nickname, $email, $content]);//?を変数に置き換えてSQLを実行
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
</head>
<body>
  <h2>お問い合わせありがとうございました！</h2>
  <p><?php echo $nickname; ?></p>
  <p><?php echo $email; ?></p>
  <p><?php echo $content; ?></p>
</body>
</html>

