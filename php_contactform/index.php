<!DOCTYOE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>お問い合わせ入力</title>
</head>
<body>
  <h1>お問い合わせ入力フォーム</h1>
  <!-- action=は、移動先のファイル名を入力 （別ページへ移動）-->
  <!-- method=は、リクエスト先のPOSTを入力、クライアントからサーバーにリクエストをしている状態。aタグの場合はPOSTではなくGETを入力する（データ送信） --> 
  <form method="POST" action="check.php">  
    <p>▼お名前</p>
    <input type="text" name="nickname">
    <p>▼アドレス</p>
    <input type="text" name="email">
    <p>▼ご質問内容</p>
    <textarea name="content"></textarea><br>
    <input type="submit" value="送信">
  </form>
</body>
</html>

