<?php
session_start();
if(isset($_SESSION['login'])==false)
{
  header('Location: false.html');
}



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>メニュー画面</title>
  </head>
  <body>
    <form action="student_menu.php">
      <button type="button"
    onclick="javascript:location.href = 's_history.php';">履歴</button>
      <button type="button"
    onclick="javascript:location.href = 'attendance.html';">出席</button>
      <button type="button"
    onclick="javascript:location.href = 'logout.php';">ログアウト</button>
    </form>
  </body>
</html>