<h2>Gestion des clients </h2>
    
<?php 
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')
    {
        $leClient = null;
        if (isset($_GET['action']) && isset($_GET['idclient']))
        {
            $action = $_GET['action'];
            $idclient = $_GET['idclient'];
            switch($action){
                case "edit" : $leClient = $unControleur->selectWhereClient($idclient); 
                // var_dump($laClient);
                break;
                case "sup" : $unControleur->deleteClient ($idclient); break;
            }
        }
        require_once("vue/vue_insert_client.php");

        if(isset($_POST['Valider']))
        {
            $unControleur->insertClient($_POST);
        }
        if(isset($_POST['Modifier']))
        {
            $unControleur->updateClient($_POST);
            header("Location: index.php?page=1");
        }
    }
    if(isset($_POST['Filtrer'])) {
        $mot = $_POST['mot'];
        $lesClients = $unControleur->selectLikeClients($mot);
    } else {
        $lesClients = $unControleur->selectAllClients();
    }
    require_once("vue/vue_les_clients.php");
?>