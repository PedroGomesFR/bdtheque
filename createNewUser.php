<?php
include("connexionbase.php");

if (isset($_POST["inscription"])) {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Utiliser une requête préparée pour prévenir les injections SQL
    $preparer = $conn->prepare("INSERT INTO utilisateurs(nom, prenom, email, MotDePasse) VALUES (?, ?, ?, ?)");
    $preparer->bind_param("ssss", $nom, $prenom, $email, $hashedPassword);
    if ($preparer->execute()) {
        header("location: formconnexion.php");
       
    } else {
        echo "Erreur lors de l'inscription";
    }
    
    $preparer->close();
}
?>

