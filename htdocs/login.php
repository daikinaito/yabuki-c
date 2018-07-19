<?php
// ini_set('mbstring.internal_encoding' , 'UTF-8');
header('Content-Type: text/html; charset=UTF-8');
    if(isset($_POST['id']) and isset($_POST['password'])){

        require_once 'database_conf.php';

        $db = new PDO($dsn, $dbUser, $dbPass);
            $sql = 'SELECT password, teacherFlag FROM users WHERE id = ?';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(1, $_POST['id']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $password = $row['password'];
                $teacherFlag = $row['teacherFlag'];

            if($password === $_POST['password']){

                session_start();
                $_SESSION['id'] = $_POST['id']; 
                $_SESSION['login']=1;

                if($teacherFlag == 1){
                    header('Location: teacher_menu.php');
                }else{
                    header('Location: student_menu.php');
                }
            }
            else{
                $message = 'IDまたはパスワードが間違っています。';
                echo $message;
            }
    }

?>
