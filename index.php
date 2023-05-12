<?php 
//démarrer la session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se Connecter</title>
    <link rel="stylesheet" href="style.css">
    <style>
  .button-container {
    display: flex;
    flex-direction: row;
    justify-content: center; /* Change this to align the buttons differently */
  }
  
  .Deconnexion_btn {
    /* Add any other styles you need for the buttons */
  }
</style>
</head>
<body>
<?php 
       if(isset($_POST['button_con'])){//si le formulaire est envoyer
        //se connecter a la bd
        include "bd_conn.php";
        //extraire les informations du form
        extract($_POST);
        //verifier si les champs son vides
        if(isset($email) && isset($mot_de_pass) && isset($role) && $email != "" && $mot_de_pass != ""){
            //protection cotre les injection SQL
            $email = addslashes($email);
            //verifier si les identifiants sont correcte
            $req = mysqli_query($con, "SELECT * FROM utilisateur WHERE email = '$email' And mdp ='$mot_de_pass'");
            if(mysqli_num_rows($req) > 0){
                //si les ids sont correct
                //création d'une session
                $_SESSION['user'] = $email;
                //redirection vres la page
                header("Location:Dashboard.php");
            }else{
                $error = "Email ou mot_de_pass incorrecte(s) !";
            }
        }else{
            $error = "veuillez remplir tous les champs";
        }
    }

       ?>
    <form method="post" action="" class="form_connexion_inscription">
        <h1>CONNEXION</h1>
        <p class="message_error">
            <?php 
            //afficher l'erreur
            if (isset($error)){
                echo"$error";
            }
            ?>
        </p>

        <div class="button-container">
  <a href="loginT.php" class="Deconnexion_btn" margin-right: 10px;>Team Leader</a>&nbsp&nbsp&nbsp&nbsp
  <a href="loginE.php" class="Deconnexion_btn">Employer</a>
</div>
        <label > Adresse Mail</label>
    <input type="email" name="email">
    <label > Mots de passe</label>
    <input type="password" name="mot_de_pass" class="mot_de_pass">
    <label> Type utilisateur : </label>
    <select name="role">
        <option selected value="employer">Employer</option>
        <option value="admin">Admin</option>
    </select>
    <input type="submit" value="connexion"  name="button_con">
   
    <p class="link">Vous n'avez pas de compte ? <a href="#Admin_contact">Créer un compte</a> </p>
    </form>
    
</body>
</html>