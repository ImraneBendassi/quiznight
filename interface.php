<?php
session_start(); // Démarrer la session pour gérer l'authentification
// Vérifier si l'utilisateur est connecté en tant qu'administrateur
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php"); // Rediriger vers la page de connexion si non connecté
    exit;
}

// Traitement de la création de quiz
// Exemple basique de formulaire de création de quiz
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer et traiter les données du formulaire
    // Insérer le quiz dans la base de données, par exemple
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Créer un Quiz</h1>
    </header>
    <main>
        <form method="post" action="quiz_creation.php">
            <!-- Formulaire de création de quiz -->
            <!-- Exemples de champs : titre du quiz, questions, réponses -->
            <label for="quiz-title">Titre du Quiz :</label>
            <input type="text" id="quiz-title" name="quiz-title" required>
            
            <!-- Autres champs pour les questions et les réponses -->
            
            <button type="submit">Créer le Quiz</button>
        </form>
    </main>
    <footer>
        <!-- Pied de page -->
    </footer>
</body>
</html>
