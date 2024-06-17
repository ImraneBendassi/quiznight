<?php
// Autoload or include your class files
include_once 'db.php'; // Adjusted path to match the directory structure
include_once 'src/controllers/Quiz.php';
include_once 'src/controllers/Question.php';
include_once 'src/controllers/Answer.php';

// Create a database connection
$database = new Database();
$db = $database->getConnection();

// Example usage of the classes
$quiz = new Quiz($db);
$question = new Question($db);
$answer = new Answer($db);

// Your logic here
// For example, creating a new quiz
$quiz->title = "Sample Quiz";
$quiz->description = "This is a sample quiz description.";
if ($quiz->create()) {
    echo "Quiz was created.";
} else {
    echo "Unable to create quiz.";
}

// Fetching quizzes
$stmt = $quiz->read();
$num = $stmt->rowCount();
if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "Quiz ID: $id, Title: $title, Description: $description, Created At: $created_at\n";
    }
}
?>
