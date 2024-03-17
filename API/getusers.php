<?php

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bgsb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Préparer la requête SQL
$sql = "SELECT * FROM users";

// Exécuter la requête SQL
$result = $conn->query($sql);

// Vérifier les erreurs
if (!$result) {
    die("Erreur lors de l'exécution de la requête : " . $conn->error);
}

// Créer un tableau PHP pour stocker les utilisateurs
$usersArray = array();

// Parcourir les résultats de la requête
while ($row = mysqli_fetch_assoc($result)) {
    $usersArray[] = $row;
}

// Fermer la connexion à la base de données
$conn->close();

// Encoder le tableau en JSON et le renvoyer
header('Content-Type: application/json');
echo json_encode($usersArray);
?>
