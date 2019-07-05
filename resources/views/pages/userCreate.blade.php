@extends('layouts.app')
@section('content')
@if (session('role')=='superadmin')
    <h1>Création d'utilisateurs</h1><br>
    <a href="/users">Retour arrière</a><br>


    {{-- // contenu de usercreate
    // initier un formulaire avec

    // TODO
    // vérifier syntaxe pour la valdation de formulaire html
    // vérification de l'email : conformité et si déjà existant;
    //              si email déjà existant, bloquer/message d'erreur --}}
    <form class="form-horizontal" method="POST" action="{{ route("users.store") }}">
            @csrf
            <input type="text" name="name"> Nom<br>
            <input type="text" name="firstname"> Prénom<br>
            <input type="email" name="email" value="email@google.com"> Email<br>
            <input type="text" name="tel" value="0000000000"> Téléphone<br><br>
            <input type="radio" name="role" value="invité"> Invité<br>
            <input type="radio" name="role" value="membre" checked> Membre<br>
            <input type="radio" name="role" value="admin"> Admin<br>
            <input type="radio" name="role" value="superadmin"> Super-admin<br>
            <input type="hidden" name="password" value={{bcrypt('abcd')}}>
            <button type="submit">Enregistrer</button>
    </form>
@endif




@stop
