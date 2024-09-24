<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Inscription</title>
</head>

<body>
<div class="bg">
    <div class="container">
        <form action="createNewUser.php" method="POST"> <!-- Ajout de l'attribut method et correction de la balise form -->
            <h2>Inscription</h2>
            <div class="input-con">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required> <!-- Ajout de l'attribut name -->
            </div>
                <div class="input-con">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" required> <!-- Ajout de l'attribut name -->
                </div>
                <div class="input-con">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"  required> <!-- Ajout de l'attribut name -->
                </div>
                <div class="input-con">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required> <!-- Ajout de l'attribut name -->
                </div>
            
            <!-- Ajoutez d'autres champs du formulaire si nécessaire -->

            <button type="submit" name="inscription">S'inscrire</button>

            <div class="connexion">
            vous avez deja un compte ? <a href="formconnexion.php">Connexion</a>
            </div>

        </form>
    </div>
</div>
</body>

</html>