<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <title></title>
    <style>
    table {border-collapse: collapse;}
    th, td {border: solid black 1px;}
    </style>
  </head>
  <body>
<?php
try{
$sql = 'SELECT * FROM a WHERE 1';

require_once 'database_conf.php';

$db = new PDO($dsn, $dbUser, $dbPass);
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<table>';
echo '<tr><th>id</th><th>名前</th><th>パスワード</th>';
foreach ($result as $person) {
  $id = $person['id'];
  $name = $person['userId'];
  $password = $person['period'];
  echo "<tr><td>$id</td><td>$name</td><td>$password</td></tr>";
}
echo '</table>';
}catch (Exception $e) {
    echo '捕捉した例外: ',  $e->getMessage(), "\n";
}
?>
 </body>
</html>