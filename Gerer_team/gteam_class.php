<?php
require 'bd_conn.php';

// Establish a database connection
$con = createDatabaseConnection();

class GTeam {
    
    public $id;
    public $nom;
    
    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    // Function to retrieve all GTeam from the database
    public static function getAllGTeam($con) {
        $st = $con->prepare("SELECT * FROM team");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to add an employee to the database
    public function addGTeam($con) {
      $st = $con->prepare("INSERT INTO team (nom) VALUES (?)");
      $st->execute([$this->nom]);
  }
  
    // Function to delete an employee from the database by their ID
    public static function deleteGTeam($con, $gteamId) {
        $st = $con->prepare("DELETE FROM team WHERE id = ?");
        $st->execute([$gteamId]);        
    }

    // Function to retrieve One employees from the database
    public static function getOneGTeam($con, $gteamId) {
        $st = $con->prepare("SELECT * FROM team where id = ?");
        $st->execute([$gteamId]);
        $employee = $st->fetch(PDO::FETCH_ASSOC);
        return $employee;
    }

    // Function to update an employee's details in the database
    public function updateGTeam($conn) {
        $st = $conn->prepare("UPDATE team SET nom = ? WHERE id = ?");
        $st->execute([$this->nom, $this->id]);
    }
}



// Retrieve all employees from the database
$gteams = GTeam::getAllGTeam($con);



// Create a new employee
//$newEmployee = new Employe(null, 'John', 'Doe', 'john@example.com', 'Active', 'password');
//$newEmployee->addEmployee($con);

// Update an employee's details
//$employeeToUpdate = new Employe(1, 'Updated Name', 'Updated Last Name', 'updated@example.com', 'Inactive', 'newpassword');
//$employeeToUpdate->updateEmployee($con);

// Retrieve all employees again after the update
//$updatedEmployers = Employe::getAllEmployees($con);


?>