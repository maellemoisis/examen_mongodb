<?php
require('../functions.php');

init('Supprimer un avis');

if (!isset($_POST['note']) OR $_POST['note'] == NULL) {
	error('add.php', 'Veuillez spécifier une note');
	die();
}

if (!isset($_POST['avis']) OR $_POST['avis'] == NULL) {
	error('add.php', 'Veuillez spécifier un avis');
	die();
}

if (!isset($_POST['auteur']) OR $_POST['auteur'] == NULL) {
	error('add.php', 'Veuillez spécifier un auteur');
	die();
}

if (!isset($_POST['date']) OR $_POST['date'] == NULL) {
	error('add.php', 'Veuillez spécifier une date');
	die();
}

$iAvis = array(
	'Note' => $_POST['note'],
	'Avis' => $_POST['avis'],
	'Auteur' => $_POST['auteur'],
	'Date' => $_POST['date'],
);

$row = new MongoDB\Driver\BulkWrite();
$row->update(
	['_id'=> new MongoDB\BSON\ObjectID($_POST['id'])],
	['$set' => $iAvis]
);
$conn->executeBulkWrite('nalmapi.reviews', $row);

success('list.php', 'Avis modifié !');

require('../file_end.php');
