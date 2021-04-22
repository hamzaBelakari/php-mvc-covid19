<?php
include "../dao/dao-utilisateur.php";

$action = $_GET['action'];
$dao = new DaoUtilisateur();

switch ($action) {
    case 'insert':
        $name = $_POST['name'];
        $website = $_POST['site'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $birthdate = $_POST['birthdate'];
        $description = $_POST['description'];
        $visibility = $_POST['visibility'];

        if (isset($name, $website, $telephone, $email, $password, $birthdate, $description, $visibility)) {
            $utilisateur = new Utilisateur($name, $email, $telephone, $password, $birthdate, $website, $visibility, $description);
            $dao->save($utilisateur);
            header('location: ../index.html');
        }
        break;
    case 'login':
        $email = $_POST['email'];
        $password = $_POST['password'];

        $utilisateur = $dao->findUtilisateur($email, $password);
        if ($utilisateur != null) {
            session_start();
            $_SESSION['utilisateur'] = $utilisateur;
            header('location: ../view/conversation.php');
        } else {
            echo "Failed!";
        }
        break;
    case 'deconnexion':
        session_start();
        session_destroy();
        header('location: ../view/bienvenue.php');
        break;
}
