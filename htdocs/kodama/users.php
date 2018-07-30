<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>kodama</title>
</head>
<body>

<?php
$dbServer = '127.0.0.1';
        $dbName = 'MYSQL_DB';
        $dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
        $dbUser = 'root';
        $dbPass = '';
        $db = new PDO($dsn, $dbUser, $dbPass);
        
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindValue('id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        foreach ($result as $person) {
                echo $person['id'];
                echo ',';
                echo $person['name'];
                echo ',';
                echo $person['password'];
                echo ',';
                echo $person['teacherFlag'];
                echo "<br/>";
        }
        
?>
</body>
    </html>