<?php
require 'bd_conn.php';

// Establish a database connection
$con = createDatabaseConnection();

class Employe {
    
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $status;
    public $mot_de_pass;
    public $teamleader_id;
    
    public function __construct($id, $nom, $prenom, $email, $status,$mot_de_pass,$teamleader_id) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->status = $status;
        $this->mot_de_pass = $mot_de_pass;
        $this->teamleader_id = $teamleader_id;
    }

    // Function to retrieve all employees from the database
    public static function getAllEmployees($con) {
        $st = $con->prepare("SELECT * FROM employe");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to add an employee to the database
    public function addEmployee($con) {
      $st = $con->prepare("INSERT INTO employe (nom, prenom, email, status, mot_de_pass, teamleader_id) VALUES (?, ?, ?, ?,?,?)");
      $st->execute([$this->nom, $this->prenom, $this->email, $this->status, $this->mot_de_pass, $this->teamleader_id]);
  }
  
    // Function to delete an employee from the database by their ID
    public static function deleteEmployee($con, $employeeId) {
        $st = $con->prepare("DELETE FROM employe WHERE id = ?");
        $st->execute([$employeeId]);        
    }

    // Function to retrieve One employees from the database
    public static function getOneEmployees($con, $employeeId) {
        $st = $con->prepare("SELECT * FROM employe where id = ?");
        $st->execute([$employeeId]);
        $employee = $st->fetch(PDO::FETCH_ASSOC);
        return $employee;
    }

    // Function to update an employee's details in the database
    public function updateEmployee($conn) {
        $st = $conn->prepare("UPDATE employe SET nom = ?, prenom = ?, email = ?, status = ?, mot_de_pass = ?, teamleader_id = ?  WHERE id = ?");
        $st->execute([$this->nom, $this->prenom, $this->email, $this->status,  $this->mot_de_pass,$this->teamleader_id ,$this->id]);
    }



    public static function getTeamLeaders($conn) {

        $stmt = $conn->prepare("SELECT id, nom, prenom FROM team_lead ");
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $options .= "<option value='{$row['id']}'>{$row['prenom']} {$row['nom']}</option>";
        }
    
        return $options;
    }

    public static function getTeamLeaderName($conn, $teamleader_id) {
        $stmt = $conn->prepare("SELECT nom, prenom,id FROM team_lead WHERE id = ?");
        $stmt->execute([$teamleader_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['prenom'] . ' ' . $row['nom'] : '';
    }
}

// Retrieve all employees from the database
$employers = Employe::getAllEmployees($con);


?>