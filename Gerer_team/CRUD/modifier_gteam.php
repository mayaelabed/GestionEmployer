<?php
require '../gteam_class.php';


if (isset($_POST['gteamId'])) {
    // Retrieve the gteam ID from the form
    $gteamId = $_POST['gteamId'];

    // Assuming you have retrieved data connection object from the form
    $nom = $_POST['nom'];

    $conn = createDatabaseConnection();

    // Create an instance of gteam and set the attribute values
    $gteamToUpdate = new GTeam($gteamId, $nom);


    // Call the updategteam method to update the gteam's details
    $gteamToUpdate->updateGTeam($conn);
    // Redirect to the gteam.php page after the update
    header('Location: ../gteam.php');
    exit();
} else {
    // Handle the case when the gteam ID is not provided
    // Redirect to an error page or display an error message
    echo "Invalid request";
    exit();
}
?>