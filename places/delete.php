<?php
require('../functions.php');

init('Supprimer un établissement');

if (!isset($_GET['id']) OR $_GET['id'] == NULL) {
	error('list.php', 'Erreur');
}

echo $_GET['id'];

$bulk = new MongoDB\Driver\BulkWrite;
$bulk->delete(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

$result = $conn->executeBulkWrite('nalmapi.etablissements', $bulk);


success('list.php', 'Etablissement supprimé !');

require('../file_end.php');
