<?php
// Inclure db.php pour établir la connexion PDO
require_once 'db.php';

class Question {
    private $conn;
    private $table_name = "questions";

    public $id;
    public $quiz_id;
    public $question_text;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET quiz_id=:quiz_id, question_text=:question_text";
        $stmt = $this->conn->prepare($query);

        // Nettoyer et attribuer les valeurs des propriétés
        $this->quiz_id = htmlspecialchars(strip_tags($this->quiz_id));
        $this->question_text = htmlspecialchars(strip_tags($this->question_text));

        // Liage des paramètres
        $stmt->bindParam(":quiz_id", $this->quiz_id);
        $stmt->bindParam(":question_text", $this->question_text);

        // Exécuter la requête et retourner le résultat
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
