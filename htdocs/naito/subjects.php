<?php
header('Content-Type: text/html; charset=UTF-8');
$dbServer = '127.0.0.1';
$dbUser = $_SERVER['MYSQL_USER'];
$dbPass = $_SERVER['MYSQL_PASSWORD'];
$dbName = $_SERVER['MYSQL_DB'];;
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";

$db = new PDO($dsn, $dbUser, $dbPass);
            $sql = 'SELECT * FROM subjects WHERE id = ?';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(1, $_GET['id']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            echo $_GET['id'];
            echo "<br />";
            echo $row['userId'];
            echo "<br />";
            echo $row['period'];
            echo "<br />";
            echo $row['name'];
            echo "<br />";
     
?>