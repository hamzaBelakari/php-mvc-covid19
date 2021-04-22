<?php

class Message{

    private $id, $message, $emetteur, $date;


    public function __construct($id, $message, $emetteur, $date)
    {
        $this->id = $id;
        $this->message = $message;
        $this->emetteur = $emetteur;
        $this->date = $date;
    }
    //id
    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
         $this->id = $id;
    }
    //message
    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage(string $message)
    {
         $this->message = $message;
    }
    //emetteur
    public function getEmetteur()
    {
        return $this->emetteur;
    }

    public function setEmetteur(string $emetteur)
    {
         $this->emetteur = $emetteur;
    }
    //date

    public function getDate()
    {
        return $this->date;
    }

    public function setDate(DateTime $date)
    {
         $this->date = $date;
    }

}




?>