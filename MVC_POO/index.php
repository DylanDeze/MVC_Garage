<?php 
session_start();
require_once("controleur/config_bdd.php");
require_once("controleur/controleur.class.php");
// Instancier ma classe Contrôleur
$unControleur = new Controleur($serveur, $bdd, $user, $mdp); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'un garage</title>
    
</head>
<body>
<center>
    <!-- <h1>Gestion d'un garage</h1> -->
    <?php
    if (! isset($_SESSION['email'])) {
        require_once("vue/vue_connexion.php");
    }
        if(isset($_POST['seConnecter']))
        {
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $unUser = $unControleur->verifConnexion($email, $mdp);
            if ($unUser == null) {
                echo "<br> Vérifiez vos identifiants";
            } else {
                $_SESSION['email'] = $unUser['email'];
                $_SESSION['nom'] = $unUser['nom'];
                $_SESSION['prenom'] = $unUser['prenom'];
                $_SESSION['role'] = $unUser['role'];

                header("Location: index.php?page=0");
            }
        }
    if (isset($_SESSION['email']))
    {
    echo '
    <a href="index.php?page=0">
        <img src="images/home.png" height="100" width="100">
    </a>
    <a href="index.php?page=1">
        <img src="images/client.png" height="100" width="100">
    </a>
    <a href="index.php?page=2">
        <img src="images/technicien.png" height="100" width="100">
    </a>
    <a href="index.php?page=3">
        <img src="images/vehicule.png" height="100" width="100">
    </a>
    <a href="index.php?page=4">
        <img src="images/intervention.png" height="100" width="100">
    </a>
    <a href="index.php?page=5">
        <img src="images/deconnexion.png" height="100" width="100">
    </a>
    ';

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 0;
    }
    switch ($page) {
        case 0 : require_once("home.php");break;
        case 1 : require_once("client.php");break;
        case 2 : require_once("technicien.php");break;
        case 3 : require_once("vehicule.php");break;
        case 4 : require_once("intervention.php");break;
        case 5 : 
            session_destroy();
            unset($_SESSION['email']);
            header("Location: index.php?page=0");
            break;
        default : require_once("erreur_404.php"); break;
    }
} // FIN DU IF SESSION
?>
</center>
</body>
</html>
<style>
a {
        text-decoration: none;
    }
</style>