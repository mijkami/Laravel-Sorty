@extends('layouts.app')
@section('content')

<h1>Liste d'utilisateurs</h1>
<h4><a href="/users/create">Créer un utilisateur</a></h4>
    <?php

        foreach ($users as $user ) {
            echo "<span>".$user->name."</span>".' <a href="/users/'.$user->id.'/edit">      éditer</a>'.' <a href="/users/'.$user->id.'/destroy">      Détruire</a><br>';
        }
    ?>


@stop

