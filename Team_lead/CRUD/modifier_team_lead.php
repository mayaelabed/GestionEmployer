<?php
require '../team_lead_class.php';


if (isset($_POST['Team_leaderId'])) {
    // Retrieve the employee ID from the form
    $Team_leaderId = $_POST['Team_leaderId'];
        // Output the received data for testing
        echo "Team_leaderId ID: " . $Team_leaderId . "<br>";

    // Assuming you have retrieved the Team_leaderId's name, email, status, and connection object from the form
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $mot_de_pass = $_POST['mot_de_pass'];
    $team_id = $_POST['team_id'];




    $conn = createDatabaseConnection();

    // Create an instance of Employe and set the attribute values
    $Team_leaderIdToUpdate = new Team_leader($Team_leaderId, $nom, $prenom, $email, $status, $mot_de_pass, $team_id);

    // Call the updateEmployee method to update the employee's details
    $Team_leaderIdToUpdate->updateTeam_leader($conn);
    var_dump($Team_leaderIdToUpdate);
    // Redirect to the employeeId.php page after the update
    header('Location: ../team_lead.php');
    exit();
} else {
    // Handle the case when the team_lead ID is not provided
    // Redirect to an error page or display an error message
    echo "Invalid request";
    exit();
}
?>