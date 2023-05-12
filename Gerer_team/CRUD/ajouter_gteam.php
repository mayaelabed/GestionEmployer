<?php
require '../gteam_class.php';

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nom = $_POST['nom'];

    // Create a new addGTeam object
    $newEmployer = new GTeam(null, $nom, $prenom, $email, $status, $mot_de_pass);

    // Establish a database connection
    $conn = createDatabaseConnection();

    // Add the addGTeam to the database
    $newEmployer->addGTeam($conn);

    // Redirect to the addGTeam.php page (or any other desired page)
    header('Location: ../gteam.php');
    exit();
} else {
    // No form data submitted, redirect to an error page or handle the error accordingly
    header('Location: ../../404.html');
    exit();
}
?>
