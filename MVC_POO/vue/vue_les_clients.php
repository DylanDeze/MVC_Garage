<link rel="stylesheet" href="css/vue_style.css">
<h3>Liste des clients</h3>
<br>
<form method="post">
    Filtrer par :
    <input type="text" name="mot">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<br>
<div class="table">
<table border="1">
    <tr>
        <td>ID Client</td>
        <td>Nom du client</td>
        <td>Prénom du client</td>
        <td>Adresse</td>
        <td>Mail client</td>
        <td>Mot de passe</td>
    <?php
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        echo "<td>Opérations</td>";
    }
    ?>
    </tr>
</div>
<?php
foreach ($lesClients as $unClient) {
    echo"<tr>";
    echo"<td>".$unClient['idclient']."</td>";
    echo"<td>".$unClient['nom']."</td>";
    echo"<td>".$unClient['prenom']."</td>";
    echo"<td>".$unClient['adresse']."</td>";
    echo"<td>".$unClient['email']."</td>";
    echo"<td>".$unClient['mdp']."</td>";
    
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { 
    echo "<td>
    <a href='index.php?page=1&action=sup&idclient=".$unClient['idclient']."'>
    <img src='images/sup.png' height='20' width='20'></a>

    <a href='index.php?page=1&action=edit&idclient=".$unClient['idclient']."'>
    <img src='images/edit.png' height='20' width='20'></a>
    </td>";
    }
    echo"</tr>";
}
?>
</table>