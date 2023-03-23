<h3>Ajout d'un client</h3>
<form method="post">
    <table>
        <tr>
            <td>Nom</td>
            <td><input type="text" name="nom"
            value="<?= ($leClient != null) ? $leClient['nom']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Prénom</td>
            <td><input type="text" name="prenom"
            value="<?= ($leClient != null) ? $leClient['prenom']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Adresse</td>
            <td><input type="text" name="adresse"
            value="<?= ($leClient != null) ? $leClient['adresse']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email"
            value="<?= ($leClient != null) ? $leClient['email']: ''?>"
            ></td>
        </tr>
         <tr>
            <td>Mdp</td>
            <td><input type="text" name="mdp"
            value="<?= ($leClient != null) ? $leClient['mdp']: ''?>"
            ></td>
        </tr>
        <tr>
        <td><input type="reset" name="Annuler" value="Annuler"></td>
        <td><input type="submit" 
        <?= ($leClient != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>
        ></td>
        </tr>
        <?= ($leClient != null) ? '<input type=hidden name=idclient value="'.$leClient['idclient'].'">' : ''?>
    </table>
</form>