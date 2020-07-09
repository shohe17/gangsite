<?php 
  $host = "localhost";//mysqlがインストールされてるCP
  $dbname = "contactform";//つなげたいデータベース
  $charset = "utf8mb4";//文字コード
  $user = 'root';//ログインするuser名
  $password = 'root';//パスワード
  $options = [
    //PDOはデータベースに接続するときに使う
    //SQLでエラーが表示された場合、画面にエラーが出力される
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    //DBから取得したデータを連想配列の形式で取得する
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //SQLインジェクション対策（SQLから情報抜き取られるのを防ぐ？）
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];

//DBへの接続設定 mysqlに接続？ 
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
try {
    //DBへ接続 18行目で実行できなかった場合この行を実行
    $dbh = new PDO($dsn, $user, $password, $options);
    //DBへ接続　20行目で実行できなかった場合この行を実行
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>