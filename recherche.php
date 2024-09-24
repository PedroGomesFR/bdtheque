<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdtheque";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

include("templates/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['monBouton'])) {
        $valeurBouton = $conn->real_escape_string($_POST['monBouton']);

        $sql = "SELECT * FROM bandesdessinees WHERE Auteur LIKE '%$valeurBouton%' OR Titre LIKE '%$valeurBouton%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Titre: " . $row["Titre"] . " - Auteur: " . $row["Auteur"] . " - Genre: " . $row["Genre"] . "<br>";
                // Afficher l'image
                echo "<img src='" . $row["image"] . "' alt='Image de la bande dessinée'><br>";
            }
        } else {
            echo "0 résultats";
        }
    } else {
        echo "Le bouton n'a pas été cliqué.";
    }
} else {
    echo "Le formulaire n'a pas été soumis.";
}

// Fermer la connexion
$conn->close();
?>
