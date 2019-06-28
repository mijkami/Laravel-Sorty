<?php
    echo '<h1>Utilisateurs</h1><br>';

// il faudra plus tard ajouter un lien de modif apres chaque nom

    foreach ($users as $user ) {
        echo $user->name.' <a href="/users/'.$user->id.'/edit">      éditer</a>'.' <a href="/users/'.$user->id.'/destroy">      Détruire</a><br>';
        echo "<br>";
    }


