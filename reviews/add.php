<?php
require('../functions.php');

init('Ajouter un avis', 'reviews');

echo '
<div class="add">
	<h1>Ajouter un avis</h1>
	<form method="post" action="traitement_add.php">
		<label>
			Note
		</label>
		<input type="number" name="note" /> <br />
		<label>
			Avis
		</label>
		<textarea name="avis"></textarea> <br />
		<label>
			Auteur
		</label>
		<input type="text" name="auteur" /> <br />
		<label>
			Date
		</label>
		<input type="date" name="date" /> <br />
		<br />

		<input type="submit" value="Ajouter" />

	</form>
</div>';

require('../file_end.php');
