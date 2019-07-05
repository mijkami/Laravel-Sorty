@extends('layouts.app')
@section('content')
@if (session('role')=='superadmin')
    <h1>Suppression de {{ $user->name }}</h1>
    <a href="/users">Retour arrière</a><br>

    {{-- store => update --}}

    <form  method="POST" action="{{ route('users.destroy', $user->id) }}">
        {{-- protection --}}
        {{ csrf_field() }}

        {{-- définition de la méthode --}}
        {{ method_field('DELETE') }}
        <button type="submit">Supprimer</button>
        {{-- possibilité d'ajouter une confirmation supplémentaire cf JS/CSS, etc --}}
    </form>
@endif

@stop
