<?php 
  //''は変数
  //スーパーグローバル変数$_ から始まる関数の意味はもともと定義されている
  //もしREQUEST_METHODがGETだった場合、
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //リダイレクトします。index.phpへ戻します。
    header('Location: index.php');
  }
  //function.phpから関数を読み込みむ
  require_once('function.php');
  //$nickname変数に$_POST['nickname']を代入、
  //POSTされてきた値を$nicknameに代入する
  $nickname = $_POST['nickname'];
  //$nicknameを画面に出力しています。
  // echo $nickname;
  //変数値$emailに、POSTされた値を変数emailに代入された$_POSTを代入する
  $email = $_POST['email'];
 //変数値$contentに、POSTされた値を変数contentに代入された$_POSTを代入する
  $content = $_POST['content'];
  
  //中身を詳しく見る
  // echo '<pre>';
  // var_dump($_POST, $_POST['name']);
  // die;
  //もし$nicknameが空白と等しい場合
  if ($nickname == '') {
    //$nickname_resultは「お名前を入力してください」と出力させる
    $nickname_result = 'お名前を入力してください';
  } else {
    //空白でない場合、入力された値を$nicknameに代入し、それを$nickname_resultに代入する
    $nickname_result = 'ようこそ、'. $nickname. 'さま';
  }
  //もし$emailが空白と等しい場合
  if ($email == '') {
    ////$nickname_resultは「※メールアドレスを入力してください」と出力させる
    $email_result = '※メールアドレスを入力してください';
  } else {  
    //空白でない場合、入力された値を$emailに代入し、それを$email_resultに代入する
    $email_result = 'メールアドレス：'. $email;
  }
    //もし$contentが空白と等しい場合
  if ($content == '') {
    //$content_resultは「※入力なし」と出力させる
    $content_result = '※入力なし';
  } else {
    //空白でない場合、入力された値を$content代入し、それを$content_resultに代入する
    $content_result = '投稿内容：'. $content;
  }  
?>

<!DOCTYPE html>
<!-- 要素内でしようする言語は日本語と表している -->
<html lang="ja">
<head>
    <title>入力内容確認画面</title>
    <meta charset="utf-8">
</head>
<body>
  <h2>入力内容の確認</h2>
  <!-- h関数の$nickname_resultを出力している  h関数でxxs黒サイトスプリクティングを除く -->
  <p><?php echo h($nickname_result); ?></p>
  <!-- h関数の$email_resultを出力している -->
  <p><?php echo h($email_result); ?></p>
  <!-- h関数の$content_resultを出力している -->
  <p><?php echo h($content_result); ?></p>
  <!-- action=thanks.phpで送り先を指定し、method=POSTでブラウザーがサーバーにアクセスしたい旨を送信する -->
  <form method="POST" action="thanks.php">
    <!-- 戻るを押した時に一つ前のページに戻る -->
    <button type="button" onclick="history.back()">戻る</button>
    <!-- もし以下3種類全ての変数名が空白じゃなかった場合実行 -->
    <?php if ($nickname != '' && $email != '' && $content != ''): ?>
      <!-- check.php にはformタグで囲むべきinputタグ（ユーザが入力する項目）はないが$nickname, $email, $contentという変数の中には 
      index.php のフォームで入力された値が入ってるため、この変数に入っている値を、画面に表示せずにformデータとして thanks.php へ渡してあげれば良い、
      $nicknameに入っている値を、hiddenタグのvalue属性に設定することで、フォームデータの受け渡しが可能にる。 -->
      <!-- h関数の$nickname変数名を表示させない -->
      <input type="hidden" name="nickname" value="<?php echo h($nickname); ?>">  
      <!-- h関数の$email変数名を表示させない -->
      <input type="hidden" name="email" value="<?php echo h($email); ?>">  
      <!-- h関数の$tontent変数名を表示させない -->
      <input type="hidden" name="content" value="<?php echo h($content); ?>">  
      <!-- 送信画面へ移動する -->
      <button type="submit">送信完了画面へ</button>
    <?php endif; ?> 
  </form>
</body>
</html>
