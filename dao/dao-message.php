<?php

include "../model/message.php";
class DaoMessage
{
    private $dbh;


    public function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=test_db', "root", "");
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function save(Message $message)
    {
        $stm = $this->dbh->prepare("INSERT INTO message  (message,emetteur,date) VALUES (?,?,NOW())");

        $stm->bindValue(1, $message->getMessage());
        $stm->bindValue(2, $message->getEmetteur());
        $stm->execute();

    }

        public function findAll()
        {
            $stm = $this->dbh->prepare("select * from message order by date");
            $stm->execute();
            $result = $stm->fetchAll();
            return $result;
        }


}


?>