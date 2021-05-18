<?php
require('../file_start.php');
require('../connect.php');

if (!isset($_GET['id']) OR $_GET['id'] == NULL) {
	error('list.php', 'Erreur');
}

$query = new MongoDB\Driver\Query(['_id'=> new MongoDB\BSON\ObjectID($_GET['id'])],[]);
$result = $conn->executeQuery('nalmapi.reviews', $query);
if(!$result){
	error('list.php', 'Avis inconnu');
}

$rs = $result->toArray()[0];

nav('reviews');
?>

<div>
	<h1>Editer l'avis</h1>
	<form method="post" action="traitement_edit.php">
		<label>
			Note
		</label>
		<input type="text" name="note" value="<?php echo $rs->Note; ?>"/> <br />
		<label>
			Avis
		</label>
		<input type="text" name="avis" value="<?php echo $rs->Avis; ?>"/> <br />
		<label>
			Auteur
		</label>
		<input type="text" name="auteur" value="<?php echo $rs->Auteur; ?>"/> <br />
		<label>
			Date
		</label>
		<input type="text" name="date" value="<?php echo $rs->Date; ?>"/> <br />

		<br />

		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />

		<input type="submit" value="Enregistrer" />

	</form>

</div>

<?php
require('../file_end.php');

?>