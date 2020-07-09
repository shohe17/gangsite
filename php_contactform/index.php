<!DOCTYOE html>
<html lang="ja">
<head>
  <!-- 日本語表示時に文字化けが起きないようにする。meta要素のcharset属性を指定し、utf-8を指定する -->
  <meta charset="utf-8">
  <title>お問い合わせ入力</title>
</head>
<body>
  <h1>お問い合わせ入力フォーム</h1>
  <!-- action=は、移動先のファイル名を入力 （別ページへ移動）-->
  <!-- method=は、リクエスト先のPOSTを入力、クライアントからサーバーにリクエストをしている状態。aタグの場合はPOSTではなくGETを入力する（データ送信） --> 
  <form method="POST" action="check.php">  
    <p>▼お名前</p>
    <!-- テキストタイプを指定し、name属性にnicknameを指定する。 -->
    <input type="text" name="nickname">
    <p>▼アドレス</p>
    <!-- テキストタイプを指定し、name属性にemailを指定する。 -->    
    <input type="text" name="email">
    <p>▼ご質問内容</p>
    <!-- name属性にcontentを指定する。 -->
    <textarea name="content"></textarea><br>
    <!-- type属性にsubmitを指定し、送信効果をもったボタンを配置する -->
    <input type="submit" value="送信">
  </form>
</body>
</html>

