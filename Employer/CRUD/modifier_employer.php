<?php
require '../employer_class.php';


if (isset($_POST['employeeId'])) {
    // Retrieve the employee ID from the form
    $employeeId = $_POST['employeeId'];
        // Output the received data for testing
        echo "Employee ID: " . $employeeId . "<br>";

    // Assuming you have retrieved the employee's name, email, status, and connection object from the form
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $mot_de_pass = $_POST['mot_de_pass'];
    $teamleader_id = $_POST['teamleader_id'];





    $conn = createDatabaseConnection();

    // Create an instance of Employe and set the attribute values
    $employeeToUpdate = new Employe($employeeId, $nom, $prenom, $email, $status, $mot_de_pass,$teamleader_id);

    // Call the updateEmployee method to update the employee's details
    $employeeToUpdate->updateEmployee($conn);
    var_dump($employeeToUpdate);
    // Redirect to the employer.php page after the update
    header('Location: ../employer.php');
    exit();
} else {
    // Handle the case when the employee ID is not provided
    // Redirect to an error page or display an error message
    echo "Invalid request";
    exit();
}
?>