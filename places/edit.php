<?php
require('../file_start.php');

require('../connect.php');
nav();

if (!isset($_GET['id']) or $_GET['id'] == NULL) {
    error('list.php', 'Erreur');
}

$query = new MongoDB\Driver\Query(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])], []);
$result = $conn->executeQuery('nalmapi.etablissements', $query);
if (!$result) {
    error('list.php', 'Etablissement inconnu');
}

$rs = $result->toArray()[0];
?>
<div>
    <h1>Editer l'établissement</h1>
    <form method="post" action="traitement_edit.php">
        <label>
            Nom de l'établissement
        </label>
        <input type="text" name="name" value="<?php echo $rs->Nom; ?>"/> <br/>
        <label>
            Adresse
        </label>
        <input type="text" name="adresse" value="<?php echo $rs->Adresse; ?>"/> <br/>
        <label>
            Ville
        </label>
        <input type="text" name="ville" value="<?php echo $rs->Ville; ?>"/> <br/>
        <label>
            Pays
        </label>
        <input type="text" name="pays" value="<?php echo $rs->Pays; ?>"/> <br/>
        <label>
            Téléphone
        </label>
        <input type="text" name="telephone" value="<?php echo $rs->Telephone; ?>"/> <br/>

        <br/>

        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>

        <input type="submit" value="Enregistrer" />

    </form>
</div>
<?php
require('../file_end.php');
?>