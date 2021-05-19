<?php
require('../functions.php');

init('Liste des avis', 'reviews');

echo '
<div>
    <h1>Liste des avis</h1>';

    $query = new MongoDB\Driver\Query([], []);
    $result = $conn->executeQuery('nalmapi.reviews', $query);

    if ($result) {

		echo '
            <table align="center">
                <thead>
                    <tr>
                        <th>_id</th>
                        <th>Note</th>
                        <th>Avis</th>
                        <th>Auteur</th>
                        <th>Date</th>
                        <th>Supprimer ?</th>
                        <th>Editer</th>
                    </tr>
                </thead>
            <tbody>';

		foreach ($result as $rs) {
			echo '
				<tr>
					<td>' . $rs->{'_id'} . '</td>
					<td>' . $rs->Note . '</td>
					<td>' . $rs->Avis . '</td>
					<td>' . $rs->Auteur . '</td>
					<td>' . $rs->Date . '</td>
					<td><a href="delete.php?id=' . $rs->{'_id'} . '">Supprimer !</a></td>
					<td><a href="edit.php?id=' . $rs->{'_id'} . '">Editer</a></td>
				</tr>';
		}

		echo '
            </tbody>
        </table>
       </div>';

	}

require('../file_end.php');
