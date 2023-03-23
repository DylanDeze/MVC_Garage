<h3>Ajout d'un technicien</h3>
<form method="post">
    <table>
        <tr>
            <td>Nom</td>
            <td><input type="text" name="nom"
            value="<?= ($leTechnicien != null) ? $leTechnicien['nom']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Prénom</td>
            <td><input type="text" name="prenom"
            value="<?= ($leTechnicien != null) ? $leTechnicien['prenom']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Qualification</td>
            <td><input type="text" name="qualification"
            value="<?= ($leTechnicien != null) ? $leTechnicien['qualification']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Mail</td>
            <td><input type="email" name="email"
            value="<?= ($leTechnicien != null) ? $leTechnicien['email']: ''?>"
            ></td>
        </tr>
        <tr>
            <td>Mot de passe</td>
            <td><input type="text" name="mdp"
            value="<?= ($leTechnicien != null) ? $leTechnicien['mdp']: ''?>"
            ></td>
        </tr>
        <tr>
        <td><input type="reset" name="Annuler" value="Annuler"></td>
        <td><input type="submit"
        <?= ($leTechnicien != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>
        ></td>
    </tr>
    <?= ($leTechnicien != null) ? '<input type=hidden name=idtechnicien value="'.$leTechnicien['idtechnicien'].'">' : ''?>
    </table>
</form>