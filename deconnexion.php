<?php 
//démarrer la session
session_start();
if (!isset($_SESSION['user'])){
    //si user n'est pas connécte rediriger ves la page de connexion
    header("Location:index.php");
}
//déconnection
session_destroy();
//redirection vers la page de connexion
header("Location:index.php");
?>