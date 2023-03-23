<h2>Gestion des interventions </h2>

<?php
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        $lesTechniciens = $unControleur->selectAllTechniciens();
        $lesVehicules = $unControleur->selectAllVehicules();
        $lIntervention = null;
        if (isset($_GET['action']) && isset($_GET['idintervention']))
        {
            $action = $_GET['action'];
            $idintervention = $_GET['idintervention'];
            switch($action){
                case "edit" : $lIntervention = $unControleur->selectWhereIntervention($idintervention); 
                // var_dump($lIntervention);
                break;
                case "sup" : $unControleur->deleteIntervention ($idintervention); break;
            }
        }
        require_once("vue/vue_insert_intervention.php");

        if(isset($_POST['Valider']))
        {
            $unControleur->insertIntervention($_POST);
        }
        if(isset($_POST['Modifier']))
        {
            $unControleur->updateIntervention($_POST);
            header("Location: index.php?page=4");
        }
    }
    
    if(isset($_POST['Filtrer'])) {
        $mot = $_POST['mot'];
        $lesInterventions = $unControleur->selectLikeInterventions($mot);
    } else {
        $lesInterventions = $unControleur->selectAllInterventions();
    }
    require_once("vue/vue_les_interventions.php");
?>