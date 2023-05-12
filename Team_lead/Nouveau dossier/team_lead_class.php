<?php
require 'bd_conn.php';

// Establish a database connection
$con = createDatabaseConnection();

class Team_leader {
    
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $status;
    public $mot_de_pass;
    public $team_id;
    
    public function __construct($id, $nom, $prenom, $email, $status,$mot_de_pass,$team_id) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->status = $status;
        $this->mot_de_pass = $mot_de_pass;
        $this->team_id = $team_id;
    }

    // Function to retrieve all Team_leader from the database
    public static function getAllTeam_leaders($con) {
        $st = $con->prepare("SELECT * FROM team_lead");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to add an Team_leader to the database
    public function addTeam_leader($con) {
      $st = $con->prepare("INSERT INTO team_lead (nom, prenom, email, status, mot_de_pass, team_id) VALUES (?, ?, ?, ?,?,?)");
      $st->execute([$this->nom, $this->prenom, $this->email, $this->status, $this->mot_de_pass, $this->team_id]);
  }
  
    // Function to delete an Team_leader from the database by their ID
    public static function deleteTeam_leader($con, $Team_leaderId) {
        $st = $con->prepare("DELETE FROM team_lead WHERE id = ?");
        $st->execute([$Team_leaderId]);        
    }

    // Function to retrieve One Team_leader from the database
    public static function getOneTeam_leader($con, $Team_leaderId) {
        $st = $con->prepare("SELECT * FROM team_lead where id = ?");
        $st->execute([$Team_leaderId]);
        $team_lead = $st->fetch(PDO::FETCH_ASSOC);
        return $team_lead;
    }

    // Function to update an Team_leader's details in the database
    public function updateTeam_leader($conn) {
        $st = $conn->prepare("UPDATE team_lead SET nom = ?, prenom = ?, email = ?, status = ?, mot_de_pass = ?, team_id = ? WHERE id = ?");
        $st->execute([$this->nom, $this->prenom, $this->email, $this->status,  $this->mot_de_pass, $this->team_id, $this->id]);
    }

    public static function getAvailableTeam($conn) {
         

        $stmt = $conn->prepare("SELECT id, nom FROM team WHERE id NOT IN (SELECT team_id FROM team_lead WHERE team_id IS NOT NULL)");
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $options.= "<option value='{$row['id']}'>{$row['nom']}</option>";
        }
    
        return $options;
    }

    public static function getTeamName($conn, $team_id) {
        $stmt = $conn->prepare("SELECT nom FROM team WHERE id = ?");
        $stmt->execute([$team_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['nom'] : '';
    }
    

}



// Retrieve all Team_leader from the database
$team_leaders = Team_leader::getAllTeam_leaders($con);

?>