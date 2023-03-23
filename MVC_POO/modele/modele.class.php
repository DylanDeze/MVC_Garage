<?php
// exécuter des requêtes d'extraction et d'injection de données
    class  Modele {
        private $unPDO ; // instance de la classe PDO: PHP Data Object
        
        public function __construct($serveur, $bdd, $user, $mdp){
            $this->unPDO = null;
            try{
                $url = "mysql:host=".$serveur.";dbname=".$bdd;
                //instanciation de la classe PDO
                $this->unPDO = new PDO($url, $user, $mdp);
            }
            catch(PDOException $exp){
                echo "<br> Erreur de connexion à la BDD !";
                echo $exp->getMessage();
            }
        }
        /************************************ LES CLIENTS  ***********************************/
        public function selectAllClients ()
        {
            if ($this->unPDO != null){
                $requete ="select * from client;";
                // préparation de la requête
                $select = $this->unPDO->prepare($requete);
                // exécution de la requête 
                $select->execute();
                // extraction des données classes 
                $lesClients = $select->fetchAll();
                return $lesClients;
            } else {
                return null;
            }
        }
        public function insertClient($tab)
        {
            if($this->unPDO != null) {
                $requete = "insert into client values (null, :nom, :prenom, :adresse, :email, :mdp);";
                $donnees = array(":nom"=>$tab['nom'],
                                 ":prenom"=>$tab['prenom'],
                                 ":adresse"=>$tab['adresse'],
                                 ":email"=>$tab['email'],
                                 ":mdp"=>$tab['mdp']);
                $insert = $this->unPDO->prepare($requete);
                $insert->execute($donnees);
            }
        }
        public function selectLikeClients ($mot)
        {
            if ($this->unPDO != null){
                $requete ="select * from client where nom like :mot or prenom like :mot or adresse like :mot or email like :mot;";
                $donnees = array (":mot"=>"%".$mot."%");

                // préparation de la requête
                $select = $this->unPDO->prepare($requete);
                // exécution de la requête 
                $select->execute($donnees);
                // extraction des données clients 
                $lesClients = $select->fetchAll();
                return $lesClients;
            } else {
                return null;
            }
        }
        public function deleteClient ($idclient)
        {
            if ($this->unPDO != null){
                $requete ="delete from client where idclient = :idclient;";
                $donnees = array (":idclient"=>$idclient);
                $delete = $this->unPDO->prepare($requete);
                $delete->execute($donnees);
            }
        }
        public function selectWhereClient ($idclient)
        {
            if ($this->unPDO != null){
                $requete ="select * from client where idclient = :idclient;";
                $donnees = array (":idclient"=>$idclient);
                $select = $this->unPDO->prepare($requete);
                $select->execute($donnees);
                $unClient = $select->fetch(); // un seul résultat
                return $unClient;
            }
        }
        public function updateClient($tab)
        {
            if($this->unPDO != null) {
                $requete = "update client set nom= :nom, prenom= :prenom, adresse= :adresse, email= :email, mdp= :mdp where idclient= :idclient;";

                $donnees = array(":nom"=>$tab['nom'],
                                 ":prenom"=>$tab['prenom'],
                                 ":adresse"=>$tab['adresse'],
                                 ":email"=>$tab['email'],
                                 ":mdp"=>$tab['mdp'],
                                 ":idclient"=>$tab['idclient']);
                $update = $this->unPDO->prepare($requete);
                $update->execute($donnees);
            }
        }
        /************************************ LES TECHNICIENS  ***********************************/
        public function selectAllTechniciens ()
        {
            if ($this->unPDO != null){
                $requete ="select * from technicien;";
                // préparation de la requête
                $select = $this->unPDO->prepare($requete);
                // exécution de la requête 
                $select->execute();
                // extraction des données techniciens 
                $lesTechniciens = $select->fetchAll();
                return $lesTechniciens;
            } else {
                return null;
            }
        }
        public function insertTechnicien($tab)
        {
            if($this->unPDO != null) {
                $requete = "insert into technicien values (null, :nom, :prenom, :qualification, :email, :mdp);";
                $donnees = array(":nom"=>$tab['nom'],
                                 ":prenom"=>$tab['prenom'],
                                 ":qualification"=>$tab['qualification'],
                                 ":email"=>$tab['email'],
                                 ":mdp"=>$tab['mdp']);
                $insert = $this->unPDO->prepare($requete);
                $insert->execute($donnees);
            }
        }
        public function selectLikeTechniciens ($mot)
        {
            if ($this->unPDO != null){
                $requete ="select * from technicien where nom like :mot or prenom like :mot or qualification like :mot or email like :mot;";
                $donnees = array (":mot"=>"%".$mot."%");

                // préparation de la requête
                $select = $this->unPDO->prepare($requete);
                // exécution de la requête 
                $select->execute($donnees);
                // extraction des données techniciens 
                $lesTechniciens = $select->fetchAll();
                return $lesTechniciens;
            } else {
                return null;
            }
        }
        public function deleteTechnicien ($idtechnicien)
        {
            if ($this->unPDO != null){
                $requete ="delete from technicien where idtechnicien = :idtechnicien;";
                $donnees = array (":idtechnicien"=>$idtechnicien);
                $delete = $this->unPDO->prepare($requete);
                $delete->execute($donnees);
            }
        }
        public function selectWhereTechnicien ($idtechnicien)
        {
            if ($this->unPDO != null){
                $requete ="select * from technicien where idtechnicien = :idtechnicien;";
                $donnees = array (":idtechnicien"=>$idtechnicien);
                $select = $this->unPDO->prepare($requete);
                $select->execute($donnees);
                $unTechnicien = $select->fetch(); // un seul résultat
                return $unTechnicien;
            }
        }
        public function updateTechnicien($tab)
        {
            if($this->unPDO != null) {
                $requete = "update technicien set nom= :nom, prenom = :prenom, qualification = :qualification, email = :email, mdp = :mdp where idtechnicien = :idtechnicien;";

                $donnees = array(":nom"=>$tab['nom'],
                                 ":prenom"=>$tab['prenom'],
                                 ":qualification"=>$tab['qualification'],
                                 ":email"=>$tab['email'],
                                 ":mdp"=>$tab['mdp'],
                                 ":idtechnicien"=>$tab['idtechnicien']);
                $update = $this->unPDO->prepare($requete);
                $update->execute($donnees);
            }
        }
        /************************************ LES VÉHICULES  ***********************************/
        public function selectAllVehicules ()
        {
            if ($this->unPDO != null){
                $requete ="select * from vehicule;";
                // préparation de la requête
                $select = $this->unPDO->prepare($requete);
                // exécution de la requête 
                $select->execute();
                // extraction des données vehicules 
                $lesVehicules = $select->fetchAll();
                return $lesVehicules;
            } else {
                return null;
            }
        }
        public function insertVehicule($tab)
        {
            if($this->unPDO != null) {
                $requete = "insert into vehicule values (null, :modele, :marque, :plaque, :nbkm, :couleur, :idclient);";
                $donnees = array(":modele"=>$tab['modele'],
                                 ":marque"=>$tab['marque'],
                                 ":plaque"=>$tab['plaque'],
                                 ":nbkm"=>$tab['nbkm'],
                                 ":couleur"=>$tab['couleur'],
                                 ":idclient"=>$tab['idclient']);
                $insert = $this->unPDO->prepare($requete);
                $insert->execute($donnees);
            }
        }
        public function selectLikeVehicules ($mot)
        {
            if ($this->unPDO != null){
                $requete ="select * from vehicule where modele like :mot or marque like :mot or plaque like :mot or nbkm like :mot or couleur like :mot;";
                $donnees = array (":mot"=>"%".$mot."%");

                // préparation de la requête
                $select = $this->unPDO->prepare($requete);
                // exécution de la requête 
                $select->execute($donnees);
                // extraction des données vehicules 
                $lesVehicules = $select->fetchAll();
                return $lesVehicules;
            } else {
                return null;
            }
        }
        public function deleteVehicule ($idvehicule)
        {
            if ($this->unPDO != null){
                $requete ="delete from vehicule where idvehicule = :idvehicule;";
                $donnees = array (":idvehicule"=>$idvehicule);
                $delete = $this->unPDO->prepare($requete);
                $delete->execute($donnees);
            }
        }
        public function selectWhereVehicule ($idvehicule)
        {
            if ($this->unPDO != null){
                $requete ="select * from vehicule where idvehicule = :idvehicule;";
                $donnees = array (":idvehicule"=>$idvehicule);
                $select = $this->unPDO->prepare($requete);
                $select->execute($donnees);
                $unVehicule = $select->fetch(); // un seul résultat
                return $unVehicule;
            }
        }
        public function updateVehicule($tab)
        {
            if($this->unPDO != null) {
                $requete = "update vehicule set modele= :modele, marque = :marque, plaque = :plaque, nbkm = :nbkm, couleur = :couleur where idvehicule = :idvehicule;";

                $donnees = array(":modele"=>$tab['modele'],
                                 ":marque"=>$tab['marque'],
                                 ":plaque"=>$tab['plaque'],
                                 ":nbkm"=>$tab['nbkm'],
                                 ":couleur"=>$tab['couleur'],
                                 ":idvehicule"=>$tab['idvehicule']);
                $update = $this->unPDO->prepare($requete);
                $update->execute($donnees);
            }
        }
        /************************************ LES INTERVENTIONS  ***********************************/
        public function selectAllInterventions ()
        {
            if ($this->unPDO != null){
                $requete ="select * from intervention;";
                // préparation de la requête
                $select = $this->unPDO->prepare($requete);
                // exécution de la requête 
                $select->execute();
                // extraction des données interventions 
                $lesInterventions = $select->fetchAll();
                return $lesInterventions;
            } else {
                return null;
            }
        }
        public function insertIntervention($tab)
        {
            if($this->unPDO != null) {
                $requete = "insert into intervention values (null, :libelle, :dateintervention, :lieu, :prix, :idtechnicien, :idvehicule);";
                $donnees = array(":libelle"=>$tab['libelle'],
                                 ":dateintervention"=>$tab['dateintervention'],
                                 ":lieu"=>$tab['lieu'],
                                 ":prix"=>$tab['prix'],
                                 ":idtechnicien"=>$tab['idtechnicien'],
                                 ":idvehicule"=>$tab['idvehicule']);
                $insert = $this->unPDO->prepare($requete);
                $insert->execute($donnees);
            }
        }
        public function selectLikeInterventions($mot)
        {
            if ($this->unPDO != null){
                $requete ="select * from intervention where libelle like :mot or dateintervention like :mot or lieu like :mot or prix like :mot;";
                $donnees = array (":mot"=>"%".$mot."%");

                // préparation de la requête
                $select = $this->unPDO->prepare($requete);
                // exécution de la requête 
                $select->execute($donnees);
                // extraction des données interventions 
                $lesInterventions = $select->fetchAll();
                return $lesInterventions;
            } else {
                return null;
            }
        }
        public function deleteIntervention ($idintervention)
        {
            if ($this->unPDO != null){
                $requete ="delete from intervention where idintervention = :idintervention;";
                $donnees = array (":idintervention"=>$idintervention);
                $delete = $this->unPDO->prepare($requete);
                $delete->execute($donnees);
            }
        }
        public function selectWhereIntervention ($idintervention)
        {
            if ($this->unPDO != null){
                $requete ="select * from intervention where idintervention = :idintervention;";
                $donnees = array (":idintervention"=>$idintervention);
                $select = $this->unPDO->prepare($requete);
                $select->execute($donnees);
                $uneIntervention = $select->fetch(); // un seul résultat
                return $uneIntervention;
            }
        }
        public function updateIntervention($tab)
        {
            if($this->unPDO != null) {
                $requete = "update intervention set libelle= :libelle, dateintervention= :dateintervention, lieu= :lieu, prix= :prix, idtechnicien= :idtechnicien, idvehicule= :idvehicule where idintervention= :idintervention;";

                $donnees = array(":libelle"=>$tab['libelle'],
                                 ":dateintervention"=>$tab['dateintervention'],
                                 ":lieu"=>$tab['lieu'],
                                 ":prix"=>$tab['prix'],
                                 ":idtechnicien"=>$tab['idtechnicien'],
                                 ":idvehicule"=>$tab['idvehicule'],
                                 ":idintervention"=>$tab['idintervention']);
                $update = $this->unPDO->prepare($requete);
                $update->execute($donnees);
            }
        }


        /************************************************ USER  ******************************************************/
        public function verifConnexion ($email, $mdp)
        {
            if($this->unPDO != null){
                $requete ="select * from user where email =:email and mdp = :mdp ;";
                $donnees = array(":email"=>$email, ":mdp"=>$mdp);
                $select = $this->unPDO->prepare($requete);
                $select->execute($donnees);
                $unUser = $select->fetch();
                return $unUser;
            } else {
                return null;
            }
        }
    }
?>