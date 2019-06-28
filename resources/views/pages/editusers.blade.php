@extends('layouts.app')
@section('content')

<h1>Modification des utilisateurs</h1><br>

<?php
// il faudra plus tard ajouter un lien de modif apres chaque nom

    foreach ($editusers as $user ) {
        echo $user->name.' <a href="/users/'.$user->id.'/edit">      éditer</a>'.' <a href="/users/'.$user->id.'/destroy">      Détruire</a><br>';
    }
?>
@stop
