<?php 
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: index.php');
  }
  require_once('function.php');
  //$nickname変数に$_POST['nickname']を代入、
  $nickname = $_POST['nickname'];
  //$nicknameを画面に出力しています。
  // echo $nickname;
  $email = $_POST['email'];
  $content = $_POST['content'];

  if ($nickname == '') {
    $nickname_result = 'お名前を入力してください';
  } else {
    $nickname_result = 'ようこそ、'. $nickname. 'さま';
  }

  if ($email == '') {
    $email_result = '※メールアドレスを入力してください';
  } else {
    $email_result = 'メールアドレス：'. $email;
  }

  if ($content == '') {
    $content_result = '※入力なし';
  } else {
    $content_result = '投稿内容：'. $content;
  }  
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <title>入力内容確認画面</title>
    <meta charset="utf-8">
</head>
<body>
  <h2>入力内容の確認</h2>
  <p><?php echo h($nickname_result); ?></p>
  <p><?php echo h($email_result); ?></p>
  <p><?php echo h($content_result); ?></p>
  <form method="POST" action="thanks.php">
    <button type="button" onclick="history.back()">戻る</button>
    <?php if ($nickname != '' && $email != '' && $content != ''): ?>
      <!-- check.php にはformタグで囲むべきinputタグ（ユーザが入力する項目）はないが$nickname, $email, $contentという変数の中には 
      index.php のフォームで入力された値が入ってるため、この変数に入っている値を、画面に表示せずにformデータとして thanks.php へ渡してあげれば良い、
      $nicknameに入っている値を、hiddenタグのvalue属性に設定することで、フォームデータの受け渡しが可能になります。 -->
      <input type="hidden" name="nickname" value="<?php echo h($nickname); ?>">  
      <input type="hidden" name="email" value="<?php echo h($email); ?>">  
      <input type="hidden" name="content" value="<?php echo h($content); ?>">  
      <button type="submit">送信完了画面へ</button>
    <?php endif; ?> 
  </form>
</body>
</html>
