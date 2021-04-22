<?php
include "../model/utilisateur.php";
session_start();
if(isset($_SESSION['utilisateur'])){
    $utilisateur = $_SESSION['utilisateur'];

    echo "Bienvenue ".$utilisateur->getNom();
    echo "<a  role='button' class='btn btn-danger float-right' href='../controller/utilisateur-controller.php?action=deconnexion'>Déconnexion</a>";
} else {
    header('location: login.html');
}
?>