<?php
//データベース接続設定
$dbServer = '127.0.0.1';
$dbUser = $_SERVER['MYSQL_USER'];
$dbPass = $_SERVER['MYSQL_PASSWORD'];
$dbName = $_SERVER['MYSQL_DB'];;

//データベースへの接続
$db = new PDO($dsn, $dbUser, $dbPass);

//検索実行
$sql = 'SELECT * FROM members';
$prepare = $db->prepare($sql);
$prepare->execute();
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

//結果の出力
foreach ($result as $person) {
  echo $person['id'];
  echo ' ';
  echo $person['name'];//手抜き
  echo "<br/>";
}
