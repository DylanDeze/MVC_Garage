<?php 
 // contrôle des données avant injection ou après extraction
 require_once ("modele/modele.class.php");

 class Controleur {
     private $unModele ; // instance de la classe Modele

     public function __construct($serveur, $bdd, $user, $mdp){
         // Instanciation de la classe Modele
         $this->unModele = new Modele ($serveur, $bdd, $user, $mdp); 
     }
 /**************************************** LES CLIENTS ******************************************/
     public function selectAllClients ()
     {
         // Récupération des clients 
         $lesClients = $this->unModele->selectAllClients();
         // Je réalise des traitements : contrôle des données 

         // Je retourne mes résultats
         return $lesClients;
     }
     public function insertClient($tab)
     {
         // Je contrôle les données avant insertion

         // Insertion des données via le modèle
         $this->unModele->insertClient($tab);
     }
     public function selectLikeClients($mot)
        {
        $lesClients = $this->unModele->selectLikeClients($mot);
        return $lesClients;
        }
    public function deleteClient($idclient)
        {
            $this->unModele->deleteClient($idclient);
        }
    public function selectWhereClient($idclient)
        {
            return $this->unModele->selectWhereClient($idclient);
        }
    public function updateClient($tab)
        {
            $this->unModele->updateClient($tab);
        }
    /**************************************** LES TECHNICIENS ******************************************/
    public function selectAllTechniciens ()
    {
        // Récupération des techniciens 
        $lesTechniciens = $this->unModele->selectAllTechniciens();
        // Je réalise des traitements : contrôle des données 

        // Je retourne mes résultats
        return $lesTechniciens;
    }
    public function insertTechnicien($tab)
    {
        // Je contrôle les données avant insertion

        // Insertion des données via le modèle
        $this->unModele->insertTechnicien($tab);
    }
    public function selectLikeTechniciens($mot)
        {
        $lesTechniciens = $this->unModele->selectLikeTechniciens($mot);
        return $lesTechniciens;
        }
    public function deleteTechnicien($idtechnicien)
        {
            $this->unModele->deleteTechnicien($idtechnicien);
        }
    public function selectWhereTechnicien($idtechnicien)
        {
            return $this->unModele->selectWhereTechnicien($idtechnicien);
        }
    public function updateTechnicien($tab)
        {
            $this->unModele->updateTechnicien($tab);
        }
    /**************************************** LES VEHICULES ******************************************/
    public function selectAllVehicules ()
    {
        // Récupération des vehicules 
        $lesVehicules = $this->unModele->selectAllVehicules();
        // Je réalise des traitements : contrôle des données 

        // Je retourne mes résultats
        return $lesVehicules;
    }
    public function insertVehicule($tab)
    {
        // Je contrôle les données avant insertion

        // Insertion des données via le modèle
        $this->unModele->insertVehicule($tab);
    }
    public function selectLikeVehicules($mot)
        {
        $lesVehicules = $this->unModele->selectLikeVehicules($mot);
        return $lesVehicules;
        }
    public function deleteVehicule($idvehicule)
        {
            $this->unModele->deleteVehicule($idvehicule);
        }
    public function selectWhereVehicule($idvehicule)
        {
            return $this->unModele->selectWhereVehicule($idvehicule);
        }
    public function updateVehicule($tab)
        {
            $this->unModele->updateVehicule($tab);
        }
    /**************************************** LES INTERVENTIONS ******************************************/
    public function selectAllInterventions ()
    {
        // Récupération des interventions 
        $lesInterventions = $this->unModele->selectAllInterventions();
        // Je réalise des traitements : contrôle des données 

        // Je retourne mes résultats
        return $lesInterventions;
    }
    public function insertIntervention($tab)
    {
        // Je contrôle les données avant insertion

        // Insertion des données via le modèle
        $this->unModele->insertIntervention($tab);
    }
    public function selectLikeInterventions($mot)
        {
        $lesInterventions = $this->unModele->selectLikeInterventions($mot);
        return $lesInterventions;
        }
    public function deleteIntervention($idintervention)
        {
            $this->unModele->deleteIntervention($idintervention);
        }
    public function selectWhereIntervention($idintervention)
        {
            return $this->unModele->selectWhereIntervention($idintervention);
        }
    public function updateIntervention($tab)
        {
            $this->unModele->updateIntervention($tab);
        }

    /*************************************** USER  ***********************************************/
    public function verifConnexion ($email, $mdp)
    {
        return $this->unModele->verifConnexion($email, $mdp);
    }
    
    }
?>
