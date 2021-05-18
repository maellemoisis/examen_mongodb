<?php
require('../file_start.php');

require('../connect.php');

if (!isset($_POST['name']) or $_POST['name'] == NULL) {
    error('add.php', 'Veuillez spécifier un nom');
}

if (!isset($_POST['adresse']) or $_POST['adresse'] == NULL) {
    error('add.php', 'Veuillez spécifier une adresse');
}

if (!isset($_POST['ville']) or $_POST['ville'] == NULL) {
    error('add.php', 'Veuillez spécifier une ville');
}

if (!isset($_POST['pays']) or $_POST['pays'] == NULL) {
    error('add.php', 'Veuillez spécifier un pays');
}

if (!isset($_POST['telephone']) or $_POST['telephone'] == NULL) {
    error('add.php', 'Veuillez spécifier un telephone');
}

$iEtablissement = array(
    'Nom' => $_POST['name'],
    'Adresse' => $_POST['adresse'],
    'Ville' => $_POST['ville'],
    'Pays' => $_POST['pays'],
    'Telephone' => $_POST['telephone'],
);

$row = new MongoDB\Driver\BulkWrite();
$row->update(
    ['_id' => new MongoDB\BSON\ObjectID($_POST['id'])],
    ['$set' => $iEtablissement]
);
$conn->executeBulkWrite('nalmapi.etablissements', $row);

success('list.php', 'Etablissement modifié !');

require('../file_end.php');
