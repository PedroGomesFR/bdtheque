<?php
$bdd = new PDO("mysql:host=localhost;dbname=bdtheque", "root", "");

// Vérifier si le formulaire a été soumis
if (isset($_POST["ajouter"])) {
    // Vérifier si tous les champs sont remplis
    if (!empty($_POST["titre"]) && !empty($_POST["auteur"]) && !empty($_POST["genre"]) && !empty($_FILES["image"]["name"])) {
        $titre = htmlspecialchars($_POST["titre"]);
        $auteur = htmlspecialchars($_POST["auteur"]);
        $genre = htmlspecialchars($_POST["genre"]);

        // Gestion de l'upload de l'image
        $target_dir = "uploads/";
        
        // Créer le dossier uploads s'il n'existe pas
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;

        // Vérifiez si le fichier est une image réelle
        if (!empty($_FILES["image"]["tmp_name"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "Le fichier n'est pas une image.";
                $uploadOk = 0;
            }
        } else {
            echo "Le fichier image est manquant.";
            $uploadOk = 0;
        }

        // Vérifiez si le fichier existe déjà
        if (file_exists($target_file)) {
            echo "Désolé, le fichier existe déjà.";
            $uploadOk = 0;
        }

        // Vérifiez la taille du fichier
        if ($_FILES["image"]["size"] > 500000000) { // Taille maximale 500KB
            echo "Désolé, votre fichier est trop volumineux.";
            $uploadOk = 0;
        }

        // Autoriser certains formats de fichier
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            $uploadOk = 0;
        }

        // Vérifiez si $uploadOk est défini à 0 par une erreur
        if ($uploadOk == 0) {
            echo "Désolé, votre fichier n'a pas été téléchargé.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Insérer les données dans la base de données
                $ajoutbd = $bdd->prepare('INSERT INTO bandesdessinees (Titre, Auteur, Genre, image) VALUES (:titre, :auteur, :genre, :image)');
                $ajoutbd->execute([
                    'titre' => $titre,
                    'auteur' => $auteur,
                    'genre' => $genre,
                    'image' => $target_file,
                ]);
                echo "La bande dessinée a été ajoutée avec succès.";
            } else {
                echo "Désolé, il y a eu une erreur lors de l'upload de votre fichier.";
            }
        }
    } else {
        echo "Tous les champs doivent être remplis.";
    }
}
?>
