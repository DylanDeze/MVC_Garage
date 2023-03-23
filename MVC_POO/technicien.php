<h2>Gestion des techniciens </h2>

 


<?php 
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')
    {
        $leTechnicien = null;
        if (isset($_GET['action']) && isset($_GET['idtechnicien']))
        {
            $action = $_GET['action'];
            $idtechnicien = $_GET['idtechnicien'];
            switch($action){
                case "edit" : $leTechnicien = $unControleur->selectWhereTechnicien($idtechnicien); 
                // var_dump($leTechnicien);
                break;
                case "sup" : $unControleur->deleteTechnicien ($idtechnicien); break;
            }
        }
        require_once("vue/vue_insert_technicien.php");

        if(isset($_POST['Valider']))
        {
            $unControleur->insertTechnicien($_POST);
        }
        if(isset($_POST['Modifier']))
        {
            $unControleur->updateTechnicien($_POST);
            header("Location: index.php?page=2");
        }
    }
    if(isset($_POST['Filtrer'])) {
        $mot = $_POST['mot'];
        $lesTechniciens = $unControleur->selectLikeTechniciens($mot);
    } else {
        $lesTechniciens = $unControleur->selectAllTechniciens();
    }
    require_once("vue/vue_les_techniciens.php");
?>