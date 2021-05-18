<?php
require('../file_start.php');
require('../connect.php');
nav('reviews');
?>

<div class="add">
	<h1>Ajouter un avis</h1>
	<form method="post" action="traitement_add.php">
		<label>
			Note
		</label>
		<input type="text" name="note" /> <br />
		<label>
			Avis
		</label>
		<input type="text" name="avis" /> <br />
		<label>
			Auteur
		</label>
		<input type="text" name="auteur" /> <br />
		<label>
			Date
		</label>
		<input type="text" name="date" /> <br />
		<br />

		<input type="submit" value="Ajouter" />

	</form>
</div>
<?php
require('../file_end.php');
?>