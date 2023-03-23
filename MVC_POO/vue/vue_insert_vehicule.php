<h3>Ajout d'un véhicule</h3>
<form method="post">
    <table>
        <tr>
            <td>Modèle</td>
            <td><input type="text" name="modele"
            value="<?= ($leVehicule != null) ? $leVehicule['modele']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Marque</td>
            <td><input type="text" name="marque"
            value="<?= ($leVehicule != null) ? $leVehicule['marque']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Plaque d'immatriculation</td>
            <td><input type="text" name="plaque"
            value="<?= ($leVehicule != null) ? $leVehicule['plaque']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Nombre de kilomètre</td>
            <td><input type="text" name="nbkm"
            value="<?= ($leVehicule != null) ? $leVehicule['nbkm']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Couleur</td>
            <td><input type="text" name="couleur"
            value="<?= ($leVehicule != null) ? $leVehicule['couleur']: ''?>"
            ></td>
        </tr>
        <tr>
        <td>Client</td>
            <td>
                <select name="idclient">
                    <?php 
                    foreach ($lesClients as $unClient) {
                        if ($leVehicule != null) {
                            if ($leVehicule['idclient'] == $unClient['idclient']){
                                echo "<option value='".$unClient['idclient']."'selected>";
                            } else {
                                echo "<option value='".$unClient['idclient']."'>";
                            }
                        } else {
                            echo "<option value='".$unClient['idclient']."'>";
                        }
                        echo $unClient['nom'];
                        echo " - ";
                        echo $unClient['prenom'];   
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
        <td><input type="reset" name="Annuler" value="Annuler"></td>
        <td><input type="submit" 
        <?= ($leVehicule != null) ? 'name="Modifier" value="Modifier"' : 
                        'name="Valider" value="Valider"' ?>></td>
        </tr>
        <?= ($leVehicule != null) ? '<input type="hidden" name="idvehicule" value="'.$leVehicule['idvehicule'].'">' : '' ?>
    </table>
</form>