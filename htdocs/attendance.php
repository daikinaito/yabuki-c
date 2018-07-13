<?php
session_start();
if(isset($_SESSION['login'])==false)
{
  header('Location: false.html');
}
if(isset($_POST['password'])){
    require_once 'database_conf.php';

    $db = new PDO($dsn, $dbUser, $dbPass);
    $sql = 'SELECT subjectId FROM passwords WHERE password = ?';
    $sql2 = 'INSERT INTO attendances (subjectId, userId) values (?, ?)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $_POST['password']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row == false){
        echo 'パスワードが間違っています。';
    }else{
        $subjectId = $row['subjectId'];

        $stmt2 = $db->prepare($sql2);
        $data[] =  $subjectId; 
        $data[] = $_SESSION['id'];
    
        $stmt2->execute($data);
        header('Location: s_confirm.html');
    }
    
}
?>