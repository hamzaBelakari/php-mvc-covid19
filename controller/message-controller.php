<?php

    include "../dao/dao-message.php";
    include "../model/utilisateur.php";
    session_start();
    $action = $_GET['action'];
    $dao = new DaoMessage();
    switch ($action) {
        case 'message':
            $result = $dao->findAll();
            foreach($result as $ligne){
                $message = new Message($ligne['id'],$ligne['message'],$ligne['emetteur'],$ligne['date']);
                echo $message->getEmetteur()." ".$message->getDate()." :</br>".$message->getMessage()."</br></br>";

            }
            break;
        case 'send':
            $message = new Message(0,$_POST['message'],$_SESSION['utilisateur']->getEmail(),getDate());
            $dao->save($message);
            break;
    }

?>