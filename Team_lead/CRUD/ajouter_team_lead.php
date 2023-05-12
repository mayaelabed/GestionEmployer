<?php
require '../team_lead_class.php';

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $mot_de_pass = $_POST['mot_de_pass'];
    $team_id = $_POST['team_id'];

    // Create a new TeamLeader object
    $newTeamLeader = new Team_leader(null, $nom, $prenom, $email, $status, $mot_de_pass, $team_id);

    // Establish a database connection
    $conn = createDatabaseConnection();

    // Add the TeamLeader to the database
    $newTeamLeader->addTeam_leader($conn);

    // Redirect to the TeamLeader.php page (or any other desired page)
    header('Location: ../team_lead.php');
    exit();
} else {
    // No form data submitted, redirect to an error page or handle the error accordingly
    header('Location: ../../404.html');
    exit();
}
?>
