<?php
require('../file_start.php');

require('../connect.php');

if (!isset($_POST['note']) OR $_POST['note'] == NULL) {
	error('add.php', 'Veuillez spécifier une note');
}

if (!isset($_POST['avis']) OR $_POST['avis'] == NULL) {
	error('add.php', 'Veuillez spécifier un avis');
}

if (!isset($_POST['auteur']) OR $_POST['auteur'] == NULL) {
	error('add.php', 'Veuillez spécifier un auteur');
}

if (!isset($_POST['date']) OR $_POST['date'] == NULL) {
	error('add.php', 'Veuillez spécifier une date');
}

$iAvis = array(
	'Note' => $_POST['note'],
	'Avis' => $_POST['avis'],
	'Auteur' => $_POST['auteur'],
	'Date' => $_POST['date'],
);

$row = new MongoDB\Driver\BulkWrite();
$row->insert($iAvis);
$conn->executeBulkWrite('nalmapi.reviews', $row);

success('add.php', 'Avis ajouté !');

require('../file_end.php');
