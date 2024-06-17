<?php
// Inclure db.php pour établir la connexion PDO
require_once 'db.php';

class Quiz {
    private $conn;
    private $table_name = "quizzes";

    public $id;
    public $title;
    public $description;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Méthode pour créer un nouveau quiz
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET title=:title, description=:description";
        $stmt = $this->conn->prepare($query);

        // Nettoyer et attribuer les valeurs des propriétés
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->description = htmlspecialchars(strip_tags($this->description));

        // Liage des paramètres
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);

        // Exécuter la requête et retourner le résultat
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Méthode pour lire les quizzes
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
