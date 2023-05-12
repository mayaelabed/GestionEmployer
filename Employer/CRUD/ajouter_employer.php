<?php
require '../employer_class.php';

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $mot_de_pass = $_POST['mot_de_pass'];
    $teamleader_id = $_POST['teamleader_id'];

    // Create a new employer object
    $newEmployer = new Employe(null, $nom, $prenom, $email, $status, $mot_de_pass,$teamleader_id);

    // Establish a database connection
    $conn = createDatabaseConnection();

    // Add the employer to the database
    $newEmployer->addEmployee($conn);

    // Redirect to the employer.php page (or any other desired page)
    header('Location: ../employer.php');
    exit();
} else {
    // No form data submitted, redirect to an error page or handle the error accordingly
    header('Location: ../../404.html');
    exit();
}
?>
