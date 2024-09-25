<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <title>BDthéque Diderot</title>
        <link rel="stylesheet" href="index.css"/>
    </head>

    <body>
        <header>
            <div class="flex space-between ">
                <div class="logoprincip">
                    <a href="index.php"><img src="iconos/logo_bdtheque_01.png" width="300" height="100"/></a>
                </div>

                <div class="titre">
                    <h3>BDthèque Diderot</h3>
                </div>

                <div class="logo2">
                    <img src="iconos/bandeau_01.png" width="300" height="100"/>
                </div>
            </div>
            <hr>
            <div class="liens">
                <div class="lien1">
                    <a href="">Catégories</a>
                </div>

                <div class="lien2">
                    <a href="bd.php">BD</a>
                </div>

                <div class="lien3">
                    <a href="">Comix</a>
                </div>
                <div class="lien4">
                    <a href="">Manga</a>
                </div>
                <div class="lien5">
                    <a href="">Roman-Graphique</a>
                </div>

                <?php
      session_start();
      //var_dump($_SESSION); permet de voir(dump) les informations des variables
      if (isset($_SESSION['UserID'])) {
        ?>
                <div class="lien6">
                    <a href="profile.php">Mon Profile</a>
                </div>

                <?php
        if (isset($_SESSION['is_admin'])) {
        ?>
                <div class="lien6">
                    <a href="admin.php">Admin</a>
                </div>
            <?php
                }else{

                }
            ?>

            <?php
      } else {
        ?>
                <div class="lien6">
                    <a href="formconnexion.php">Se Connecter</a>
                </div>
                <?php
      }
      ?>

            </div>
            <div class="lienshaut2">
                <div class="hlien1">
                    <a href="catalogue.php">Catalogue</a>
                </div>


                <form method="POST" action="recherche.php">
                    <input type="text" name="monBouton" placeholder="Saisir votre recherche"/>
                    <input type="submit"  value="Rechercher">
                </form>


            </div>
        </header>