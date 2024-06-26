<?php
// Inclure db.php pour établir la connexion PDO
require_once 'db.php';

class Answer {
    private $conn;
    private $table_name = "answers";

    public $id;
    public $question_id;
    public $answer_text;
    public $is_correct;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET question_id=:question_id, answer_text=:answer_text, is_correct=:is_correct";
        $stmt = $this->conn->prepare($query);

        // Nettoyer et attribuer les valeurs des propriétés
        $this->question_id = htmlspecialchars(strip_tags($this->question_id));
        $this->answer_text = htmlspecialchars(strip_tags($this->answer_text));
        $this->is_correct = htmlspecialchars(strip_tags($this->is_correct));

        // Liage des paramètres
        $stmt->bindParam(":question_id", $this->question_id);
        $stmt->bindParam(":answer_text", $this->answer_text);
        $stmt->bindParam(":is_correct", $this->is_correct);

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
