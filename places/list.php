<?php
require('../file_start.php');

require('../connect.php');
nav();
?>
<div>
    <h1>Liste des établissement</h1>
<?php
$query = new MongoDB\Driver\Query([], []);
$result = $conn->executeQuery('nalmapi.etablissements', $query);

if ($result) {
    echo '<table align="center">' .
        '<thead>' .
        '<tr><th>_id</th>
				<th>Nom</th>
				<th>Adresse</th>
				<th>Ville</th>
				<th>Pays</th>
				<th>Téléphone</th>
				<th>Supprimer ?</th>
				<th>Editer</th>
				</tr>' .
        '</thead>' .
        '<tbody>';
    foreach ($result as $rs) {
        echo '
					<tr>
						<td>' . $rs->{'_id'} . '</td>
						<td>' . $rs->Nom . '</td>
						<td>' . $rs->Adresse . '</td>
						<td>' . $rs->Ville . '</td>
						<td>' . $rs->Pays . '</td>
						<td>' . $rs->Telephone . '</td>
						<td><a href="delete.php?id=' . $rs->{'_id'} . '">Supprimer !</a></td>
						<td><a href="edit.php?id=' . $rs->{'_id'} . '">Editer</a></td>
					</tr>';
    }
    echo '</tbody>' .
        '</table>' . '</div>';
}
require('../file_end.php');
?>