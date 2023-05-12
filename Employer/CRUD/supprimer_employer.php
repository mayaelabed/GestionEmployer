<?php
require '../employer_class.php';

// Check if an employee ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the employee ID
    $employeeId = $_GET['id'];

    // Establish a database connection
    $conn = createDatabaseConnection();

    // Delete the employee
    Employe::deleteEmployee($conn, $employeeId);

    // Redirect to the employer.php page (or any other desired page)
    try {
        header('Location: ../employer.php');
        exit();
    } catch (Exception $e) {
        header('Location: ../../404.html');
        exit();
    }
} else {
    // No employee ID provided, redirect to an error page or handle the error accordingly
    header('Location: ../../404.html');
    exit();
}
?>
