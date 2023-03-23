<h3>Ajout d'une intervention</h3>
<form method="post">
    <table>
        <tr>
            <td>Libellé</td>
            <td><input type="text" name="libelle"
            value="<?= ($lIntervention != null) ? $lIntervention['libelle']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="date" name="dateintervention"
            value="<?= ($lIntervention != null) ? $lIntervention['dateintervention']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Lieu</td>
            <td><input type="text" name="lieu"
            value="<?= ($lIntervention != null) ? $lIntervention['lieu']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Prix</td>
            <td><input type="text" name="prix"
            value="<?= ($lIntervention != null) ? $lIntervention['prix']: ''?>"
            ></td>
        </tr>
        <tr>
        <td>Technicien</td>
            <td>
                <select name="idtechnicien">
                    <?php 
                    foreach ($lesTechniciens as $unTechnicien) {
                        if ($lIntervention != null) {
                            if ($lIntervention['idtechnicien'] == $unTechnicien['idtechnicien']){
                                echo "<option value='".$unTechnicien['idtechnicien']."'selected>";
                            } else {
                                echo "<option value='".$unTechnicien['idtechnicien']."'>";
                            }
                            } else {
                                echo "<option value='".$unTechnicien['idtechnicien']."'>";
                            }
                            echo $unTechnicien['nom'];
                            echo " - ";
                            echo $unTechnicien['prenom'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
        <td>Véhicule</td>
            <td>
                <select name="idvehicule">
                    <?php 
                    foreach ($lesVehicules as $unVehicule) {
                        if ($lIntervention != null) {
                            if ($lIntervention['idvehicule'] == $unVehicule['idvehicule']){
                                echo "<option value='".$unVehicule['idvehicule']."'selected>";
                            } else {
                                echo "<option value='".$unVehicule['idvehicule']."'>";
                            }
                            } else {
                                echo "<option value='".$unVehicule['idvehicule']."'>";
                            }
                            echo $unVehicule['modele'];
                            echo " - ";
                            echo $unVehicule['marque'];
                            echo " - ";
                            echo $unVehicule['plaque'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
        <td><input type="reset" name="Annuler" value="Annuler"></td>
        <td><input type="submit" <?= ($lIntervention != null) ? 'name="Modifier" value="Modifier"' : 
                        'name="Valider" value="Valider"' ?>></td>
        </tr>
        <?= ($lIntervention != null) ? '<input type="hidden" name="idintervention" value="'.$lIntervention['idintervention'].'">' : '' ?>
    </table>
</form>