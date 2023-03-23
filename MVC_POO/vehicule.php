<h2>Gestion des véhicules </h2>

   

<?php
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        $lesClients = $unControleur->selectAllClients();
        $leVehicule = null;
        if (isset($_GET['action']) && isset($_GET['idvehicule']))
        {
            $action = $_GET['action'];
            $idvehicule = $_GET['idvehicule'];
            switch($action){
                case "edit" : $leVehicule = $unControleur->selectWhereVehicule($idvehicule); 
                // var_dump($leVehicule);
                break;
                case "sup" : $unControleur->deleteVehicule ($idvehicule); break;
            }
        }
        require_once("vue/vue_insert_vehicule.php");

        if(isset($_POST['Valider']))
        {
            $unControleur->insertVehicule($_POST);
        }
        if(isset($_POST['Modifier']))
        {
            $unControleur->updateVehicule($_POST);
            header("Location: index.php?page=3");
        }
    }
    
    if(isset($_POST['Filtrer'])) {
        $mot = $_POST['mot'];
        $lesVehicules = $unControleur->selectLikeVehicules($mot);
    } else {
        $lesVehicules = $unControleur->selectAllVehicules();
    }
    require_once("vue/vue_les_vehicules.php");
?>