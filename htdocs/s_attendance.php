<?php
$sql = 'SELECT passwords.date AS "日付", subjects.period AS "時限" ,subjects.name AS "授業名" 
FROM attendances, subjects 
WHERE attendances.userid = users.id AND attendances.subjectId = subjects.id
ORDER BY date, period'

require_once 'database_conf.php';

$pdo = new PDO($dsn, $dbUser, $dbPass);
$stmt = $pdo->prepare($sql);
$stmt -> execute();
$result  = $stmt -> fetchall(PDO::FETCH_ASSOC);
print_r(h($result));
echo "/n";

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>学生用履歴画面</title>
  </head>
  <body>
    <form action="s_attendance.php">
      <button type="button"
    onclick="javascript:location.href = 'student_menu.php';">メニュー画面へ</button>
    </form>
  </body>
</html>