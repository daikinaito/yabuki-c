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
        $sql = 'SELECT password FROM passwords';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
      while(true){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['password'] == $_POST['password']){

              header('Location: already.html');
              break;
            }
            if ($row==false) {
              break;
            }
            echo $row['password'];
            
          }
          $sql = 'INSERT INTO passwords (subjectId, date, password) values (?, now(), ?)';
          $stmt = $db->prepare($sql);
          $data[] =  $subjectId; 
          $data[] =  $_POST['password'];
          $stmt->execute($data);
          // if ($stmt==true) {
          //   header('Location: t_confirm.html');
 
          // }
          
}catch(Exception $e){
  echo '捕捉した例外: ',  $e->getMessage(), "\n";
}
?>