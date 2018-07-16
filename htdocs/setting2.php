<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
if(isset($_SESSION['login'])==false)
{
  header('Location: false.html');
}


require_once 'database_conf.php';

        $db = new PDO($dsn, $dbUser, $dbPass);
        
        $subjectId =  $_POST['names'];

        $sql = 'INSERT INTO passwords (subjectId, date, password) values (?, now(), ?)';
        $stmt = $db->prepare($sql);
        $data[] =  $subjectId; 
        $data[] =  $_POST['password'];
        $stmt->execute($data);
        header('Location: t_confirm.html');
?>