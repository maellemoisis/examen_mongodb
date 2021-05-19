<?php
require('../functions.php');

init('Ajouter un établissement', 'etablissements');

echo '
    <div class="add">
        <h1>Ajouter un établissement</h1>
        <form method="post" action="traitement_add.php">
            <label>
                Nom de l\'établissement
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
            <input type="tel" name="telephone" /> <br />
    
            <br />
    
            <input type="submit" value="Ajouter" />
    
        </form>
    </div>';

require('../file_end.php');
