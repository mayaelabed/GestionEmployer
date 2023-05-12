<?php
require '../gteam_class.php';

// Check if an gteamId ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the gteamId ID
    $gteamId = $_GET['id'];

    // Establish a database connection
    $conn = createDatabaseConnection();

    // Delete the gteamId
    GTeam::deleteGTeam($conn, $gteamId);

    // Redirect to the gteamId.php page (or any other desired page)
    try {
        header('Location: ../gteam.php');
        exit();
    } catch (Exception $e) {
        header('Location: ../../404.html');
        exit();
    }
} else {
    // No gteamId ID provided, redirect to an error page or handle the error accordingly
    header('Location: ../../404.html');
    exit();
}
?>
