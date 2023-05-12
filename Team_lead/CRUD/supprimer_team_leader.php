<?php
require '../team_lead_class.php';

// Check if an teamleader ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the teamleader ID
    $Team_leaderId = $_GET['id'];

    // Establish a database connection
    $conn = createDatabaseConnection();

    // Delete the teamleader
    Team_leader::deleteTeam_leader($conn, $Team_leaderId);

    // Redirect to the teamleader.php page (or any other desired page)
    try {
        header('Location: ../team_lead.php');
        exit();
    } catch (Exception $e) {
        header('Location: ../../404.html');
        exit();
    }
} else {
    // No teamleader ID provided, redirect to an error page or handle the error accordingly
    header('Location: ../../404.html');
    exit();
}
?>
