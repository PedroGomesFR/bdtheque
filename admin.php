<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php include("templates/header.php"); ?>

    <h2>Ajout de nouvelle BD</h2>
    <form action="ajoutBD.php" method="POST" enctype="multipart/form-data">
        <div class="bandedessinee">
            <label for="titre" class="titre">Titre</label>
            <input type="text" id="titre" name="titre" required="required">

            <label for="auteur" class="auteur">Auteur</label>
            <input type="text" id="auteur" name="auteur" required="required">

            <label for="genre">Genre</label>
            <input type="text" id="genre" name="genre" required="required">

            <label for="image">Image</label>
            <input type="file" id="image" name="image" required="required">

            <button type="submit" name="ajouter">Ajouter</button>
        </div>
    </form>
</body>
</html>
