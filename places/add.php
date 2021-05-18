<?php
require('../file_start.php');

require('../connect.php');
nav();
?>
<div class="add">
	<h1>Ajouter un établissement</h1>
	<form method="post" action="traitement_add.php">
		<label>
			Nom de l'établissement
		</label>
		<input type="text" name="name" /> <br />
		<label>
			Adresse
		</label>
		<input type="text" name="adresse" /> <br />
		<label>
			Ville
		</label>
		<input type="text" name="ville" /> <br />
		<label>
			Pays
		</label>
		<input type="text" name="pays" /> <br />
		<label>
			Téléphone
		</label>
		<input type="text" name="telephone" /> <br />

		<br />

		<input type="submit" value="Ajouter" />

	</form>
</div>
<?php
require('../file_end.php');
?>