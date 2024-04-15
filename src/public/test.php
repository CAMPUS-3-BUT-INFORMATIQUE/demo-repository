<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion PDO</title>
</head>
<body>
<h2>Formulaire de Connexion PDO à une base de données MariaDB</h2>
<form action="" method="post">
    <label for="host">Hôte :</label><br>
    <input type="text" id="host" name="host" required value="<?= $_POST['host'] ?? '' ?>"><br>

    <label for="port">Port :</label><br>
    <input type="text" id="port" name="port" required value="<?= $_POST['port'] ?? '' ?>"><br>

    <label for="username">Nom d'utilisateur :</label><br>
    <input type="text" id="username" name="username" required value="<?= $_POST['username'] ?? '' ?>"><br>

    <label for="password">Mot de passe :</label><br>
    <input type="text" id="password" name="password" required value="<?= $_POST['password'] ?? '' ?>"><br>

    <label for="dbname">Nom de la base de données :</label><br>
    <input type="text" id="dbname" name="dbname" required value="<?= $_POST['dbname'] ?? '' ?>"><br>

    <input type="submit" value="Se Connecter">
</form>
</body>
</html>

<?php
if (!empty($_POST)) {
    // Récupération des données du formulaire
    $host = $_POST['host'];
    $port = $_POST['port'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dbname = $_POST['dbname'];

    var_dump("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);

    try {
        // Connexion à la base de données avec PDO
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);

        // Configuration de PDO pour afficher les erreurs
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Si la connexion réussit, affichage d'un message de succès
        echo "Connexion à la base de données réussie !";
    } catch (PDOException $e) {
        // En cas d'échec de la connexion, affichage de l'erreur
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
