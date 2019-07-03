@extends('layouts.app')
@section('content')


<h3>Suppression de la participation à la sortie.</h3>
<a href="/sors">Retour arrière</a><br>

{{-- store => update --}}

<form  method="POST" action="{{ route('particips.destroy', $particip->id) }}">
    {{-- protection --}}
    {{ csrf_field() }}

    {{-- définition de la méthode --}}
    {{ method_field('DELETE') }}
    <button type="submit">Supprimer</button>
    {{-- possibilité d'ajouter une confirmation supplémentaire cf JS/CSS, etc --}}
</form>

@stop
