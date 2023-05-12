<?php 
//connexion a la base de données
$con = mysqli_connect("localhost","root","","gestionemp");
//gérer les accents et autres caractéres francais
$req = mysqli_query($con,"SET NAMES UTF8");
if($con){
    //echo"connexion échouée";
}
?>