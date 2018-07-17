<?php
try{
header('Content-Type: text/html; charset=UTF-8');
session_start();
if(isset($_SESSION['login'])==false)
{
  header('Location: false.html');
}


require_once 'database_conf.php';

        $db = new PDO($dsn, $dbUser, $dbPass);
        
        $subjectId =  $_POST['names'];
        $sql = 'SELECT password FROM passwords WHERE password=?';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $_POST['password']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(empty($row))
 {         $sql = 'INSERT INTO passwords (subjectId, date, password) values (?, now(), ?)';
          $stmt = $db->prepare($sql);
          $data[] =  $subjectId; 
          $data[] =  $_POST['password'];
          $stmt->execute($data);
            header('Location: t_confirm.html');
 }else{echo 'このパスワードは使用できません';}
          
          
}catch(Exception $e){
  echo '捕捉した例外: ',  $e->getMessage(), "\n";
}
?>