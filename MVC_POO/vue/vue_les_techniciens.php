<h3>Liste des techniciens</h3>
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
        <td>ID Technicien</td>
        <td>Nom du technicien</td>
        <td>Prénom du technicien</td>
        <td>Qualification</td>
        <td>Mail technicien</td>
        <td>Mot de passe</td>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        echo "<td>Opérations</td>";
        }
        ?>
    </tr>
<?php
foreach ($lesTechniciens as $unTechnicien) {
    echo"<tr>";
    echo"<td>".$unTechnicien['idtechnicien']."</td>";
    echo"<td>".$unTechnicien['nom']."</td>";
    echo"<td>".$unTechnicien['prenom']."</td>";
    echo"<td>".$unTechnicien['qualification']."</td>";
    echo"<td>".$unTechnicien['email']."</td>";
    echo"<td>".$unTechnicien['mdp']."</td>";
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        echo"<td>
        <a href='index.php?page=2&action=sup&idtechnicien=".$unTechnicien['idtechnicien']."'>
        <img src='images/sup.png' height='20' width='20'> </a>
    
        <a href='index.php?page=2&action=edit&idtechnicien=".$unTechnicien['idtechnicien']."'>
        <img src='images/edit.png' height='20' width='20'> </a>
        </td>";
        }
    echo"</tr>";
}
?>
</table>