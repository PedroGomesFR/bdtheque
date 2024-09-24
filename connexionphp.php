<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=bdtheque","root","");

if (isset($_POST["connexion"])) {
    if (!empty($_POST["email"]) AND !empty($_POST["password"])) {
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);


        $recupUser = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $recupUser->execute(array($email));
        
        if ($recupUser->rowCount() > 0) {
            $user = $recupUser->fetch();
            if (password_verify($_POST["password"], $user['MotDePasse'])) {
                // Password is correct, proceed with the login
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $user['MotDePasse']; // Note: storing hashed password in session is generally not recommended
                $_SESSION['UserID'] = $user['UserID'];
                $_SESSION['is_admin'] = $user['is_admin'];
                header('location: index.php');
            } else {
                echo "Votre mot de passe ou pseudo est incorrect";
                }
            } else {
                    echo "Votre mot de passe ou pseudo est incorrect";
        }
        
    }
}
