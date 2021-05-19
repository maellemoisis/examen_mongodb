<?php
require('../functions.php');

init('Liste des établissements', 'etablissements');

echo '
    <div>
        <h1>Liste des établissements</h1>';

        $query = new MongoDB\Driver\Query([], []);
        $result = $conn->executeQuery('nalmapi.etablissements', $query);

        if ($result) {
            echo '
                <table align="center">
                    <thead>
                        <tr>
                            <th>_id</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Ville</th>
                            <th>Pays</th>
                            <th>Téléphone</th>
                            <th>Supprimer ?</th>
                            <th>Editer</th>
                        </tr>
                    </thead>
                    <tbody>';

                    foreach ($result as $rs) {
                        echo '
                        <tr>
                            <td>'.$rs->{'_id'}.'</td>
                            <td>'.$rs->Nom.'</td>
                            <td>'.$rs->Adresse.'</td>
                            <td>'.$rs->Ville.'</td>
                            <td>'.$rs->Pays.'</td>
                            <td>'.$rs->Telephone.'</td>
                            <td><a href="delete.php?id='.$rs->{'_id'}.'">Supprimer !</a></td>
                            <td><a href="edit.php?id='.$rs->{'_id'}.'">Éditer</a></td>
                        </tr>';
                    }

            echo '
                    </tbody>
                </table>
    </div>';

        }

require('../file_end.php');
