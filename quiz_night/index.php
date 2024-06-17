<?php
// Inclure db.php pour établir la connexion PDO
require_once 'db.php';

// Autres inclusions de vos classes
require_once 'src/controllers/Quiz.php';
require_once 'src/controllers/Question.php';
require_once 'src/controllers/Answer.php';

// Créer une instance de la classe Database et obtenir la connexion PDO
$database = new Database();
$db = $database->getConnection();

// Exemple d'utilisation des classes Quiz, Question, Answer
$quiz = new Quiz($db);
$question = new Question($db);
$answer = new Answer($db);

// Votre logique ici
// Par exemple, créer un nouveau quiz
$quiz->title = "Quiz exemple";
$quiz->description = "Ceci est une description de quiz exemple.";
if ($quiz->create()) {
    echo "Le quiz a été créé avec succès.";
} else {
    echo "Impossible de créer le quiz.";
}

// Récupérer les quizzes
$stmt = $quiz->read();
$num = $stmt->rowCount();
if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "ID du quiz : $id, Titre : $title, Description : $description, Créé le : $created_at\n";
    }
}
?>
