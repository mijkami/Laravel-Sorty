@extends('layouts.app')
@section('content')


<h3>Suppression de sortie {{ $sor->typ . ' du ' . Date::parse($sor->dat)->format('l j F')}}</h3>
<a href="/sors">Retour arrière</a><br>

{{-- store => update --}}

<form  method="POST" action="{{ route('sors.destroy', $sor->id) }}">
    {{-- protection --}}
    {{ csrf_field() }}

    {{-- définition de la méthode --}}
    {{ method_field('DELETE') }}
    <button type="submit">Supprimer</button>
    {{-- possibilité d'ajouter une confirmation supplémentaire cf JS/CSS, etc --}}
</form>

@stop