<?php
require('../file_start.php');
require('../connect.php');

if (!isset($_GET['id']) OR $_GET['id'] == NULL) {
	error('list.php', 'Erreur');
}

echo $_GET['id'];

$bulk = new MongoDB\Driver\BulkWrite;
$bulk->delete(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

$result = $conn->executeBulkWrite('nalmapi.reviews', $bulk);


success('list.php', 'Avis supprimé !');

require('../file_end.php');
