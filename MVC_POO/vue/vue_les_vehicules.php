<h3>Liste des véhicules</h3>
<br>
<form method="post">
    Filtrer par :
    <input type="text" name="mot">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<br>
<table border="1">
    <tr>
        <td>ID Véhicule</td>
        <td>Modèle</td>
        <td>Marque</td>
        <td>Plaque d'immatriculation</td>
        <td>Nombre de kilomètre</td>
        <td>Couleur</td>
        <td>ID Client</td>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        echo " <td>Opérations</td> ";
    } 
    ?>
    </tr>
<?php
foreach ($lesVehicules as $unVehicule) {
    echo"<tr>";
    echo"<td>".$unVehicule['idvehicule']."</td>";
    echo"<td>".$unVehicule['modele']."</td>";
    echo"<td>".$unVehicule['marque']."</td>";
    echo"<td>".$unVehicule['plaque']."</td>";
    echo"<td>".$unVehicule['nbkm']."</td>";
    echo"<td>".$unVehicule['couleur']."</td>";
    echo"<td>".$unVehicule['idclient']."</td>";
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        echo"<td>
        <a href='index.php?page=3&action=sup&idvehicule=".$unVehicule['idvehicule']."'>
        <img src='images/sup.png' height='20' width='20'> </a>
    
        <a href='index.php?page=3&action=edit&idvehicule=".$unVehicule['idvehicule']."'>
        <img src='images/edit.png' height='20' width='20'> </a>
        </td>";
        }
    echo"</tr>";
}
?>
</table>