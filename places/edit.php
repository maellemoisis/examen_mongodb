<?php
require('../functions.php');

init('Éditer un établissement', 'etablissements');

if (!isset($_GET['id']) or $_GET['id'] == NULL) {
    error('list.php', 'Erreur');
}

$query = new MongoDB\Driver\Query(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])], []);
$result = $conn->executeQuery('nalmapi.etablissements', $query);
if (!$result) {
    error('list.php', 'Etablissement inconnu');
}

$rs = $result->toArray()[0];

echo '
    <div>
        <h1>Éditer l\'établissement</h1>
        <form method="post" action="traitement_edit.php">
            <label>
                Nom
            </label>
            <input type="text" name="name" value="'.$rs->Nom.'"/> <br/>
            <label>
                Adresse
            </label>
            <input type="text" name="adresse" value="'.$rs->Adresse.'"/> <br/>
            <label>
                Ville
            </label>
            <input type="text" name="ville" value="'.$rs->Ville.'"/> <br/>
            <label>
                Pays
            </label>
            <input type="text" name="pays" value="'.$rs->Pays.'"/> <br/>
            <label>
                Téléphone
            </label>
            <input type="tel" name="telephone" value="'.$rs->Telephone.'"/> <br/>
    
            <br/>
    
            <input type="hidden" name="id" value="'.$_GET['id'].'"/>
    
            <input type="submit" value="Enregistrer" />
    
        </form>
    </div>';

require('../file_end.php');
