<?php
require('../functions.php');

init('Éditer un avis', 'reviews');

if (!isset($_GET['id']) OR $_GET['id'] == NULL) {
	error('list.php', 'Erreur');
}

$query = new MongoDB\Driver\Query(['_id'=> new MongoDB\BSON\ObjectID($_GET['id'])],[]);
$result = $conn->executeQuery('nalmapi.reviews', $query);
if(!$result){
	error('list.php', 'Avis inconnu');
}

$rs = $result->toArray()[0];

echo '
    <div>
        <h1>Éditer l\'avis</h1>
        <form method="post" action="traitement_edit.php">
            <label>
                Note
            </label>
            <input type="number" name="note" max="5" min="1" value="'.$rs->Note.'"/> /5 <br />
            <label>
                Avis
            </label>
            <textarea name="avis">'.$rs->Avis.'</textarea> <br />
            <label>
                Auteur
            </label>
            <input type="text" name="auteur" value="'.$rs->Auteur.'"/> <br />
            <label>
                Date
            </label>
            <input type="date" name="date" value="'.$rs->Date.'"/> <br />

            <br />

            <input type="hidden" name="id" value="'.$_GET['id'].'" />

            <input type="submit" value="Enregistrer" />

        </form>

    </div>';

require('../file_end.php');
