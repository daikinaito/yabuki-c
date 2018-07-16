<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
if(isset($_SESSION['login'])==false)
{
  header('Location: false.html');
}

        require_once 'database_conf.php';
        $sql = 'select * from subjects';
        $db = new PDO($dsn, $dbUser, $dbPass);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>出席パスワード設定</title>
    
</head>
<body>
    <h1>出席パスワード設定</h1>
    <form action="setting2.php" method="POST">
        <a>授業名[限目]</a><br/>
        <select name="names">       
         <?php foreach ($result as $value) { 
             $period = $value['period'];
             $name = $value['name'];
             $id = $value['id']?>
                <option value="<?php echo $id; ?>">
                    <?php echo $name . '(' . $period . ')'; ?>
                </option>
            <?php } ?>
        </select><br/>
        <a>出席パスワード</a><br/>
        <input type="text" name="password"><br>
        <button type=submit>送信</button>
    </form> 
    <a href="teacher_menu.php">メニュー画面へ</a>
</body>
</html>