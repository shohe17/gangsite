<?php 
  $host = "localhost";//mysqlがインストールされてるCP
  $dbname = "contactform";//つなげたいデータベース
  $charset = "utf8mb4";//文字コード
  $user = 'root';//ログインするuser名
  $password = 'root';//パスワード
  $options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];

//DBへの接続設定 調べる
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
try {
    //DBへ接続 調べる
    $dbh = new PDO($dsn, $user, $password, $options);
    //調べる
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>