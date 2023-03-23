<h3>Liste des interventions</h3>
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
        <td>ID Intervention</td>
        <td>Libellé</td>
        <td>Date intervention</td>
        <td>Lieu</td>
        <td>Prix</td>
        <td>ID Technicien</td>
        <td>ID Véhicule</td>
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        echo "<td>Opérations </td>";
    }
    ?>
    </tr>
<?php
foreach ($lesInterventions as $uneIntervention) {
    echo"<tr>";
    echo"<td>".$uneIntervention['idintervention']."</td>";
    echo"<td>".$uneIntervention['libelle']."</td>";
    echo"<td>".$uneIntervention['dateintervention']."</td>";
    echo"<td>".$uneIntervention['lieu']."</td>";
    echo"<td>".$uneIntervention['prix']."</td>";
    echo"<td>".$uneIntervention['idtechnicien']."</td>";
    echo"<td>".$uneIntervention['idvehicule']."</td>";
    
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        echo"<td>
        <a href='index.php?page=4&action=sup&idintervention=".$uneIntervention['idintervention']."'>
        <img src='images/sup.png' height='20' width='20'> </a>
    
        <a href='index.php?page=4&action=edit&idintervention=".$uneIntervention['idintervention']."'>
        <img src='images/edit.png' height='20' width='20'> </a>
        </td>";
    }
    echo"</tr>";
}
?>
</table>