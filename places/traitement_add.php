<?php
require('../functions.php');

init('Ajouter un établissement');

require('../file_end.php');

if (!isset($_POST['name']) or $_POST['name'] == NULL) {
    error('add.php', 'Veuillez spécifier un nom');
    die();
}

if (!isset($_POST['adresse']) or $_POST['adresse'] == NULL) {
    error('add.php', 'Veuillez spécifier une adresse');
    die();
}

if (!isset($_POST['ville']) or $_POST['ville'] == NULL) {
    error('add.php', 'Veuillez spécifier une ville');
    die();
}

if (!isset($_POST['pays']) or $_POST['pays'] == NULL) {
    error('add.php', 'Veuillez spécifier un pays');
    die();
}

if (!isset($_POST['telephone']) or $_POST['telephone'] == NULL) {
    error('add.php', 'Veuillez spécifier un telephone');
    die();
}

$iEtablissement = array(
    'Nom' => $_POST['name'],
    'Adresse' => $_POST['adresse'],
    'Ville' => $_POST['ville'],
    'Pays' => $_POST['pays'],
    'Telephone' => $_POST['telephone'],
);

$row = new MongoDB\Driver\BulkWrite();
$row->insert($iEtablissement);
$conn->executeBulkWrite('nalmapi.etablissements', $row);

success('add.php', 'Etablissement ajouté !');

require('../file_end.php');
