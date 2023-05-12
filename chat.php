

<?php 
//démarrer la session
session_start();
if (!isset($_SESSION['user'])){
    //si user n'est pas connécte rediriger ves la page de connexion
    header("Location:index.php");
}
$user = $_SESSION['user']//user email
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$user?> | ChAT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="chat1">
<!--liste connecté-->
<ul class="un"> <i>Liste Connecté </i> 
<?php 
            //session_start();
            if (isset($_SESSION['user'])){//if user is connected
                //link to data base
                include "bd_conn.php";
                //requete pour afficher les actif
                $req = mysqli_query($con,"SELECT * FROM employe");
                if(mysqli_num_rows($req) == 0){
                    
                    ?>
                   
                   <li class="list_con"><?=$user?></li>
                    
                    <?php
                }else{
                    ?>
                    <li><?=$user?></li>
                    <?php
                    //else it's my msg
                    while($row = mysqli_fetch_assoc($req)){
                            ?> 
                                    <li class="list_con"><?=$row['nom']," ",$row['prenom']?></li>       
                  <?php
                        }
                    }
                }
            ?>
        </ul>
        </div>

<!--fin liste connecté-->

    <div class="chat">
        <div class="button-email">
            <span><?=$user?></span>
            <a href="deconnexion.php" class="Deconnexion_btn"> Déconnexion</a>
        </div>
            <!--messages-->
            <div class="messages_box">
            <?php 
            //appler la page des msg
            include "message.php";
            ?>
            </div>

            <?php 
            if(isset($_POST['send'])){
                //recuperation des msg
                $message = $_POST['message'];
                //cnx a la base
                include("bd_conn.php");
                if(isset($message) && $message != ""){
                    //insertion de msg a la bd
                    $req = mysqli_query($con, "INSERT INTO messages VALUES (NULL,'$user','$message',NOW())");
                    header("location:chat.php");
                }else{
                    header("location:chat.php");
                }
             }
            ?>
              <!--Fin messages-->
              <form method="post" action="" class="send_message">
                <textarea name="message" cols="30" rows="2" placeholder="Votre message"></textarea>
                <input type="submit" name="send">
              </from>
    </div>

    
</body>
</html>
