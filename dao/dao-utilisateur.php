<?php
include "../model/utilisateur.php";

class DaoUtilisateur
{

    private $dbh;

    /**
     * DaoUtilisateur constructeur.
     */
    public function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=test_db', "root", "");
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function save(Utilisateur $utilisateur)
    {
        $stm = $this->dbh->prepare("INSERT INTO utilisateur VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stm->bindValue(1, $utilisateur->getEmail());
        $stm->bindValue(2, $utilisateur->getPassword());
        $stm->bindValue(3, $utilisateur->getNom());
        $stm->bindValue(4, $utilisateur->getDateNaissance());
        $stm->bindValue(5, $utilisateur->getTelephone());
        $stm->bindValue(6, $utilisateur->getVisibilite());
        $stm->bindValue(7, $utilisateur->getSiteWeb());
        $stm->bindValue(8, $utilisateur->getDescription());

        $stm->execute();
    }

    public function findUtilisateur($email, $password)
    {
        $utilisateur = null;
        $stm = $this->dbh->prepare("SELECT * FROM utilisateur where email=? AND password=?");
        $stm->bindValue(1, $email);
        $stm->bindValue(2, $password);

        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $utilisateur = new Utilisateur($result['name'],$result['email'],$result['telephone'],'', $result['birthdate'], $result['website'], $result['visibility'], $result['description']);
        }
        return $utilisateur;
    }
}

?>