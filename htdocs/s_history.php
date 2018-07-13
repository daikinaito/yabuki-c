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
session_start();
if(isset($_SESSION['login'])==false)
{
  header('Location: false.html');
}
$userId = $_SESSION['id'];
$sql = 'SELECT date, period, name 
FROM attendances, subjects, passwords 
WHERE attendances.userId = ? AND attendances.subjectId = subjects.id
ORDER BY date, period';

require_once 'database_conf.php';

$db = new PDO($dsn, $dbUser, $dbPass);
$stmt = $db->prepare($sql);
$stmt->bindValue(1, $userId);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<table>';
echo '<tr><th>日付</th><th>時限</th><th>授業名</th>';
foreach ($result as $person) {
  $date = $person['date'];
  $period = $person['period'];
  $name = $person['name'];
  // echo $date;
  // echo ',';
  // echo $period;
  // echo ',';
  // echo $name;
  // echo '<br/>';
  echo "<tr><td>$date</td><td>$period</td><td>$name</td></tr>";
}
echo '</table>';
?>
<a href="student_menu.php">メニュー画面へ</a>
 </body>
</html>