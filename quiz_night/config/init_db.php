<?php
// config/init_db.php

require 'config.php';

try {
    $sql = "
    CREATE TABLE IF NOT EXISTS quizzes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE IF NOT EXISTS questions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        quiz_id INT,
        question_text TEXT,
        FOREIGN KEY (quiz_id) REFERENCES quizzes(id) ON DELETE CASCADE
    );

    CREATE TABLE IF NOT EXISTS answers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        question_id INT,
        answer_text TEXT,
        is_correct TINYINT(1) DEFAULT 0,
        FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
    );
    ";

    $pdo->exec($sql);
    echo "Tables created successfully.";
} catch (PDOException $e) {
    die("ERROR: Could not execute $sql. " . $e->getMessage());
}
?>
