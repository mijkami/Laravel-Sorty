@extends('layouts.app')
@section('content')

<h1>Liste d'utilisateurs</h1><br>

<?php
// il faudra plus tard ajouter un lien de modif apres chaque nom

    foreach ($users as $user ) {
        echo $user->name;
        echo "<br>";
    }
?>
@stop

