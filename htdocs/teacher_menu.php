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
    onclick="javascript:location.href = 't_history.php';">教員用履歴</button>
      <button type="button"
    onclick="javascript:location.href = 'setting.php';">出席パスワード設定</button>
      <button type="button"
    onclick="javascript:location.href = 'logout.php';">ログアウト</button>
    </form>
  </body>
</html>
