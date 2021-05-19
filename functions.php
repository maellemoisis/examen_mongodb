<?php

// Database connection
try {
    $conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
} catch (MongoDBDriverExceptionException $e) {
    echo 'Failed to connect to MongoDB, is the service intalled and running?<br /><br />';
    echo $e->getMessage();
    exit();
}

// Functions
function error($to, $error)
{
    header('Location: ' . $to . '?error=' . urlencode($error));
}

function success($to, $result)
{
    header('Location: ' . $to . '?success=' . urlencode($result));
}

function nav($type = 'etablissements')
{
    if ($type == 'etablissements') {
        echo '
        <div class="nav places">
		    <h1>Etablissements</h1>
            <ul>
                <li><a href="list.php">Afficher la liste</a></li>
                <li><a href="add.php">Ajouter un établissement</a></li>
                <li><a href="../reviews">Accéder aux avis</a></li>
            </ul>
		</div>
		';
    }

    if ($type == 'reviews') {
        echo '
        <div class="nav reviews">
		    <h1>Avis</h1>
			<ul>
				<li><a href="list.php">Afficher la liste</a></li>
				<li><a href="add.php">Ajouter un avis</a></li>
				<li><a href="../places">Accéder aux établissements</a></li>
			</ul>
        </div>
		';
    }
}

function init($title, $iNav = null) {
    require('file_start.php');

    if ($iNav != NULL) {
        nav($iNav);
    }
}

// Error management
if (isset($_GET['error'])) {
    echo '<div class="error" >' . urldecode($_GET['error']) . '</div>';
}

if (isset($_GET['success'])) {
    echo '<div class="success">' . urldecode($_GET['success']) . '</div>';
}

?>
