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
        $dbName =$_SERVER[ 'MYSQL_DB'];
        $dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
        $dbUser = $_SERVER['MYSQL_USER'];
        $dbPass = $_SERVER['MYSQL_PASSWORD'];
        $db = new PDO($dsn, $dbUser, $dbPass);

        $id=$_GET['id'];
        
        $sql = 'SELECT * FROM users WHERE id = :id';
        $prepare = $db->prepare($sql);
        $prepare->bindValue(':id',$id,PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

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