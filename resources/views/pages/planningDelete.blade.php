@extends('layouts.app')
@section('content')
<h3>Suppression de la participation à la sortie.</h3>
<a href="{{ URL::previous() }}"><p><i class="fas fa-arrow-left"> Annuler / page précédente</i></p></a><br>
<form  method="POST" action="{{ route('particips.destroy', $particip->id) }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit">Supprimer</button>
    {{-- tODO possibilité d'ajouter une confirmation supplémentaire cf JS/CSS, etc --}}
</form>

@stop
