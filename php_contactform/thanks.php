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
  //$nickname変数に$_POST['nickname']を代入、
  //POSTされてきた値を$nicknameに代入する
  $nickname = $_POST['nickname'];
  //$email変数に$_POST['email']を代入、
  //POSTされてきた値を$nicknameに代入する
  $email = $_POST['email'];
  //$content変数に$_POST['content']を代入、
  //POSTされてきた値を$contentに代入する
  $content = $_POST['content'];
  //prepare関数の()内を実施する　serveryテーブルのnickname, email, contentに？を挿入する
  $stmt = $dbh->prepare('INSERT INTO surveys (nickname, email, content) VALUE (?, ?, ?)');
  //?を変数に置き換えてSQLを実行
  $stmt->execute([$nickname, $email, $content]);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
</head>
<body>
  <h2>お問い合わせありがとうございました！</h2>
  <!-- $nicknameを出力する -->
  <p><?php echo $nickname; ?></p>
  <!-- $emailを出力する -->
  <p><?php echo $email; ?></p>
  <!-- $contentを出力する -->
  <p><?php echo $content; ?></p>
</body>
</html>

